<?php render($content['metatags']); ?>
<article<?php print $attributes; ?>>
  
<?php print render($title_prefix); ?>
<?php if ($page): ?>
  <hgroup>
  <h1<?php print $title_attributes; ?>><?php print $title ?></h1>
  <h2 class="venue">    
    <?php 
      print render($content['field_event_date']); 
      if ($content['field_event_location'][0]['#address']['locality'] != '') {
        print render($content['field_event_location'][0]['#address']['locality']);
      }
      if ($content['field_event_location'][0]['#address']['locality'] !='' && $content['field_event_location'][0]['#address']['administrative_area'] != ''){
        print ', ';
      }
      if ($content['field_event_location'][0]['#address']['administrative_area'] != '') {
        print render($content['field_event_location'][0]['#address']['administrative_area']); 
      }
      if (($content['field_event_location'][0]['#address']['administrative_area'] != '' && isset($country_name)) || ($content['field_event_location'][0]['#address']['locality'] != '' && isset($country_name))) {
        print ', ';
      }
      if (isset($country_name)) {
        print $country_name; 
      } ?>
    </h2>
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

<?php elseif($view_mode == 'teaser'): ?>
  <hgroup>
    <h2<?php print $title_attributes; ?>><a href="<?php print render($content['field_extevent_url'][0]['#markup']); ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
    <h3 class="venue">
    <?php 
      print render($content['field_event_venue'][0]);
      if ($content['field_event_venue'][0] !=''){
        print ', ';
      }
      if ($content['field_event_location'][0]['#address']['locality'] != '') {
        print render($content['field_event_location'][0]['#address']['locality']);
      }
      if ($content['field_event_location'][0]['#address']['locality'] !='' && $content['field_event_location'][0]['#address']['administrative_area'] != ''){
        print ', ';
      }
      if ($content['field_event_location'][0]['#address']['administrative_area'] != '') {
        print render($content['field_event_location'][0]['#address']['administrative_area']); 
      }
      if (($content['field_event_location'][0]['#address']['administrative_area'] != '' && isset($country_name)) || ($content['field_event_location'][0]['#address']['locality'] != '' && isset($country_name))) {
        print ', ';
      }
      if (isset($country_name)) {
        print $country_name; 
      } ?>
      </h3> 
    <h3 class="date"><?php print render($content['field_event_date']) ?></h3>
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
    <?php print '<a href="' . $content['field_extevent_url'][0]['#markup'] . '">' . $title . '</a>' . ' (' . $content['field_event_date'][0]['#markup'] . ')'; ?>

  <?php endif; ?>
  
</article>
