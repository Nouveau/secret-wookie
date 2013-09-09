<?php render($content['metatags']); ?>
<article<?php print $attributes; ?>>
  <?php print render($content['field_partner_logo']); ?>
  
<div class="partner-primary">
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <header>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  </header>
  <?php endif; ?>
  
  <?php if ($page && $title): ?>
  <header>
    <h1<?php print $title_attributes; ?>><?php print $title ?></h1>
  </header>
  <?php endif; ?>
  
  <?php print render($title_suffix); ?>
  
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content['body']);
    ?>
  </div>
  
  <div class="node-marketo-form">
    <?php if (!empty($content['links'])): ?>
      <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
    <?php endif; ?>

    <?php if ($field_partner_marketo_form[0]['value']): ?>
    <h2>Learn more about <?php print $title; ?> and MongoDB</h2>
    <p>For more information about MongoDB and <?php print $title; ?>, please fill out this form. A representative will be in touch with you shortly.</p>
    <?php $partner_form = node_load(1445); ?>
    <?php print render(node_view($partner_form, $view_mode='teaser')); ?>
    <?php endif; ?>
  </div>
</div>
<?php if (views_get_view_result('external_links','block')): ?>
  <div class="partner-secondary">
    <h2>See Also</h2>
    <?php print views_embed_view('external_links','block'); ?>
  </div>
<?php endif; ?>
</article>
