<?php 
$absolute_url = public_full_url(
  array(
    "things" => $thingType . "s",
    "id" => $thing->id
  ),
  "iiifItemEmbed_Mirador" . $miradorVersion
);
?>
<div aria-live="polite">
  <<?php echo $headingLevel; ?>><?php echo __("Mirador " . $miradorVersion) ?></<?php echo $headingLevel; ?>>
  <p><a href="<?php echo $absolute_url; ?>" id="mirador-<?php echo $miradorVersion; ?>-embed-link">Direct link to Mirador <?php echo $miradorVersion; ?> viewer</a></p>
  <label for="mirador-<?php echo $miradorVersion; ?>-embed-code">Embed Code: </label>
  <input style="display:inline-block;" type="text" name="mirador-<?php echo $miradorVersion; ?>-embed-code" id="mirador-<?php echo $miradorVersion; ?>-embed-code" value='<iframe src="<?php echo $absolute_url; ?>" width="100%" height="600px"></iframe>'>
  <button type="button" name="button" onclick="copyIiifEmbedCode('mirador-<?php echo $miradorVersion; ?>-embed-code')">Copy embed code</button>
  <span id="mirador-<?php echo $miradorVersion; ?>-embed-code-update"></span>
</div>
