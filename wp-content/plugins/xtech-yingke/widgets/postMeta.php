<?php

namespace XTech_Yingke;

use Elementor\Repeater;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor PostMeta widget.
 */
class Widget_PostMeta extends Widget_Base
{

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);
    wp_register_style('post-meta-css', plugins_url('xtech-yingke') . '/assets/styles/post-meta.css');
  }

  public function get_script_depends()
  {
    return [];
  }

  public function get_style_depends()
  {
    return ['post-meta-css'];
  }

  public function get_name()
  {
    return 'Post Meta';
  }

  public function get_title()
  {
    return __('Post Meta', 'yingke');
  }

  public function get_icon()
  {
    return 'eicon-post-info';
  }

  public function get_keywords()
  {
    return ['post', 'meta'];
  }

  public function get_categories()
  {
    return ['x-tech'];
  }

  protected function _register_controls()
  {

    $this->start_controls_section(
      'post_meta_settings',
      [
        'label' => __('Post Meta', 'yingke'),
      ]
    );
    
    $this->end_controls_section();
  }

  protected function render()
  {
      $published_date = get_the_date('j M Y');
      
      $author_name = 'By ' . function_exists('get_field') && get_field('author') ? get_field('author') : get_the_author_meta('display_name');
      
      $post_metas = [$published_date, $author_name];
?>
    <div class="xtech-news-post-meta">
        <?php foreach ($post_metas as $post_meta): ?>
            <span class="xtech-news-post-meta-item"><?= $post_meta ?></span>
        <?php endforeach ?>
    </div>

<?php

  }
}