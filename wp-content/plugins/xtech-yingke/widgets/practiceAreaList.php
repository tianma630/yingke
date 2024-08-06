<?php

namespace XTech_Yingke;

use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor Practice Area Carousel widget.
 */
class Widget_practiceAreaList extends Widget_Base
{

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);
    wp_register_style('practiceAreaList-css', plugins_url('xtech-yingke') . '/assets/styles/practice-area-list.css');
  }

  public function get_style_depends()
  {
    return ['practiceAreaList-css', 'x-tech-css'];
  }

  public function get_name()
  {
    return 'practiceAreaList';
  }

  public function get_title()
  {
    return __('Practice Areas', 'yingke');
  }

  public function get_icon()
  {
    return 'eicon-post-info';
  }

  public function get_keywords()
  {
    return ['practiceAreaList', 'career'];
  }

  public function get_categories()
  {
    return ['x-tech'];
  }

  protected function _register_controls()
  {

    $this->start_controls_section(
      'practiceAreaList_settings',
      [
        'label' => __('Practice Areas', 'yingke'),
      ]
    );

	$this->add_control(
		'show_icon',
		[
		  'label' => __('Show Icon', 'yingke'),
		  'type' => \Elementor\Controls_Manager::SWITCHER,
		  'default' => 'false',
		]
	);

    $this->end_controls_section();
  }
  
  public static function practiceAreaList($query, $show_icon = false) {
	$svg_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M10.8893 6.45372L4.65908 0.223657C4.51498 0.0794465 4.32263 0 4.11752 0C3.91242 0 3.72006 0.0794465 3.57597 0.223657L3.11716 0.682352C2.81861 0.981244 2.81861 1.46703 3.11716 1.76547L8.34879 6.9971L3.11135 12.2345C2.96726 12.3787 2.8877 12.571 2.8877 12.776C2.8877 12.9812 2.96726 13.1734 3.11135 13.3178L3.57016 13.7763C3.71437 13.9206 3.90661 14 4.11172 14C4.31682 14 4.50918 13.9206 4.65327 13.7763L10.8893 7.54059C11.0337 7.39592 11.113 7.20277 11.1126 6.99744C11.113 6.79131 11.0337 6.59827 10.8893 6.45372Z" fill="#333333"></path></svg>';
?>
    <div class="practice-area-list-grid">
        <?php
			while ($query->have_posts()) :
			$query->the_post();
			$item = $query->post;
			?>
			<div class="practice-area-list-col">
				<a class="xtech-practice-area-link" href="<?= get_permalink($item->ID) ?>">
				<?= $item->post_title; ?>
				<?= $show_icon ? $svg_arrow : '' ?>
				</a>
			</div>
			<?php
			endwhile;
			wp_reset_postdata();
        ?>
    </div>
  <?php
  }

  protected function render()
  {
	$settings = $this->get_settings_for_display();
	$show_icon = (bool) esc_attr($settings['show_icon']);
    $args = array(
      'post_type' => 'practice_area',
      'post_status' => 'publish',
      'orderby'    => 'post_title',
      'order'    => 'ASC',
      'posts_per_page'   => -1,
    );
    $query = new \WP_Query($args);

    self::practiceAreaList($query, $show_icon);
  }
}