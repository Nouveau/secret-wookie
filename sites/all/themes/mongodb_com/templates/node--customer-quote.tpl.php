<?php render($content['metatags']); ?>
<article<?php print $attributes; ?>>

  <?php if ($display_submitted): ?>
  <footer class="submitted"><?php print $date; ?> -- <?php print $name; ?></footer>
  <?php endif; ?>
  
  <figure<?php print $content_attributes; ?>>
    <blockquote>
    <?php print render($content['body']);?>
    </blockquote>
    <figcaption>
      <?php if (isset($field_quote_name[0]['value'])): ?>
        <span class="quote-name"><?php print $field_quote_name[0]['value']; ?></span>
      <?php endif; ?>
      <?php if (isset($field_quote_company[0]['value'])): ?>
        <span class="quote-company"><?php print $field_quote_company[0]['value']; ?></span>
      <?php endif; ?>
    </figcaption>
  </figure>
  
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
</article>
