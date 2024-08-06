<?php

namespace XTech_Yingke;

use Elementor\Repeater;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor Practice Area Carousel widget.
 */
class Widget_relatedPracticeAreas extends Widget_Base
{

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);
    wp_register_style('relatedPracticeAreas-css', plugins_url('xtech-yingke') . '/assets/styles/practice-area.css');
  }


  public function get_style_depends()
  {
    return ['relatedPracticeAreas-css', 'x-tech-css'];
  }

  public function get_name()
  {
    return 'relatedPracticeAreas';
  }

  public function get_title()
  {
    return __('Related Practice Areas', 'yingke');
  }

  public function get_icon()
  {
    return 'eicon-post-info';
  }

  public function get_keywords()
  {
    return ['relatedPracticeAreas', 'career'];
  }

  public function get_categories()
  {
    return ['x-tech'];
  }

  protected function _register_controls()
  {

    $this->start_controls_section(
      'relatedPracticeAreas_settings',
      [
        'label' => __('Related Practice Areas', 'yingke'),
      ]
    );

    $this->add_control(
      'type',
      [
        'label' => __('Type', 'yingke'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'related',
        'options' => [
          'all' => esc_html__('All', 'yingke'),
          'related'  => esc_html__('Related', 'yingke'),
        ],
      ]
    );

    $this->end_controls_section();
  }
  
  public static function relatedPracticeAreas($query, $type = 'fancy') {
    $isFancy = $type === 'fancy';
?>
    <div class="practice-area-list-row">
      <div class="xtech-practice-area-row">
        <?php
        while ($query->have_posts()) :
          $query->the_post();
          $item = $query->post;
          $content = get_the_content($item->ID);
          $image = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), "single-post-thumbnail");

          $index = $query->current_post % 3 == 0 ? 1 : $index+1;
          $col = $isFancy ? 'col-' . $index : 'col-full';
        ?>
          <div class="xtech-practice-area-col <?= $col . ' ' . $type; ?>">
            <a class="xtech-practice-area-link" href="<?= get_permalink($item->ID) ?>">
              <?= $item->post_title ?>
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
      'post_type' => 'practice_area',
      'post_status' => 'publish',
      'orderby'    => 'date',
      'order'    => 'DESC',
      'tag__in' => $tagIds,
      'post__not_in' => [get_the_ID()]
    );
    $query = new \WP_Query($args);

    self::relatedPracticeAreas($query, $type);
  }
}
