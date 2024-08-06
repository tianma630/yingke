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
class Widget_RelatedNews extends Widget_Base
{

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);
    wp_register_style('relatedNews-css', plugins_url('xtech-yingke') . '/assets/styles/news.css');
    wp_register_style('x-tech-css', plugins_url('xtech-yingke') . '/assets/styles/x-tech.min.css');
  }

  // public function get_script_depends()
  // {
  //   return ['testimonialsCarousel-js', 'testimonials-swiper-js'];
  // }

  public function get_style_depends()
  {
    return ['relatedNews-css', 'x-tech-css'];
  }

  public function get_name()
  {
    return 'relatedNews';
  }

  public function get_title()
  {
    return __('Related News', 'yingke');
  }

  public function get_icon()
  {
    return 'eicon-post-info';
  }

  public function get_keywords()
  {
    return ['relatedNews', 'career'];
  }

  public function get_categories()
  {
    return ['x-tech'];
  }

  protected function _register_controls()
  {

    $this->start_controls_section(
      'relatedNews_settings',
      [
        'label' => __('Related News', 'yingke'),
      ]
    );

    $this->add_control(
      'type',
      [
        'label' => __('Type', 'yingke'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'fancy',
        'options' => [
          'fancy' => esc_html__('Fancy', 'yingke'),
          'default'  => esc_html__('Default', 'yingke'),
        ],
      ]
    );

    $this->end_controls_section();
  }
  
  public static function relatedNews($news_query, $type = 'fancy') {
    $isFancy = $type === 'fancy';
?>
    <div class="related-news news-list-row <?= $type ?>">
      <div class="xtech-news-row">
        <?php
        while ($news_query->have_posts()) :
          $news_query->the_post();
          $item = $news_query->post;
          $content = get_the_content($item->ID);
        //   $image = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), "single-post-thumbnail");
        //   $style = $isFancy && $image ? "background: url(" . $image[0] . ") center no-repeat; background-size: cover;" : "";
          $categories = get_the_category( $item->ID ) ?? [];

          $index = $news_query->current_post % 3 == 0 ? 1 : $index+1;

          if ($isFancy):
        ?>
           <div class="xtech-news-col col">
              <a class="xtech-news-link" href="<?= get_permalink($item->ID) ?>">
                <div class="news-top">
                	<div class="news-meta">
                      <div class="category">
                        <?= $categories[0] ? $categories[0]->name : 'News' ?>
                      </div>
                      <div class="news-published-date">
                        <?= get_the_date('j M Y') ?>
                      </div>
                    </div>
                    <div class="divider"></div>
                    <div class='title'>
                      <?= $item->post_title ?>
                    </div>
                    <div class="excerpt">
                      <?= has_excerpt() ? get_the_excerpt() : ''; ?>
                    </div>
                </div>
                
                <div class="news-bottom">
                	<span class="news-link-text">Read More<img class="load-more-btn-icon-main" src="<?= site_url() ?>/wp-content/plugins/xtech-yingke/assets/images/right-arrow-black.svg"></span>
                </div>
              </a>
            </div>
        <?php else: ?>
            <div class="xtech-news-col col-full">
              <a class="xtech-news-link" href="<?= get_permalink($item->ID) ?>">
                <div class="news-top">
                	<div class="category">
                      <?= $categories[0] ? $categories[0]->name : 'News' ?>
                    </div>
                    <div class='title'>
                      <?= $item->post_title ?>
                    </div>
                    <div class="news-published-date">
                      <?= get_the_date('j M Y') ?>
                    </div>
                </div>
              </a>
            </div>
        <?php
        endif;
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
      'posts_per_page' => 6,
      'post_type' => 'post',
      'post_status' => 'publish',
      'orderby'    => 'date',
      'order'    => 'DESC',
      'tag__in' => $tagIds,
      'post__not_in' => [get_the_ID()]
    );
    $news_query = new \WP_Query($args);
    $words_count = get_locale() == 'en_AU' ? 180 : 100;

    self::relatedNews($news_query, $type);
  }
}
