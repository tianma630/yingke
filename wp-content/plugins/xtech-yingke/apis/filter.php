<?php

namespace XTech_Yingke\APIs;

class Filter extends API_Base
{
  public static function list($news_query)
  {
    if ($news_query->have_posts()) {

      while ($news_query->have_posts()) :
        $news_query->the_post();
        $item = $news_query->post;
        $content = get_the_content($item->ID);
        // $image = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID), "single-post-thumbnail");
        // $style = $image ? "background: url(" . $image[0] . ") center no-repeat; background-size: cover;" : "";
        $categories = get_the_category( $item->ID ) ?? [];

        $index = $news_query->current_post % 3 == 0 ? 1 : $index+1;
        $col = 'col-' . $index;
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
    }
  }

  public function __construct()
  {
    $this->registerRoute("posts", 'fetch_posts', $this);
    $this->registerRoute("morePosts", 'fetch_more_posts', $this);
    $this->registerRoute("search", 'search_posts', $this);
  }

  public function fetch_posts()
  {
    $paged = $_GET['paged'] ? $_GET['paged'] : 1;
    $offset = $_POST['offset'];
    $args = array(
      'posts_per_page' => 10,
      'paged' => $paged,
      'offset' => $offset,
      'post_type' => 'post',
      'post_status' => 'publish',
      'orderby'    => 'date',
      'order'    => 'DESC',
      'category__in' => $_GET['category'] ?? []
    );

    $news_query = new \WP_Query($args);

    ob_start();

    self::list($news_query);

    $content = ob_get_contents();
    ob_clean();

    return $content;
  }
  
  public function fetch_more_posts()
  {
    $paged = $_GET['paged'] ?? 1;
    $offset = $_GET['offset'];
    $s = $_GET['s'] ?? '';
    $types = $_GET['types'] ?? [];
    $practices = $_GET['practices'] ?? null;
    $dates = $_GET['dates'] ?? [];
    
    $args = array(
      'posts_per_page' => 9,
      'paged' => $paged,
      'offset' => $offset,
      'post_type' => 'post',
      'post_status' => 'publish',
      'orderby'    => 'date',
      'order'    => 'DESC',
      's' => $s,
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

    ob_start();

    self::list($news_query);

    $content = ob_get_contents();
    ob_clean();

    return $content;
  }
  
  public function search_posts()
  {
      $paged = $_GET['paged'] ?? 1;
      $s = $_GET['s'] ?? 1;
      $post_tag = $_GET['post_tag'] ?? '';
      
      $args = array(
          's' => $s,
          'paged' => $paged,
          'post_type' => ['post', 'page', 'lawyer', 'practice_area'],
          'post_status' => 'publish',
          'orderby' => 'date',
          'order' => 'desc',
          'tag' => $post_tag
      );

    $news_query = new \WP_Query($args);

    ob_start();
    
	while ( $news_query->have_posts() ) :
		$news_query->the_post(); ?>
		<div class="search-result-item">
			<?php
				printf( '<h2><a href="%s">%s</a></h2>', esc_url( get_permalink() ), esc_html( get_the_title() ) );
				the_excerpt();
				printf( '<a class="read-more-link" href="%s">%s%s</a>', esc_url( get_permalink() ), esc_html( 'Read More' ), $svg_arrow );
			?>
		</div>
	<?php
	endwhile;
	wp_reset_postdata();
    
    $content = ob_get_contents();
    ob_clean();

    return $content;
  }
}