<?php



if(!isset($module))
  die('ERROR: export module not sent to export view script');

if(!isset($itemID))
  die('ERROR: item ID not sent to export view');

if(!$module->installed)
  die('ERROR: '.$moduleName.'export module not installed');

if(!$module->active)
  die('ERROR: '.$moduleName.'export module not activated');

if(!$module->supports_push)
  die('ERROR: '.$moduleName.'export module does not support push');
try{
  echo $module->push($itemID);
} catch (Exception $e) {
    echo 'Exception while pushing item record: ',  $e->getMessage(), "\n";
}
?>
