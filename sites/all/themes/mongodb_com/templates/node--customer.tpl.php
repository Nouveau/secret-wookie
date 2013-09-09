<?php render($content['metatags']); ?> 
<article<?php print $attributes; ?>>         

<div class="customer-primary">
  <?php print render($content['field_customer_banner']); ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <header>
    <h1<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h1>
  </header>
  <?php endif; ?>
  
  <?php if ($page && $title): ?>
  <header>
    <h1<?php print $title_attributes; ?>><?php print $title ?></h1>
  </header>
  <?php endif; ?>
  
  <?php print render($title_suffix); ?>
<?php print render($content['body']); ?>

</div>

<div class="customer-secondary">
  <p>
    <?php if (isset($field_customer_industry[0]['taxonomy_term'])): ?>
      <strong>Industry:</strong> <span class="industry"><?php print $field_customer_industry[0]['taxonomy_term']->name; ?></span>
      <br>
    <?php endif; ?>
    <?php if (isset($field_customer_location[0]['value'])): ?>
      <strong>Location:</strong> <span class="location"><?php print $field_customer_location[0]['value']; ?></span>
    <?php endif; ?>
  </p>
  
  <p><strong>Why MongoDB</strong></p>
  <?php print render($content['field_customer_why_mongodb']); ?>
  
  <h2>Other Featured Clients</h2>
  <?php print views_embed_view('customers','block'); ?>
  
</div>
</div>
</article>
