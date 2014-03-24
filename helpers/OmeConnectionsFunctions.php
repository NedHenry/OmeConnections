<?php 
function installModule($moduleName)
{


}


function getExportModuleSelectForm()
{
  ob_start();
  ?>
  <form>
    <fieldset>
      <label for="module-select">Export to:</label>
      <select name="module-select" id="module-select" class="text ui-widget-content ui-corner-all">
<?php   foreach($modules as $module)
	  {
	    echo('<option value="'.$module['slug'].'">'.$module['name'].'</option>');
	  }    ?>
    </select>
    </fieldset>
  </form>
  <?php
  return(ob_get_clean());
}

?>