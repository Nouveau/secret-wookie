<?php render($content['metatags']); ?>
<article<?php print $attributes; ?> xmlns="http://www.w3.org/1999/html">
  <?php print render($content['field_external_link_image']); ?>
    <header>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
    </header>
  <?php print render($content['field_external_link_text']); ?>
  <a href="<?php print render($content['field_external_link_url']); ?>">Read More</a>
</article>