<?php
/**
 * The template for displaying search results.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$svg_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M10.8893 6.45372L4.65908 0.223657C4.51498 0.0794465 4.32263 0 4.11752 0C3.91242 0 3.72006 0.0794465 3.57597 0.223657L3.11716 0.682352C2.81861 0.981244 2.81861 1.46703 3.11716 1.76547L8.34879 6.9971L3.11135 12.2345C2.96726 12.3787 2.8877 12.571 2.8877 12.776C2.8877 12.9812 2.96726 13.1734 3.11135 13.3178L3.57016 13.7763C3.71437 13.9206 3.90661 14 4.11172 14C4.31682 14 4.50918 13.9206 4.65327 13.7763L10.8893 7.54059C11.0337 7.39592 11.113 7.20277 11.1126 6.99744C11.113 6.79131 11.0337 6.59827 10.8893 6.45372Z" fill="#333333"></path></svg>';
?>
<main id="content" class="container" role="main">
	<header class="page-header">
		<h1 class="entry-title">
			<?php esc_html_e( 'Search' ); ?>
		</h1>
		<p><?php esc_html_e( 'Type in your key words and press search or enter.' ); ?></p>
		<form class="yingke-search-form" action="/" method="get">
			<div class="input-wrapper">
				<input type="text" name="s" id="search" placeholder="How can we help?" value="<?php echo get_search_query(); ?>" />
			</div>
			<div class="submit-wrapper">
			    <input type="hidden" name="post_tag" value="<?php echo $_GET['post_tag']; ?>" />
				<input type="submit" alt="Search" value="<?php esc_html_e( 'Search' ); ?>"/>
			</div>
		</form>
		<?php
			$search_query = get_search_query();
			$is_invisible = empty($search_query);
		?>
		<div class="search-query-action justify-content-between row<?= $is_invisible ? ' invisible' : '' ?>">
			<div class="col-auto"><?php esc_html_e( 'Search' ); ?> "<span><?php echo $search_query; ?></span>"</div>
			<div class="col-auto"><a href="<?= home_url(); ?>/?s="><?php esc_html_e( 'Clear All' ); ?></a></div>
		</div>
	</header>
	<div class="page-content">
        <p id="no-result" style="display: none"><?php esc_html_e( 'It seems we can\'t find what you\'re looking for.', 'hello-elementor' ); ?></p>
	</div>

	<button class="load-more-search load-more-btn ms-0">
		<div class="text">Load more</div>
		<span>
		<img class="load-more-btn-icon-main" src="<?php site_url(); ?>/wp-content/plugins/xtech-yingke/assets/images/arrow-down.svg">
		</span>
	</button>
</main>