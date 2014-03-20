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
      $test = $request->getParam('itemID');
      $view = get_view();
      $view->itemID = $test;
      //action goes here		
    }

}
