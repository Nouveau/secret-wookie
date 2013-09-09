<?php render($content['metatags']); ?>
<article<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <header>
    <h2<?php print $title_attributes; ?>><?php if (!$page): ?><a href="<?php print url('node/' . $node->nid); ?>" title="<?php print $title; ?>"><?php print $title; ?></a><?php else: ?><?php print $title; ?><?php endif; ?></h2>
  </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <div class="sharethis-wrapper"><?php print render($content['sharethis']); ?></div>
  <?php if ($display_submitted): ?>
  <div class="submitted"><?php if (isset($field_blog_post_date['und'][0]['value'])): ?><?php print date("F j, Y",$field_blog_post_date['und'][0]['value']) ; ?><?php endif; ?>
  <?php if (isset($field_blog_post_author[0]["entity"]->title)): ?>
   by 
  <?php print $field_blog_post_author[0]["entity"]->title ?>
  <?php endif; ?>
	<?php	if (user_access('view disqus comments') && isset($node->disqus)): ?>
	 | <a href="<?php print $node_url; ?>#disqus_thread">Comments</a>
	<?php endif; ?>
  </div>
  <?php endif; ?>

  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content['body']);
    ?>
    <?php if ($page): ?>
      <div id="disqus_thread"></div>
      <script type="text/javascript">
          var disqus_shortname = '10genblog'; // required: replace example with your forum shortname
          var disqus_url = 'http://www.10gen.com/<?php print $node_url; ?>';

          /* * * DON'T EDIT BELOW THIS LINE * * */
          (function() {
              var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
              dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
              (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
          })();
      </script>
      <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
      <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    <?php endif; ?>

    <script type="text/javascript">
        var disqus_shortname = '10genblog'; // required: replace example with your forum shortname
        var disqus_url = 'http://www.10gen.com/<?php print $node_url; ?>';

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function () {
            var s = document.createElement('script'); s.async = true;
            s.type = 'text/javascript';
            s.src = '//' + disqus_shortname + '.disqus.com/count.js';
            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        }());
    </script>
  </div>

</article>
