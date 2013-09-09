<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */
 
function mongodb_com_menu_tree__main_menu($variables) {
  return '<ul id="main-menu">' . $variables['tree'] . '</ul>';
}

function mongodb_com_menu_link__main_menu(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  $element['#attributes']['class'][] = 'menu-'.$element['#original_link']['mlid'];
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function mongodb_com_preprocess_page(&$vars) {
  drupal_add_js('//cdn.optimizely.com/js/21135121.js', 'external');
  drupal_add_js(drupal_get_path('theme', 'mongodb_com') .'/js/jquery-cookie/jquery.cookie.js', 'file');
  drupal_add_js(drupal_get_path('theme', 'mongodb_com') .'/js/rebrand.js', 'file');
  if(drupal_is_front_page()) {
    unset($vars['page']['content']['content']);
  }
  elseif(isset($vars['page']['content']['content']['content']['system_main']['term_heading']) && $vars['page']['content']['content']['content']['system_main']['term_heading']['term']['#bundle'] == 'partner_technologies') {
    unset($vars['page']['content']['content']['content']['system_main']['no_content']);
  }
  elseif(isset($vars['node']) && $vars['node']->type == 'event_mongodbday') {
    drupal_add_js(drupal_get_path('theme', 'mongodb_com') .'/js/agenda.js', 'file');
  }
  drupal_add_js(drupal_get_path('theme', 'mongodb_com') .'/js/forms.js', 'file');
  drupal_add_js(drupal_get_path('theme', 'mongodb_com') .'/js/tagmanager.js', 'file');
}

function mongodb_com_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#size'] = 30;
    $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search-button.png');
    $form['search_block_form']['#attributes']['placeholder'] = t('Search MongoDB.com');
  }
  if ($form_id == 'search_form') {
      if ($form['module']['#value'] == 'google_cse') {
        if (variable_get('google_cse_results_gadget', 1)) {
          $form['basic']['keys']['#title'] = '';
          $form['basic']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/cse-search.png');
        }
      google_cse_sitesearch_form($form);
     }
  }
}

function mongodb_com_html_head_alter(&$head_elements) {
  foreach ($head_elements as $key => $data) {
    if (isset($data['#attributes']) && isset($data['#attributes']['rel']) && $data['#attributes']['rel'] == 'shortlink') {
      unset($head_elements[$key]);
    }
  }
}
?>
