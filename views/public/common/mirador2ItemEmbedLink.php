<div aria-live="polite">
  <h3><?php echo link_to_item(__('Mirador 2 viewer'), array('id' => 'mirador-2-embed-link'), 'mirador2', $item); ?></h3>
  <label for="mirador-2-embed-code">Embed Code: </label>
  <input style="display:inline-block;" type="text" name="mirador-2-embed-code" id="mirador-2-embed-code" value='<iframe src="<?php echo absolute_url(array("things" => "item", "id" => $item->id), 'iiifItemEmbed_Mirador2'); ?>" width="100%" height="600px"></iframe>'>
  <button type="button" name="button" onclick="copyIiifEmbedCode('mirador-2-embed-code')">Copy embed code</button>
  <span id="mirador-2-embed-code-update"></span>
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
