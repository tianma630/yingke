<?php

namespace XTech_Yingke;

use Elementor\Repeater;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor Testimonials Carousel widget.
 */
class Widget_RelatedLawyers extends Widget_Base
{

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);
    wp_register_style('relatedLawyers-css', plugins_url('xtech-yingke') . '/assets/styles/lawyers.css');
    wp_register_style('x-tech-css', plugins_url('xtech-yingke') . '/assets/styles/x-tech.min.css');
  }

  public function get_style_depends()
  {
    return ['relatedLawyers-css', 'x-tech-css'];
  }

  public function get_name()
  {
    return 'relatedLawyers';
  }

  public function get_title()
  {
    return __('Related Lawyers', 'yingke');
  }

  public function get_icon()
  {
    return 'eicon-post-info';
  }

  public function get_keywords()
  {
    return ['relatedLawyers', 'career'];
  }

  public function get_categories()
  {
    return ['x-tech'];
  }

 protected function _register_controls()
 {

   $this->start_controls_section(
     'relatedLawyers_settings',
     [
       'label' => __('Related Lawyers', 'yingke'),
     ]
   );

   $this->add_control(
     'type',
     [
       'label' => __('Type', 'yingke'),
       'type' => \Elementor\Controls_Manager::SELECT,
       'default' => 'all',
       'options' => [
         'all' => esc_html__('All', 'yingke'),
		 'allWithoutImage'  => esc_html__('AllWithoutImage', 'yingke'),
         'related'  => esc_html__('Related', 'yingke'),
		   
       ],
     ]
   );

   $this->end_controls_section();
 }
  
  public static function relatedLawyers($lawyers_query,$type = 'allWithoutImage') {
	$isAllWithoutImage = $type === 'allWithoutImage';
?>
    <div class="lawyers-list-row">
      <div class="xtech-lawyers-row">
        <?php
        while ($lawyers_query->have_posts()) :
          $lawyers_query->the_post();
          $item = $lawyers_query->post;
	      $image = get_field('thumbnail', $item->ID);
	  	  $jobTitle = get_field('job_title', $item->ID);
        ?>
          <div class="xtech-lawyers-col <?= $col . ' ' . $type; ?>">
            <a class="xtech-lawyers-link" href="<?= get_permalink($item->ID) ?>" style="<?= $style ?>">
			  <?php if (!$isAllWithoutImage): ?>
			  <div class="lawyerImg">
				<img src="<?= $image ?>" />
			  </div>  
              <?php else: ?>
              <div class="Noimage">
			  </div>
              <?php endif; ?>  
			  <div class='wording'>
			    <div class='title'>
                <?= $item->post_title ?>
                </div>
			    <div class="jobTitle">
				<?= $item->job_title ?>
                </div>	
			  </div>
             	            
            </a>
          </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
      </div>
    </div>
  <?php
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $type = esc_attr($settings['type']);
    $tagIds = wp_get_post_tags( get_the_ID(), array( 'fields' => 'ids' ) );
    $args = array(
      'post_type' => 'lawyer',
      'post_status' => 'publish',
      'orderby'    => 'date',
      'order'    => 'ASC',
      'tag__in' => $type === 'related'? $tagIds:[],
    );
    $lawyers_query = new \WP_Query($args);


    self::relatedLawyers($lawyers_query, $type);
  }
}
