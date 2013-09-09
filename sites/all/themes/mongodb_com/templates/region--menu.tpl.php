<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <?php if ($main_menu): ?>
    <nav class="navigation">
      <?php print '<h2 class="element-invisible">Main menu</h2>';?>
      <?php print drupal_render($main_menu_expanded);?>
    </nav>
    <?php endif; ?>
    <?php print $content; ?>
  </div>
</div>
