<?php render($content['metatags']); ?>
<article<?php print $attributes; ?>>
  
  <?php print render($title_prefix); ?>
  <?php if ($page): ?>
    <header>
    <h1<?php print $title_attributes; ?>><?php print $title ?></h1>
    <header>
  <?php print render($title_suffix); ?>
  
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

<?php elseif($view_mode == 'teaser'): ?>
  <hgroup>
    <h2<?php print $title_attributes; ?>><a href="<?php print render($content['field_p_webinar_url'][0]['#markup']); ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
    <?php foreach($webinar_datetimes AS $date):?>
      <h3><?php print($date); ?></h3>
    <?php endforeach; ?>
  </hgroup>
  
  <?php print render($title_suffix); ?>
  
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content['body']);
      print render($content['field_sponsors']);
    ?>
  </div>

  <?php elseif($view_mode == 'tiny'): ?>
  <?php print '<a href="' . $content['field_p_webinar_url'][0]['#markup'] . '">' . $title . '</a>' . ' (' . $content['field_event_date'][0]['#markup'] . ')'; ?>

  <?php endif; ?>
  
</article>
