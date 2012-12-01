<?php
/*
Plugin Name: WP-vCard
Plugin URI: http://daveligthart.com
Description: Import users from vcard file format. Works with e.g linkedin and gmail.
Version: 1.1
Author: Dave Ligthart
Author URI: http://daveligthart.com
*/

include_once(dirname(__FILE__) . '/classes/util/class.vcard.php');
include_once(dirname(__FILE__) . '/classes/model/WPVCAdminConfigForm.php');
include_once(dirname(__FILE__) . '/classes/util/WPVCWPPlugin.php');
include_once(dirname(__FILE__) . '/classes/action/WPVCAdminAction.php');
include_once(dirname(__FILE__) . '/classes/action/WPVCAdminConfigAction.php');
include_once(dirname(__FILE__) . '/classes/util/com.daveligthart.util.wordpress.php');

/**
 * WPVCARDMain.
 *
 * @author dligthart <info@daveligthart.com>
 * @version 1.1
 */
class WPVCARDMain extends WPVCWPPlugin {

	/**
	 * adminAction
	 * 
	 * (default value: null)
	 * 
	 * @var mixed
	 * @access public
	 */
	var $adminAction = null;
		 
	/**
	 * WPVCARDMain function.
	 * 
	 * @access public
	 * @param mixed $path
	 * @return void
	 */
	function WPVCARDMain($path) {

		$plugin_url = trailingslashit(get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename($path) );

		$this->register_plugin('wp-vcard', $path);

		if (is_admin()) {
			
			$this->adminAction = new WPVCAdminAction($this->plugin_name, $this->plugin_base);
		} 
	}
}

// Start app.
$wpvcard = new WPVCARDMain(__FILE__);

?>