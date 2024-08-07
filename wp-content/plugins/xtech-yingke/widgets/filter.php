<?php

namespace XTech_Yingke;

use Elementor\Repeater;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor Filter widget.
 */
class Widget_Filter extends Widget_Base
{

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);
    wp_register_style('filter-css', plugins_url('xtech-yingke') . '/assets/styles/filter.css');
    wp_enqueue_script('filter-js',  plugins_url('xtech-yingke') . '/assets/scripts/filter.js', array('jquery'), NULL, true);
  }

  public function get_script_depends()
  {
    return ['filter-js'];
  }

  public function get_style_depends()
  {
    return ['filter-css'];
  }

  public function get_name()
  {
    return 'Filter';
  }

  public function get_title()
  {
    return __('Filter', 'yingke');
  }

  public function get_icon()
  {
    return 'eicon-post-info';
  }

  public function get_keywords()
  {
    return ['filter', 'career'];
  }

  public function get_categories()
  {
    return ['x-tech'];
  }

  protected function _register_controls()
  {

    $this->start_controls_section(
      'filter_settings',
      [
        'label' => __('Filter', 'yingke'),
      ]
    );

    $this->add_control(
      'filterType',
      [
        'label' => __('Filter Type', 'yingke'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'news',
        'options' => [
          'news'  => esc_html__('News', 'yingke'),
        ],
      ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $filterType = esc_attr($settings['filterType']);

    $types = $_GET['types'] ?? [];
    $practices = $_GET['practices'] ?? [];
    $dates = $_GET['dates'] ?? [];

    $newsTypes = get_terms(['taxonomy' => 'category', 'hide_empty' => false]);

    $newsPractices = get_terms(['taxonomy' => 'practice', 'hide_empty' => false]);

    $archives = $this->get_year_archive_array();

    $typeCount = count(array_intersect($types, get_terms(['taxonomy' => 'category', 'hide_empty' => false, 'fields' => 'slugs'])));

    $practiceCount = count(array_intersect($practices, get_terms(['taxonomy' => 'practice', 'hide_empty' => false, 'fields' => 'slugs'])));

    $dateCount = count(array_intersect($dates, $archives));

    $className = "news-filter-item";
?>
    <form class="xtech-news-filter">
      <div class="xtech-news-filter-search-form yingke-search-form">
        <div class="input-wrapper">
          <input type="text" name="s" id="search" placeholder="Search by keyword" value="<?php echo get_search_query(); ?>" />
        </div>
        <button class="submit-button"></button>
      </div>

      <div class="xtech-news-filter-section">
        <div>
          <div class="xtech-news-filter-option-label">
            Filters:
          </div>
        </div>
        <div class="xtech-news-filter-options-section" data-option="types">
          <div class="xtech-news-filter-option-label">Type (<span id="types-counter"><?= $typeCount > 0 ? $typeCount : 'all' ?></span>)</div>
          <div class="xtech-news-filter-options-wrapper">
            <div class="xtech-news-filter-options">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="types-all" <?= $typeCount === 0 ? 'checked' : '' ?>>
                <label class="form-check-label" for="types-all">
                  All Types
                </label>
              </div>
              <?php foreach ($newsTypes as $cat) : ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="types[]" value="<?= $cat->slug ?>" id="<?= $cat->slug ?>" <?php echo in_array($cat->slug, $types) ? 'checked' : '' ?>>
                  <label class="form-check-label" for="<?= $cat->slug ?>">
                    <?= $cat->name ?>
                  </label>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
        <div class="xtech-news-filter-options-section" data-option="practices">
          <div class="xtech-news-filter-option-label">Practice (<span id="practices-counter"><?= $practiceCount > 0 ? $practiceCount : 'all' ?></span>)</div>
          <div class="xtech-news-filter-options-wrapper">
            <div class="xtech-news-filter-options">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="practices-all" <?= $practiceCount === 0 ? 'checked' : '' ?>>
                <label class="form-check-label" for="practices-all">
                  All Practices
                </label>
              </div>
              <?php foreach ($newsPractices as $practice) : ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="practices[]" value="<?= $practice->slug ?>" id="<?= $practice->slug ?>" <?php echo in_array($practice->slug, $practices) ? 'checked' : '' ?>>
                  <label class="form-check-label" for="<?= $practice->slug ?>">
                    <?= $practice->name ?>
                  </label>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
        <div class="xtech-news-filter-options-section" data-option="dates">
          <div class="xtech-news-filter-option-label">Date (<span id="dates-counter"><?= $dateCount > 0 ? $dateCount : 'all' ?></span>)</div>
          <div class="xtech-news-filter-options-wrapper">
            <div class="xtech-news-filter-options">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="dates-all" <?= $dateCount === 0 ? 'checked' : '' ?>>
                <label class="form-check-label" for="dates-all">
                  All Dates
                </label>
              </div>
              <?php foreach ($archives as $index => $archive) : ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="dates[]" value="<?= $archive ?>" id="date-<?= $index ?>" <?php echo in_array($archive, $dates) ? 'checked' : '' ?>>
                  <label class="form-check-label" for="date-<?= $index ?>">
                    <?= $archive ?>
                  </label>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
        <div class="xtech-news-filter-clearall"><a id="clear-filter-value" href="#"><?php esc_html_e('Clear All'); ?></a></div>
      </div>
    </form>

<?php

  }

  function get_year_archive_array()
  {
    $years = array();
    $years_args = array(
      'type' => 'monthly',
      'format' => 'custom',
      'before' => '',
      'after' => '|',
      'echo' => false,
      'order' => 'DESC'
    );

    // Get Years
    $years_content = wp_get_archives($years_args);
    if (!empty($years_content)) {
      $years_arr = explode('|', $years_content);
      $years_arr = array_filter($years_arr, function ($item) {
        return trim($item) !== '';
      }); // Remove empty whitespace item from array

      foreach ($years_arr as $year_item) {
        $year_row = trim($year_item);
        preg_match('/href=["\']?([^"\'>]+)["\']>(.+)<\/a>/', $year_row, $year_vars);

        if (!empty($year_vars)) {
          $years[] = $year_vars[2];
        }
      }
    }

    return $years;
  }
}
