<?php render($content['metatags']); ?>
<article<?php print $attributes; ?>>
  <?php if ($view_mode != 'rotator'): ?>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <header>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($display_submitted): ?>
  <footer class="submitted"><?php print $date; ?> -- <?php print $name; ?></footer>
  <?php endif; ?>  
  
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
  <?php else: ?>
  <div class="slide" style="background: url(<?php print file_create_url($content['field_external_link_image']['#items'][0]['uri']); ?>)">
    <div class="text">
      <header>
        <h2<?php print $title_attributes; ?>><?php print $title ?></h2>
      </header>
      <?php print render($content['field_external_link_text']); ?>
      <p class="button"><a href="<?php print $content['field_external_link_url']['#items'][0]['url']; ?>">Read More</a></p>
    </div>
  </div>
  <?php endif; ?>
</article>