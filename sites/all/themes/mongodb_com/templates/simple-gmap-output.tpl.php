<?php
/**
 * @file
 * Displays the Simple Google Maps formatter.
 *
 * Available variables:
 * - $include_map: TRUE if an embedded map should be displayed.
 * - $width: Width of embedded map.
 * - $height: Height of embedded map.
 * - $include_link: TRUE if a link to a map should be displayed.
 * - $link_text: Text of link to display.
 * - $url_suffix: Suffix of URLs to send to Google Maps for embedded and linked
 *   maps. Contains the URL-encoded address.
 * - $zoom: Zoom level for embedded and linked maps.
 * - $information_bubble: TRUE if an information bubble should be displayed on
 *   maps. Note that in the Google Maps URLs, you need to send iwloc=A to use
 *   a bubble, and iwloc= (without the A) to omit the bubble.
 * - $address_text: Address text to display (empty if it should not be
 *   displayed).
 *
 * @ingroup themeable
 */
if (!empty($address_text)) {
?>
<p class="simple-gmap-address"><?php print $address_text; ?></p>
<?php
}
if ($include_map) {
?>
<img src="http://maps.googleapis.com/maps/api/staticmap?center=<?php print $url_suffix; ?>&amp;size=<?php print $width; ?>x<?php print $height; ?>&amp;zoom=<?php print $zoom; ?>&amp;&markers=color:green|<?php print $url_suffix; ?>&amp;sensor=false"></iframe>
<?php
}
if ($include_link) {
?>
<p class="simple-gmap-link"><a href="http://maps.google.com/maps?q=<?php print $url_suffix; ?>&amp;iwloc=<?php print ($information_bubble ? 'A': ''); ?>&amp;z=<?php print $zoom; ?>" target="_blank"><?php print $link_text; ?></a></p>
<?php
}
