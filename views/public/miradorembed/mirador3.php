<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <script src="https://unpkg.com/mirador@latest/dist/mirador.min.js"></script>
  </head>
  <body>
    <div id="viewer"></div>
    <?php
    if ($type != 'collections' || !IiifItems_Util_Collection::isCollection($thing)) {
      $thingId = $thing->$id;
      $manifestUri = absolute_url(array('things' => $type, 'id' => $thing->id), 'iiifitems_manifest');
      $manifestSource = metadata($thing, array("Dublin Core", "Source"));
    } else {
      $manifests = array();
      foreach (IiifItems_Util_Collection::findSubmanifestsFor($thing) as $submanifest) {
        $manifest_url = absolute_url(array('things' => $type, 'id' => $submanifest->id), 'iiifitems_manifest');
        $manifest_source = metadata($submanifest, array("Dublin Core", "Source"));
        $manifests[] = array("url"=>$manifest_url, "source"=>$manifest_source);
      }
    }
    ?>
    <script type="text/javascript">
      <?php if (isset($manifestUri)): ?>
      var mirador = Mirador.viewer({
        "id": "viewer",
        "language": "<?php echo str_replace('_', '-', Zend_Registry::get('bootstrap')->getResource('Locale')->toString()); ?>",
        "manifests": { "<?php echo $manifestUri; ?>":{} },
        "windows": [
          {
            "loadedManifest": "<?php echo $manifestUri; ?>",
            "thumbnailNavigationPosition": 'far-bottom'
          }
        ]
      });
      <?php else: ?>
      var mirador = Mirador.viewer({
        "id": "viewer",
        "language": "<?php echo str_replace('_', '-', Zend_Registry::get('bootstrap')->getResource('Locale')->toString()); ?>",
        "manifests": {
          <?php foreach ($manifests as $manifest) : ?>
            "<?php echo $manifest; ?>": {},
          <?php endforeach; ?>
        },
        "catalog": [
          <?php foreach ($manifests as $manifest) : ?>
          { "manifestId": "<?php echo $manifest["url"]; ?>", "provider": "<?php echo $manifest["source"] ?>" },
          <?php endforeach; ?>
        ]
      });
      mirador.store.dispatch({type: 'mirador/SET_WORKSPACE_ADD_VISIBILITY', isWorkspaceAddVisible: true});
      <?php endif; ?>
    </script>
  </body>
</html>
