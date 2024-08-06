<?php

namespace XTech_Yingke;

use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor People List Carousel widget.
 */
class Widget_peopleList extends Widget_Base
{

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);
    wp_register_style('peopleList-css', plugins_url('xtech-yingke') . '/assets/styles/people-list.css');
    wp_enqueue_script('peopleList-filter-js',  plugins_url('xtech-yingke') . '/assets/scripts/peopleList-filter.js', array('jquery'), NULL, true);
  }

  public function get_style_depends()
  {
    return ['peopleList-css', 'x-tech-css'];
  }

  public function get_name()
  {
    return 'peopleList';
  }

  public function get_title()
  {
    return __('People', 'yingke');
  }

  public function get_icon()
  {
    return 'eicon-post-info';
  }

  public function get_keywords()
  {
    return ['peopleList', 'career'];
  }

  public function get_categories()
  {
    return ['x-tech'];
  }

  protected function _register_controls()
  {

    $this->start_controls_section(
      'peopleList_settings',
      [
        'label' => __('People', 'yingke'),
      ]
    );

    $this->end_controls_section();
  }
  
  public static function peopleList($query) {
    $regions = get_terms([
      'taxonomy' => 'region',
      'hide_empty' => false
    ]);
?>
    <div class="people-filter js-filter-box">
      <div class="js-filter-container">
        <div class="js-filter-left">
          <span>Filters:</span>
        </div>
        <div class="js-filter-list js-filter-right">
          <span>Regions
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_647_3165)">
            <path d="M7.54628 10.8893L13.7763 4.65908C13.9206 4.51498 14 4.32263 14 4.11752C14 3.91242 13.9206 3.72006 13.7763 3.57597L13.3176 3.11716C13.0188 2.81861 12.533 2.81861 12.2345 3.11716L7.0029 8.34879L1.76547 3.11135C1.62126 2.96726 1.42901 2.88769 1.22402 2.88769C1.0188 2.88769 0.826562 2.96726 0.682239 3.11135L0.223657 3.57016C0.0794468 3.71437 -4.45384e-08 3.90661 -5.35037e-08 4.11172C-6.24691e-08 4.31682 0.0794467 4.50918 0.223657 4.65327L6.45941 10.8893C6.60408 11.0337 6.79723 11.113 7.00256 11.1126C7.20869 11.113 7.40173 11.0337 7.54628 10.8893Z" fill="#333333"/>
            </g>
            <defs>
            <clipPath id="clip0_647_3165">
            <rect width="14" height="14" fill="white" transform="translate(14) rotate(90)"/>
            </clipPath>
            </defs>
            </svg>
          </span>
          <div class="region-filter-dropdown">
            <a href="#" class="region-filter-item active" data-region="all">
              <button class="js-filter-btn">All Regions</button>
            </a>
            <?php foreach ($regions as $region) : ?>
              <a href="#" class="region-filter-item" data-region="<?= $region->slug; ?>" >
                <button class="js-filter-btn"><?= $region->name ?></button>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="region-filter-action justify-content-between row invisible">
        <div class="col-auto"><a id="filter-value" href="#">
            <span></span>
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_647_3438)">
            <path d="M1.00417 12.9959C1.04481 13.0366 1.09306 13.0689 1.14617 13.0909C1.19928 13.1129 1.25621 13.1242 1.31371 13.1242C1.3712 13.1242 1.42813 13.1129 1.48124 13.0909C1.53435 13.0689 1.58261 13.0366 1.62324 12.9959L7.00011 7.61906L12.3792 12.9959C12.4613 13.078 12.5726 13.1241 12.6887 13.1241C12.8048 13.1241 12.9161 13.078 12.9982 12.9959C13.0803 12.9138 13.1264 12.8025 13.1264 12.6864C13.1264 12.5703 13.0803 12.459 12.9982 12.3769L7.61917 6.99999L12.996 1.62093C13.0781 1.53884 13.1243 1.4275 13.1243 1.3114C13.1243 1.1953 13.0781 1.08396 12.996 1.00187C12.914 0.919776 12.8026 0.873657 12.6865 0.873657C12.5704 0.873657 12.4591 0.919776 12.377 1.00187L7.00011 6.38093L1.62105 1.00406C1.53736 0.932383 1.4297 0.89493 1.31959 0.899183C1.20948 0.903436 1.10503 0.949081 1.02712 1.027C0.9492 1.10491 0.903554 1.20936 0.899301 1.31947C0.895048 1.42958 0.932501 1.53724 1.00417 1.62093L6.38105 6.99999L1.00417 12.3791C0.92269 12.461 0.876953 12.5719 0.876953 12.6875C0.876953 12.8031 0.92269 12.914 1.00417 12.9959Z" fill="#BE9F6D"/>
            </g>
            <defs>
            <clipPath id="clip0_647_3438">
            <rect width="14" height="14" fill="white"/>
            </clipPath>
            </defs>
            </svg>
          </a>
        </div>
        <div class="col-auto"><a id="clear-filter-value" href="#"><?php esc_html_e( 'Clear All' ); ?></a></div>
    </div>
    <div class="people-list-grid">
        <?php
			while ($query->have_posts()) :
			$query->the_post();
			$item = $query->post;
      $regions = get_the_terms($item, 'region');
      $regionIds = [];
      foreach ( $regions as $region ) {
        $regionIds[] = $region->slug;
      }
      $regionIdsString = join( " ", $regionIds );
			?>
			<div class="xtech-people-col" data-region="<?= $regionIdsString; ?>">
				<a class="xtech-people-link" href="<?= get_permalink($item->ID) ?>">
        <?php if($thumb = get_field('thumbnail')): ?>
          <div class="people-thumb">
            <img src="<?= $thumb ?>" alt="<?= $item->post_title ?>">
          </div>
        <?php endif; ?>
				<div class="people-info">
          <h4><?= $item->post_title; ?></h4>
          <p class="people-job"><?= get_field('job_title') ?></p>
          <p class="people-location"><?= get_field('location') ?></p>
        </div>
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
    $args = array(
      'post_type' => 'lawyer',
      'post_status' => 'publish',
      'orderby'    => 'menu_order',
      'order'    => 'ASC',
      'posts_per_page'   => -1,
    );
    $query = new \WP_Query($args);

    self::peopleList($query);
  }
}