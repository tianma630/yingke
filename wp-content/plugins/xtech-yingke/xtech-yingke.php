<?php

/**
 * Plugin Name: X Technology - Yingke
 * Description: Yingke theme related plugin
 * Plugin URI:  https://xtechsolution.com.au
 * Version:     1.0.0
 * Author:      X Tech
 * Author URI:  https://xtechsolution.com.au
 * Text Domain: xtech-yingke
 */

namespace XTech_Yingke;

use Elementor\Plugin;

// Require composer.
require __DIR__ . '/vendor/autoload.php';

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/** DEBUG */
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Add plugin scripts
 */
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('x-tech-plugin', plugins_url('xtech-yingke') . '/assets/styles/x-tech.min.css', false, null);
  wp_enqueue_script('x-tech',  plugins_url('xtech-yingke') . '/assets/scripts/x-tech.js', array('jquery'), NULL, true);
  wp_localize_script('x-tech', 'wpAjax', array(
    'ajaxUrl' => get_site_url() . '/wp-json/xtech/v1/',
    
  ));
  
}, 100);

/**
 * Register X Tech category
 */
add_action('elementor/elements/categories_registered', function ($elements_manager) {
  $categories = [];
  $categories['x-tech'] = [
    'title' => __('X Tech', 'x-tech'),
  ];

  $old_categories = $elements_manager->get_categories();
  $categories = array_merge($categories, $old_categories);

  $set_categories = function ($categories) {
    $this->categories = $categories;
  };

  $set_categories->call($elements_manager, $categories);
});

/**
 * Register X Tech widgets
 */
add_action('elementor/widgets/widgets_registered', function () {

  array_map(function ($file) {
    try {
      require_once plugin_dir_path(__FILE__) . "/widgets/{$file}.php";
    } catch (Exception $exception) {
      throw new Exception(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
  }, ['newsList', 'filter', 'relatedNews', 'relatedLawyers', 'relatedPracticeAreas', 'practiceAreaList', 'peopleList', 'sidebarFilter', 'postMeta']);

  $newsList_widget =  new Widget_NewsList();
  $filter_widget =  new Widget_Filter();
  $relatedNews_widget =  new Widget_RelatedNews();
  $relatedLawyers_widget =  new Widget_RelatedLawyers();
  $relatedPracticeAreas_widget =  new Widget_relatedPracticeAreas();
  $practiceAreaList_widget = new Widget_practiceAreaList();
  $peopleList_widget = new Widget_peopleList();
  $sidebarFilter = new Widget_SidebarFilter();
  $postMeta = new Widget_PostMeta();

  Plugin::instance()->widgets_manager->register_widget_type($newsList_widget);
  Plugin::instance()->widgets_manager->register_widget_type($filter_widget);
  Plugin::instance()->widgets_manager->register_widget_type($relatedNews_widget);
  Plugin::instance()->widgets_manager->register_widget_type($relatedLawyers_widget);
  Plugin::instance()->widgets_manager->register_widget_type($relatedPracticeAreas_widget);
  Plugin::instance()->widgets_manager->register_widget_type($practiceAreaList_widget);
  Plugin::instance()->widgets_manager->register_widget_type($peopleList_widget);
  Plugin::instance()->widgets_manager->register_widget_type($sidebarFilter);
  Plugin::instance()->widgets_manager->register_widget_type($postMeta);
});

add_action('rest_api_init', function () {
  new \XTech_Yingke\APIs\Filter();
});