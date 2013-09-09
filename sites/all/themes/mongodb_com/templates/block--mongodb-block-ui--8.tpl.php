<?php $tag = $block->subject ? 'section' : 'div'; ?>
<<?php print $tag; ?><?php print $attributes; ?>>
  <div class="block-inner clearfix">
    <?php print render($title_prefix); ?>
    <?php if ($block->subject): ?>
      <h2<?php print $title_attributes; ?>><?php print $block->subject; ?></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    
    <div<?php print $content_attributes; ?>>
      <?php print $content ?>
      <div id="signup">
        <div class="newsletter">
          <h2>Enter email address:</h2>
          <?php print render(node_view(node_load(1536), $view_mode='teaser')); ?>
        </div>
      </div>
    </div>
  </div>
</<?php print $tag; ?>>