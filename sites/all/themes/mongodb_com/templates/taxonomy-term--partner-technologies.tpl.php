<?php

/**
 * @file
 * Default theme implementation to display a term.
 *
 * Available variables:
 * - $name: the (sanitized) name of the term.
 * - $content: An array of items for the content of the term (fields and
 *   description). Use render($content) to print them all, or print a subset
 *   such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $term_url: Direct url of the current term.
 * - $term_name: Name of the current term.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - taxonomy-term: The current template type, i.e., "theming hook".
 *   - vocabulary-[vocabulary-name]: The vocabulary to which the term belongs to.
 *     For example, if the term is a "Tag" it would result in "vocabulary-tag".
 *
 * Other variables:
 * - $term: Full term object. Contains data that may not be safe.
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $page: Flag for the full page state.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the term. Increments each time it's output.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_taxonomy_term()
 * @see template_process()
 */
?>
<?php render($content['metatags']); ?>
<div id="taxonomy-term-<?php print $term->tid; ?>" class="<?php print $classes; ?>">

  <?php if (!$page): ?>
    <h2><a href="<?php print $term_url; ?>"><?php print $term_name; ?></a></h2>
  <?php endif; ?>

  <div class="content">
    <?php print render($content['description']); ?>
    <?php if($view_mode == 'tiny'): ?>
    <a href="<?php print $term_url; ?>" class="read-more">Learn More ></a>
    <?php elseif($view_mode == 'full'): ?>

    <?php
    // We should move these to blocks and get the block titles functioning correctly.
      $view = views_get_view('partners');
      $strategic = $view->preview('strategic');
      if(!empty($view->result)) {
        print "<div class='partner-level clearfix'><h2>MongoDB Strategic Partners</h2>";
        print $strategic."</div>";
      }
    $view = views_get_view('partners');
      $advanced = $view->preview('advanced');
      if(!empty($view->result)) {
        print "<div class='partner-level clearfix'><h2>MongoDB Advanced Partners</h2>";
        print $advanced."</div>";
      }
    $view = views_get_view('partners');
      $ready = $view->preview('ready');
      if(!empty($view->result)) {
        print "<div class='partner-level clearfix'><h2>MongoDB Ready Partners</h2>";
        print $ready."</div>";
      }
    ?>
    <?php endif; ?>
  </div>

</div>
