<?php
if (!defined('IIIF_ITEM_EMBED_DIR')) {
    define('IIIF_ITEM_EMBED_DIR', dirname(__FILE__));
}

class IiifItemEmbedPlugin extends Omeka_Plugin_AbstractPlugin {
  protected $_hooks = array(
    'define_routes',
    'config_form',
    'config',
    'public_items_show',
    'public_collections_show',
    'admin_collections_show_sidebar',
    'admin_items_show_sidebar',
    'admin_head',
    'public_head'
  );

  public function hookConfigForm($args) {
    include "config_form.php";
  }

  public function hookConfig($args) {
    $this->setOptions($args['post']);
  }

  public function setOptions($options)
  {
    foreach ($options as $key => $value) {
      set_option($key,$value);
    }
  }

  protected $iiifItemEmbedCopyFunction = "
  function copyIiifEmbedCode(containerId) {
    var copyText = document.getElementById(containerId);
    copyText.select();
    document.execCommand(\"copy\");
    var updateSpan = document.getElementById(containerId + \"-update\");
    updateSpan.textContent = \"Copied!\";
  }";

  public function hookAdminHead() {
    queue_js_string($this->iiifItemEmbedCopyFunction);
  }

  public function hookPublicHead() {
    queue_js_string($this->iiifItemEmbedCopyFunction);
  }

  public function hookDefineRoutes($args) {
    $args['router']->addConfig(new Zend_Config_Ini(IIIF_ITEM_EMBED_DIR . '/routes.ini', 'routes'));
  }

  public function hookPublicItemsShow() {
    if (get_option('show-embed-codes-on-public-view')) {
      $item = get_current_record('item');
      echo "<h2>" . __("IIIF Embed") . "</h2>";
      echo common("miradorEmbedLink", array("thing" => $item, "headingLevel" => "h3", "miradorVersion" => "2", "thingType" => "item"));
      echo common("miradorEmbedLink", array("thing" => $item, "headingLevel" => "h3", "miradorVersion" => "3", "thingType" => "item"));
    }
  }

  public function hookPublicCollectionsShow() {
    if (get_option('show-embed-codes-on-public-view')) {
      $collection = get_current_record('collection');
      echo "<h2>" . __("IIIF Embed") . "</h2>";
      echo common("miradorEmbedLink", array("thing" => $collection, "headingLevel" => "h3", "miradorVersion" => "2", "thingType" => "collection"));
      echo common("miradorEmbedLink", array("thing" => $collection, "headingLevel" => "h3", "miradorVersion" => "3", "thingType" => "collection"));
    }
  }

  public function hookAdminItemsShowSidebar() {
    $item = get_current_record('item');
    echo("<div class=\"panel\">");
    echo common("miradorEmbedLink", array("thing" => $item, "headingLevel" => "h4", "miradorVersion" => "2", "thingType" => "item"));
    echo common("miradorEmbedLink", array("thing" => $item, "headingLevel" => "h4", "miradorVersion" => "3", "thingType" => "item"));
    echo("</div>");
  }

  public function hookAdminCollectionsShowSidebar() {
    $collection = get_current_record('collection');
    echo("<div class=\"panel\">");
    echo common("miradorEmbedLink", array("thing" => $collection, "headingLevel" => "h4", "miradorVersion" => "2", "thingType" => "collection"));
    echo common("miradorEmbedLink", array("thing" => $collection, "headingLevel" => "h4", "miradorVersion" => "3", "thingType" => "collection"));
    echo("</div>");
  }
}
?>
