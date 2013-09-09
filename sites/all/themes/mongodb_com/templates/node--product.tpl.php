<?php render($content['metatags']); ?>
<article<?php print $attributes; ?>>
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
      print render($content['body']);
    ?>
    <div id="product-purchase-form">
      <h2>Buy Now</h2>
      <?php if($content['product:commerce_price']['#bundle'] == 'subscription') : ?>
      <?php print render($content['field_product_item']); ?>
      <p>We will reach out to you within approximately 1-2 business days of purchasing online.<br />
      Subscriptions can only be purchased online in the US. Outside the US? <a href="/contact">Contact us</a> and we'll process your order right away.</p>
      <?php else: ?>
        <table>
          <tr>
            <th>Item</th>
              <?php if($content['field_product_item']['#items'][0]['product_id'] == 1): ?>
                <th>Cost per Hour</th>
                <th>Hours</th>
              <?php else: ?>
                <th>Cost</th>
                <th>Quantity</th>
              <?php endif; ?>
          </tr>
          <?php $content['field-product-item'][0]['quantity']['#title-display'] = 'none'; ?>
          <tr>
              <td><?php print $title; ?></td>
              <td><?php print render($content['product:commerce_price']); ?></td>
              <td><?php print render($content['field_product_item']); ?></td>
          </tr>
        </table>
        <?php endif; ?>
      </div>
  </div>
  
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <nav class="links node-links clearfix"><?php print render($content['links']); ?></nav>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
</article>