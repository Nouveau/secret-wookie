<?php render($content['metatags']); ?>
<article<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <header>
    <h2<?php print $title_attributes; ?>><?php if (isset($field_link[0]['url'])): ?><a href="<?php print $field_link[0]['url']; ?>" title="<?php print $title; ?>"><?php print $title; ?></a><?php else: ?><?php print $title; ?><?php endif; ?></h2>
  </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($display_submitted): ?>
  <div class="submitted"><?php if (isset($field_date[0]['value'])): ?><?php print date("F j, Y",$field_date[0]['value']) ; ?><?php endif; ?>
  <?php if (isset($field_source[0]['value'])): ?>
   --
  <?php print $field_source[0]['value']; ?>
  <?php endif; ?>
  </div>
  <?php endif; ?>

  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content['body']);
    ?>
  </div>

</article>
