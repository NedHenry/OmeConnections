<?php
/**
 * The export controller class.
 *
 * @package OmeConnections
 */
 
class OmeConnections_exporterController extends Omeka_Controller_AbstractActionController
{
    public function exportAction()
    {
      $request = $this->getRequest();
      $itemID = $request->getParam('itemID');
      $moduleName = $request->getParam('moduleName');

      
      if(!isset($moduleName)||$moduleName=="")
	die('ERROR: export module name not defined');

      if(!isset($itemID))
	die('ERROR: item ID not passed to export controller');

      $moduleDir = str_replace("controllers","modules/",dirname(__FILE__));

      try{
	include($moduleDir."OmeConnections_Abstract_Module.php");
	include($moduleDir.$moduleName.".php");
      }catch (Exception $e) {
	echo 'Exception while loading export module: ',  $e->getMessage(), "\n";
      }

      $moduleName .= "_module";
      
      try{
	$module = new $moduleName;
      }catch (Exception $e) {
	echo 'Exception while instantiating export module: ',  $e->getMessage(), "\n";
      }
      //print_r($module);
      
      $view = get_view();
      $view->itemID = $itemID;
      $view->moduleName = $moduleName;
      $view->module = $module;
      //action goes here		
    }

}
