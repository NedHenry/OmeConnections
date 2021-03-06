<?php
/**
 * OmeConnections
 *
 * @copyright Copyright 2014 UCSC Library Digital Initiatives
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 */

require_once dirname(__FILE__) . '/helpers/OmeConnectionsFunctions.php';

/**
 * OmeConnections plugin.
 */
class OmeConnectionsPlugin extends Omeka_Plugin_AbstractPlugin
{
    /**
     * @var array Hooks for the plugin.
     */
    protected $_hooks = array('install', 'uninstall', 'upgrade', 'initialize',
			      'config_form', 'config','admin_items_show',
			      'admin_head,');
    /**
     * @var array Filters for the plugin.
     */
    protected $_filters = array('action_contexts','response_contexts');

    /**
     * @var array Options and their default values.
     */
    protected $_options = array(
    );

    /**
     * Install the plugin.
     */
    public function hookInstall()
    {
        // Create the table.
        $db = $this->_db;
	
	$sql = "
        CREATE TABLE IF NOT EXISTS `".$db->prefix."omeconnections_modules` (
          `id` int(10) NOT NULL AUTO_INCREMENT,
          `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
          `slug` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
          `active` boolean NOT NULL,
          `settings` text COLLATE utf8_unicode_ci,
          PRIMARY KEY (`id`),
          key `slug` (`slug`)
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
	echo $sql;
        $db->query($sql);
        
	//Install csv module
	installModule("csv");
	
        $this->_installOptions();
    }

    /*
     *Link new formats to associated views
     */

    public function filterResponseContexts($contexts)
    {
      //die('test!');
      $contexts['METS'] = array('suffix' => 'mets',
				'headers' => array('Content-Type' => 'text/xml')
				);
      return $contexts;

    }


    /*
     * Add new formats to Omeka item output list
     */

    public function filterActionContexts($contexts, $args)
    {
      //die('test!');
      //      if($args['controller'] instanceof ItemsController) {
	$contexts['show'][] = 'METS';
	//}
      return $contexts;
    }

    /*
     * Uninstall the plugin.
     */

    public function hookUninstall()
    {       
        // Drop the table.
        $db = $this->_db;
        $sql = "DROP TABLE IF EXISTS `".$db->prefix."omeconnections_modules`";
        $db->query($sql);

        $this->_uninstallOptions();
    }

    /**
     * Upgrade the plugin.
     *
     * @param array $args contains: 'old_version' and 'new_version'
     */
    public function hookUpgrade($args)
    {
       
    }

    /**
     * Initialize
     */
    public function hookInitialize()
    {
      //$physical = dirname(__FILE__);
      //echo "HEY!!!".src(dirname(__FILE__));
	       
      $view = get_view();
      $view->addAssetPath(dirname(__FILE__),absolute_url("plugins/OmeConnections"));
    }

    /**
     * Display the plugin config form.
     */
    public function hookConfigForm()
    {
        require dirname(__FILE__) . '/config_form.php';
    }

    /**
     * Set the options from the config form input.
     */
    public function hookConfig()
    {
    }

    public function hookAdminItemsShow()
    {
      
      $item = get_current_record('item');
      $itemID = $item->id;

      $downloadLink = url("ome-connections/exporter/export/moduleName/METS/itemID/".$itemID);
      //echo $downloadLink;
      ?>
      <a href="<?php echo $downloadLink;?>" target="_blank">
      <button id="OmeConnections-export-button" > Export </button>
</a>
<?php
    }

    public function hookAdminHead()
    {
      queue_js_file('OmeConnections');
    }

}
