<?php
/**
 * Controller for mirador embed views
 */
class IiifItemEmbed_MiradorEmbedController extends IiifItems_BaseController
{
  protected static $allowedThings = array('Collection', 'Item', 'File');

  /**
   * Renders a Mirador 2 viewer for the given collection, item or file.
   * GET :things/mirador2/:id
   *
   * @throws Omeka_Controller_Exception_404
   */
  public function mirador2Action() {
      $type = $this->getParam('things');
      $class = Inflector::camelize(Inflector::singularize($type));
      if (!in_array($class, self::$allowedThings)) {
          throw new Omeka_Controller_Exception_404;
      }
      $this->__passModelToView();
  }

  /**
   * Renders a Mirador 3 viewer for the given collection, item or file.
   * GET :things/mirador3/:id
   *
   * @throws Omeka_Controller_Exception_404
   */
  public function mirador3Action() {
      $type = $this->getParam('things');
      $class = Inflector::camelize(Inflector::singularize($type));
      if (!in_array($class, self::$allowedThings)) {
          throw new Omeka_Controller_Exception_404;
      }
      $this->__passModelToView();
  }
}

?>
