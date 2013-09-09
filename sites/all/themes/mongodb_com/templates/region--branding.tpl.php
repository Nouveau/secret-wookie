<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <div class="branding-data clearfix">
      <?php if ($linked_logo_img): ?>
      <div class="logo-img">
        <?php print $linked_logo_img; ?>
      </div>
      <?php endif; ?>
      <?php print $content; ?>
      <div class="login">
        <div class="login-button">
          <span class="text">Log In</span>
          <span class="arrow"></span>
        </div>
        <ul>
          <li><a href="https://jira.mongodb.org/browse/CS">Support</a></li>
          <li><a href="https://mms.10gen.com/">MMS</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>