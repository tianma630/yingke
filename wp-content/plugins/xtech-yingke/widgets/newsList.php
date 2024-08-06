<?php

namespace XTech_Yingke;

use Elementor\Repeater;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor newsList widget.
 */
class Widget_NewsList extends Widget_Base
{

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_script('newsList-js', plugins_url('xtech-yingke') . '/assets/scripts/news.js', ['jquery'], '1.0.0', true);
    wp_register_style('newsList-css', plugins_url('xtech-yingke') . '/assets/styles/news.css');
  }

  public function get_script_depends()
  {
    return ['newsList-js'];
  }

  public function get_style_depends()
  {
    return ['newsList-css'];
  }

  public function get_name()
  {
    return 'newsList';
  }

  public function get_title()
  {
    return __('News List', 'yingke');
  }

  public function get_icon()
  {
    return 'eicon-post-info';
  }

  public function get_keywords()
  {
    return ['newsList', 'career'];
  }

  public function get_categories()
  {
    return ['x-tech'];
  }

  protected function _register_controls()
  {

    $this->start_controls_section(
      'newsList_settings',
      [
        'label' => __('News List', 'yingke'),
      ]
    );

    $this->add_control(
      'posts_per_page',
      [
        'label' => esc_html__('Posts Per Page', 'yingke'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 6,
        'placeholder' => esc_html__('Type the number of posts here', 'yingke'),
      ]
    );


    $this->end_controls_section();
  }

  protected function showTagName($tags)
  {
    if ($tags) {
      $countOftax = count($tags) - 1;
      for ($i = 0; $i < $countOftax; $i++) {
        echo $tags[$i]->name . '/';
      }
      echo $tags[$countOftax]->name;
    }
  }

  public static function list($news_query)
  {
    if ($news_query->have_posts()) {
?>
      <div id="news-response">
        <div class="news-list-row">
          <div class="xtech-news-row">
            <?php
              while ($news_query->have_posts()) :
                $news_query->the_post();
                $item = $news_query->post;
                $content = get_the_content($item->ID);
                // $image = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), "single-post-thumbnail");
                // $style = $image ? "background: url(" . $image[0] . ") center no-repeat; background-size: cover;" : "";
                $categories = get_the_category( $item->ID ) ?? [];

                $col = 'col';
              ?>
                <div class="xtech-news-col <?= $col; ?>">
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
              <?php
              endwhile;
              wp_reset_postdata();
              ?>
          </div>
        </div>
      </div>
      <div id="no-result" class="text-center mb-4" style="display: none"><?= __('No News Found', 'yingke') ?></div>
      <button class="load-more-news load-more-btn">
        <div class="text">Load more</div>
        <span>
          <img class="load-more-btn-icon-main" src="<?= site_url() ?>/wp-content/plugins/xtech-yingke/assets/images/arrow-down.svg">
        </span>
      </button>
<?php
    }
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $postsPerPage = $settings['posts_per_page'] ?? 6;
    
    $types = $_GET['types'] ?? [];
    $practices = $_GET['practices'] ?? null;
    $dates = $_GET['dates'] ?? [];
    
    $args = array(
      'posts_per_page' => $postsPerPage,
      'post_type' => 'post',
      'post_status' => 'publish',
      'orderby'    => 'date',
      'order'    => 'DESC',
      'category_name' => implode(',', $types)
    );
    
    if ($practices) {
        $args['tax_query'] = [
          'relation' => 'OR',
          [
                'taxonomy' => 'practice',
                'field' => 'slug',
                'terms' => $practices
          ]
        ];
    }
    
    if (count($dates) > 0) {
        $args['date_query'] = [
            'relation' => 'OR'
        ];
        foreach ($dates as $date) {
            $dateArray = date_parse($date);
            if (! $dateArray['year'] || ! $dateArray['month']) {
                continue;
            }
            $args['date_query'][] = [
                'year' => $dateArray['year'],
                'month' => $dateArray['month'],
            ];
        }
    }
    
    $news_query = new \WP_Query($args);
    $words_count = get_locale() == 'en_AU' ? 180 : 100;

    self::list($news_query);
  }
}