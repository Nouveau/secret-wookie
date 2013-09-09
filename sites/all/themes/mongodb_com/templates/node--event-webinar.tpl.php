<?php render($content['metatags']); ?>
<article<?php print $attributes; ?>>
  
<div class="webform-primary">
  <?php print render($title_prefix); ?>
  <?php if ($page): ?>
    <hgroup>
    <h1<?php print $title_attributes; ?>><?php print $title ?></h1>
    <?php foreach($webinar_datetimes AS $date):?>
      <h2 class="date"><?php print($date); ?></h2>
    <?php endforeach; ?>
    </hgroup>
  <?php print render($title_suffix); ?>

  <?php if(!$past_webinar): ?>
    <div class="get-registered">
       <p class="button"><a href="#register">Register Now</a></p>
    </div>
  <?php endif; ?>

  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content['body']);
      print render($presentation_view);
      print render($content['field_webinar_speaker']);
    ?>
  </div>
  
  <div class="node-marketo-form">
    <a name="register"></a>
    <?php /* need to add logic about what form to put in here */ ?>
    <?php if($past_webinar): ?>
      <h2 class="register">Get notified when this webinar happens again</h2>
    <?php else: ?>
      <h2 class="register">Registration</h2>
    <?php endif; ?>
    <?php print $marketo_form; ?>
  </div>
</div>
<?php if (views_get_view_result('external_links','block')): ?>
  <div class="webinar-secondary">
    <h2>See Also</h2>
    <?php print views_embed_view('external_links','block'); ?>
  </div>
<?php endif; ?>

<?php elseif($view_mode == $teaser): ?>
  <hgroup>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
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
    ?>
  </div>
  
  <p><a href="/<?php print drupal_lookup_path('alias','node/'.$node->nid); ?>">Click here</a> for more information.</p>

  <?php elseif($view_mode == 'tiny'): ?>
    <?php print '<a href="' . $node_url . '">' . $title . '</a>' . ' (' . $content['field_event_date'][0]['#markup'] . ')'; ?>

  <?php endif; ?>
  
</article>
