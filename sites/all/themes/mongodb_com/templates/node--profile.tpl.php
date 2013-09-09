<?php render($content['metatags']); ?>
<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  if ($view_mode == "full") {
    print "<article".$attributes.">";
      print "<div".$content_attributes.">";
        print render($content);
      print "</div>";
    print "</article>";
  }
  elseif ($view_mode == "teaser") {
    print "<h2>".$title;
    if (isset($field_profile_title[0]['value'])) {
      print ", ".$field_profile_title[0]['value'];
    }
    if (isset($field_profile_company[0]['value'])) {
      print ", ".$field_profile_company[0]['value']."</h2>";
    }
  }
  elseif ($view_mode == "tiny") {
    print $title;
    if (isset($field_profile_title[0]['value'])) {
      print ", ".$field_profile_title[0]['value'];
    }
    if (isset($field_profile_company[0]['value'])) {
      print ", ".$field_profile_company[0]['value'];
    }
  }
  elseif ($view_mode == "presentations") {
    $bio_head = $content['body'] ? ": <span class='subhead'>About the speaker</span>" : '';
    print "<h2 class='speaker'>".$title.$bio_head."</h2>";
    print render($content['body']);
  }  
?>
