<?php render($content['metatags']); ?>
<article<?php print $attributes; ?>>

<div class="mongodbday-primary">
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

      if($content['field_mongodbday_cfp_duedate']['#items'][0]['value'] > strtotime('-1 day')) {
        print '<h2>Submit a Proposal</h2>
<p>We are always looking for presenters to talk about their experiences with MongoDB. Proposal submissions must be received by '.date('F jS', $content['field_mongodbday_cfp_duedate']['#items'][0]['value']).'. Please submit a presentation on our <a href="/talk-proposal">talk proposal form</a>.</p>';
      }

      if($content['field_event_date']['#items'][0]['value'] > strtotime('-1 day')) {
        print render($content['field_mongodbday_eventbrightid']);
      }
      ?>

      <?php
      $block = module_invoke('tengen_events', 'block_view', 'agenda');
      if (isset($block['content'])): ?>
          <div id="agenda">
              <span class="skip"><a href="#details">Skip to Details</a></span>
              <h2>Schedule</h2>
            <?php print render($block['content']); ?>
          </div>
        <?php endif; ?>

      <?php
      print render($content['field_mongodbday_postagenda']);
      ?>
    </div>
    <div id="details">
        <h2>Location</h2>
        <div class="map">
            <iframe width="300" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=<?php print $field_event_venue[0]['safe_value']; ?>&aq=&sll=&sspn=0.010404,0.0212&vpsrc=6&ie=UTF8&hq=&hnear=<?php print $field_event_location[0]['thoroughfare']; ?> <?php print $field_event_location[0]['locality']; ?>, <?php print $country_name; ?> <?php print $field_event_location[0]['postal_code']; ?>&ll=&spn=0.002137,0.0053&z=14&output=embed&iwloc="></iframe>
        </div>
        <div class="address">
            <h3 class="location"><a href="<?php print render($content['field_mongodbday_venueurl']['#items'][0]['url']); ?>"><?php print render($content['field_event_venue']); ?></a></h3>
            <p><?php print render($content['field_event_location']); ?></p>
            <p><a href="http://maps.google.com/maps?q=<?php print $field_event_venue[0]['safe_value']; ?>&ie=UTF8&hq=&hnear=<?php print $field_event_location[0]['thoroughfare']; ?> <?php print $field_event_location[0]['locality']; ?>, <?php print $country_name; ?> <?php print $field_event_location[0]['postal_code']; ?>&z=14&vpsrc=0&ll=&source=embed">» Get Detailed Map and Directions</a></p>
        </div>
    </div>
</div>
<?php if (views_get_view_result('external_links','block')): ?>
        <div class="mongodbday-secondary">
            <h2>See Also</h2>
          <?php print views_embed_view('external_links','block'); ?>
        </div>
    <?php endif; ?>

  <?php elseif($view_mode == 'teaser'): ?>
    <hgroup>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
        <h3 class="venue">
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
        </h3>
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

  <?php elseif($view_mode == 'tiny'): ?>
  <?php print '<a href="' . $node_url . '">' . $title . '</a>' . ' (' . $content['field_event_date'][0]['#markup'] . ')'; ?>

  <?php endif; ?>

</article>
