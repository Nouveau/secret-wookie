<?php render($content['metatags']); ?>
<article<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if ($view_mode == 'teaser'): ?>
    <?php print render($content['field_downloadable_preview']); ?>
    <header>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node->field_downloadable_file['und'][0]['url']; ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
    </header>
  <?php elseif ($view_mode == 'download'): ?>
    <header>
    <h2<?php print $title_attributes; ?>><?php print $title ?></h2>
  </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
    <?php if ($view_mode == 'download'): ?>
    <p class="button"><a href="<?php print $node->field_downloadable_file['und'][0]['url']; ?>" title="<?php print $title ?>">Download Full Report</a></p>
    <?php endif; ?>
  </div>
  
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
    <?php endif; ?>
  </div>
</article>