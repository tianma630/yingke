<?php

namespace XTech_Yingke;

use Elementor\Repeater;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor SidebarFilter widget.
 */
class Widget_SidebarFilter extends Widget_Base
{

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);
    wp_register_style('sidebar-filter-css', plugins_url('xtech-yingke') . '/assets/styles/sidebar-filter.css');
  }

  public function get_script_depends()
  {
    return [];
  }

  public function get_style_depends()
  {
    return ['sidebar-filter-css'];
  }

  public function get_name()
  {
    return 'Sidebar Filter';
  }

  public function get_title()
  {
    return __('Sidebar Filter', 'yingke');
  }

  public function get_icon()
  {
    return 'eicon-post-info';
  }

  public function get_keywords()
  {
    return ['filter'];
  }

  public function get_categories()
  {
    return ['x-tech'];
  }

  protected function _register_controls()
  {

    $this->start_controls_section(
      'sidebar_filter_settings',
      [
        'label' => __('Sidebar Filter', 'yingke'),
      ]
    );
    
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    
    $tags = get_terms(array('taxonomy' => 'post_tag', 'hide_empty' => false));

    $newsCats = get_terms(array('taxonomy' => 'category', 'hide_empty' => false));
    
    $newsPractices = get_terms(array('taxonomy' => 'practice', 'hide_empty' => false));
    
    $archives = $this->get_year_archive_array();
    
    $hasACF = function_exists('get_field');
?>
    <div class="xtech-news-sidebar-filter">
        <?php
            if ($hasACF):
                $lawyers = get_field('key_contact');
                if ($lawyers && count($lawyers) > 0):
        ?>
                <div class="xtech-news-sidebar-filter-section">
                    <h2><?= __('Key Contact', 'yingke') ?></h2>
                    <ul>
                        <?php foreach ($lawyers as $lawyer): ?>
                        <li>
                            <a class="xtech-lawyers-link" href="<?= get_permalink($lawyer) ?>">
                                <div class="lawyerImg">
                                    <img src="<?= get_field('thumbnail', $lawyer->ID); ?>" />
                                </div>
                                <div class='wording'>
                    			    <div class='title'>
                                        <?= $lawyer->post_title ?>
                                    </div>
                    			    <div class="jobTitle">
                    				    <?= $lawyer->job_title ?>
                                    </div>	
                			  </div>
                            </a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="xtech-news-sidebar-filter-section">
            <h2><?= __('Tags', 'yingke') ?></h2>
            <ul>
                <?php foreach ($tags as $tag): ?>
                <li><a href="<?= home_url('?s=&post_tag=' . $tag->slug) ?>"><?= $tag->name ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="xtech-news-sidebar-filter-section">
            <h2><?= __('Categories', 'yingke') ?></h2>
            <form action="<?= home_url('news-insights'); ?>" method="get">
                <div class="accordions">
                    <div class="accordion" id="types">
                      <div class="accordion-item">
                        <h3 class="accordion-header" id="xtech-news-sidebar-filter-types">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#types-content" aria-expanded="true" aria-controls="types-content">
                            Types
                          </button>
                        </h3>
                        <div id="types-content" class="accordion-collapse collapse show" aria-labelledby="xtech-news-sidebar-filter-types" data-bs-parent="#types">
                          <div class="accordion-body">
                              <?php foreach ($newsCats as $cat): ?>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="types[]" value="<?= $cat->slug ?>" id="<?= $cat->slug ?>">
                                  <label class="form-check-label" for="<?= $cat->slug ?>">
                                    <?= $cat->name ?>
                                  </label>
                                </div>
                              <?php endforeach ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="accordion" id="practices">
                      <div class="accordion-item">
                        <h3 class="accordion-header" id="xtech-news-sidebar-filter-practices">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#practices-content" aria-expanded="true" aria-controls="practices-content">
                            Practices
                          </button>
                        </h3>
                        <div id="practices-content" class="accordion-collapse collapse show" aria-labelledby="xtech-news-sidebar-filter-practices" data-bs-parent="#practices">
                          <div class="accordion-body">
                              <?php foreach ($newsPractices as $practice): ?>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="practices[]" value="<?= $practice->slug ?>" id="<?= $practice->slug ?>">
                                  <label class="form-check-label" for="<?= $practice->slug ?>">
                                    <?= $practice->name ?>
                                  </label>
                                </div>
                              <?php endforeach ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="accordion" id="dates">
                      <div class="accordion-item">
                        <h3 class="accordion-header" id="xtech-news-sidebar-filter-dates">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dates-content" aria-expanded="true" aria-controls="dates-content">
                            Dates
                          </button>
                        </h3>
                        <div id="dates-content" class="accordion-collapse collapse show" aria-labelledby="xtech-news-sidebar-filter-dates" data-bs-parent="#dates">
                          <div class="accordion-body">
                              <?php foreach ($archives as $index => $archive): ?>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="dates[]" value="<?= $archive ?>" id="date-<?= $index ?>">
                                  <label class="form-check-label" for="date-<?= $index ?>">
                                    <?= $archive ?>
                                  </label>
                                </div>
                              <?php endforeach ?>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <button class="sidebar-filter-btn"><?= __('Apply', 'yingke') ?></button>
            </form>
        </div>
    </div>

<?php

  }
  
    function get_year_archive_array() {
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
      if (!empty($years_content) ) {
        $years_arr = explode('|', $years_content);
        $years_arr = array_filter($years_arr, function($item) {
          return trim($item) !== '';
        }); // Remove empty whitespace item from array
    
        foreach($years_arr as $year_item) {
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