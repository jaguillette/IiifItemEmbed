<div aria-live="polite">
  <h3><?php echo link_to_collection(__('Mirador 3 viewer'), array('id' => 'mirador-3-embed-link'), 'mirador3', $collection); ?></h3>
  <label for="mirador-3-embed-code">Embed Code: </label>
  <input style="display:inline-block;" type="text" name="mirador-3-embed-code" id="mirador-3-embed-code" value='<iframe src="<?php echo absolute_url(array("things" => "collections", "id" => $collection->id), 'iiifItemEmbed_Mirador3'); ?>" width="100%" height="600px"></iframe>'>
  <button type="button" name="button" onclick="copyIiifEmbedCode('mirador-3-embed-code')">Copy embed code</button>
  <span id="mirador-3-embed-code-update"></span>
  <script type="text/javascript">
    function copyIiifEmbedCode(containerId) {
      var copyText = document.getElementById(containerId);
      copyText.select();
      document.execCommand("copy");
      var updateSpan = document.getElementById(containerId + "-update");
      updateSpan.textContent = "Copied!";
    }
  </script>
</div>
