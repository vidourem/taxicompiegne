<?php
/**
 * WPVCAdminAction.
 
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.1
 * @package wp-vcard
 */
class WPVCAdminAction extends WPVCWPPlugin{

	var $adminConfigAction;
	
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @param mixed $plugin_name
	 * @param mixed $plugin_base
	 * @return void
	 */
	function __construct($plugin_name, $plugin_base) {
		
		$this->WPVCAdminAction($plugin_name, $plugin_base);
	}
	
	/**
	 * WPVCAdminAction function.
	 * 
	 * @access public
	 * @param mixed $plugin_name
	 * @param mixed $plugin_base
	 * @return void
	 */
	function WPVCAdminAction($plugin_name, $plugin_base){

		global $wp_version;

		$this->plugin_name = $plugin_name;

		$this->plugin_base = $plugin_base;

		$this->add_action('admin_head'); // header rendering.

		$this->add_action('admin_menu'); // menu rendering.

		if(null != $_POST['action']) {
			
			switch($_POST['action']) {
				case 'delete':
					$this->add_action('admin_notices', 'display_deleted_message');
				break;
			}
		}
	}


	/**
	 * display_deleted_message function.
	 * 
	 * @access public
	 * @return void
	 */
	function display_deleted_message() {
		echo "<div id='message' class='updated fade'><p><strong>". __('Deleted user from vcard', 'wp-vcard')."</strong></p></div>";
	}

	
	/**
	 * display_added_message function.
	 * 
	 * @access public
	 * @return void
	 */
	function display_added_message() {
		echo "<div id='message' class='updated fade'><p><strong>". __('Added user to WordPress', 'wp-vcard')."</strong></p></div>";
	}

	/**
	 * Render admin views.
	 * Called by admin_menu.
	 * @access private
	 */
	function renderView() {

		$sub = $this->getAction();

		$url = $this->getActionUrl();

		switch($sub){
		default:
		case 'main':
			$this->admin_start();
			break;
		}
	}

	
	/**
	 * activate function.
	 * 
	 * @access public
	 * @return void
	 */
	function activate() {

	}
	
	/**
	 * admin_head function.
	 * 
	 * @access public
	 * @return void
	 */
	function admin_head(){
		$this->render_admin('admin_head', array('plugin_name'=>$this->plugin_name));
	}

	/**
	 * admin_menu function.
	 * 
	 * @access public
	 * @return void
	 */
	function admin_menu(){

		if(function_exists('add_users_page')) {
			add_users_page(__('Import vCard', 'wp-vcard'),
				__('Import vCard', 'wp-vcard'),
				10,
				basename($this->dir()),
				array (&$this, 'renderView')
			);
		} else if (function_exists('add_options_page')) {
				add_options_page(__('WP-vCard', 'wp-vcard'),
					__('WP-vCard', 'wp-vcard'),
					10,
					basename($this->dir()),
					array (&$this, 'renderView')
				);
			}
	}

	/**
	 * admin_start function.
	 * 
	 * @access public
	 * @return void
	 */
	function admin_start(){
		
		$this->adminConfigAction = new WPVCAdminConfigAction($this->plugin_name, $this->plugin_base);
		
		$this->adminConfigAction->render();
	}
}
?>