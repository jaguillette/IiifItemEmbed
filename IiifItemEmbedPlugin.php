<?php
if (!defined('IIIF_ITEM_EMBED_DIR')) {
    define('IIIF_ITEM_EMBED_DIR', dirname(__FILE__));
}

class IiifItemEmbedPlugin extends Omeka_Plugin_AbstractPlugin {
  protected $_hooks = array(
    'define_routes',
    'public_items_show',
    'public_collections_show'
  );

  public function hookDefineRoutes($args) {
    $args['router']->addConfig(new Zend_Config_Ini(IIIF_ITEM_EMBED_DIR . '/routes.ini', 'routes'));
  }

  public function hookPublicItemsShow() {
    $item = get_current_record('item');
    echo "<h2>" . __("IIIF Embed") . "</h2>";
    echo common("mirador2ItemEmbedLink", array("item" => $item));
    echo common("mirador3ItemEmbedLink", array("item" => $item));
  }

  public function hookPublicCollectionsShow() {
    $collection = get_current_record('collection');
    echo "<h2>" . __("IIIF Embed") . "</h2>";
    echo common("mirador2CollectionEmbedLink", array("collection" => $collection));
    echo common("mirador3CollectionEmbedLink", array("collection" => $collection));
  }
}
?>
