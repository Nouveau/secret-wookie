<?php
$ext_links = array();
if (isset($field_lead_profile_linkedin['und'][0])) {
	$attr = array();
	foreach($field_lead_profile_linkedin['und'][0]['attributes'] as $key => $value) {
		$attr[] = $key . '="' . $value . '"';
	}
	$attr = implode(' ', $attr);
	$ext_links[] = '<a ' . $attr . ' href="' . $field_lead_profile_linkedin['und'][0]['url'] . '">' . $field_lead_profile_linkedin['und'][0]['title'] . '</a>';
}
if (isset($field_lead_profile_twitter['und'][0])) {
	$attr = array();
	foreach($field_lead_profile_twitter['und'][0]['attributes'] as $key => $value) {
		$attr[] = $key . '="' . $value . '"';
	}
	$attr = implode(' ', $attr);
	$ext_links[] = '<a ' . $attr . ' href="' . $field_lead_profile_twitter['und'][0]['url'] . '">' . $field_lead_profile_twitter['und'][0]['title'] . '</a>';
}
if (isset($field_lead_profile_blog['und'][0])) {
	$attr = array();
	foreach($field_lead_profile_blog['und'][0]['attributes'] as $key => $value) {
		$attr[] = $key . '="' . $value . '"';
	}
	$attr = implode(' ', $attr);
	$ext_links[] = '<a ' . $attr . ' href="' . $field_lead_profile_blog['und'][0]['url'] . '">' . $field_lead_profile_blog['und'][0]['title'] . '</a>';
}
if (isset($field_lead_profile_github['und'][0])) {
	$attr = array();
	foreach($field_lead_profile_github['und'][0]['attributes'] as $key => $value) {
		$attr[] = $key . '="' . $value . '"';
	}
	$attr = implode(' ', $attr);
	$ext_links[] = '<a ' . $attr . ' href="' . $field_lead_profile_github['und'][0]['url'] . '">' . $field_lead_profile_github['und'][0]['title'] . '</a>';
}
$ext_links = implode('<span style="line-height: 1.538em;"> | </span>', $ext_links);
?>
<h2<?php print $title_attributes; ?>><?php print $title ?><?php print (isset($field_lead_profile_title['und'][0]["safe_value"]) ? ', ' . $field_lead_profile_title['und'][0]["safe_value"] : ''); ?></h2>
<?php if ($ext_links): ?>
	<p><?php print $ext_links; ?></p>
<?php endif; ?>
<?php
  // We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  print render($content);
?>