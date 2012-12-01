<?php
/**
 * WPVCAdminConfigAction.
 *
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.1
 * @package wp-vcard
 */
class WPVCAdminConfigAction extends WPVCWPPlugin{
	
	/**
	 * adminConfigForm
	 * 
	 * (default value: null)
	 * 
	 * @var mixed
	 * @access public
	 */
	var $adminConfigForm = null;

	
	/**
	 * adminImportForm
	 * 
	 * (default value: null)
	 * 
	 * @var mixed
	 * @access public
	 */
	var $adminImportForm = null;

	
	/**
	 * WPVCAdminConfigAction function.
	 * 
	 * @access public
	 * @param mixed $plugin_name
	 * @param mixed $plugin_base
	 * @return void
	 */
	function WPVCAdminConfigAction($plugin_name, $plugin_base){
		$this->plugin_name = $plugin_name;
		$this->plugin_base = $plugin_base;
		
		// Load form.
		$this->adminConfigForm = new WPVCAdminConfigForm();
		
		// Before form values are loaded.
		if(null != $_POST['action']) {
			switch($_POST['action']) {
				case 'delete':
					$this->deleteUser();
					break;
			}
		}
		
		
		// Load form values.
		$this->adminConfigForm->loadFormValues();
		
		// After form values are loaded.
		if(null != $_POST['action']) {
			switch($_POST['action']) {
				case 'add':
					
					$this->createUsers();	
					$this->addUser();
					break;
			}
		}
	}

	/**
	 * render function.
	 * 
	 * @access public
	 * @return void
	 */
	function render(){
		$this->render_admin('admin_config', array(
				'form'=>$this->adminConfigForm,
				'plugin_base_url'=>$this->url(),
				'plugin_name'=>$this->plugin_name
		)
		);
	}
	
	/**
	 * deleteUser function.
	 * 
	 * @access public
	 * @return void
	 */
	function deleteUser() {
		$userIds = $_POST['userids'];

		if(null != $userIds) {
			foreach($userIds as $id) {
				if($id != '')
					$this->adminConfigForm->deleteUser($id);
			}
		}
	}
	
	/**
	 * addUser function.
	 * 
	 * @access public
	 * @return void
	 */
	function addUser() {
		$userIds = $_POST['userids'];

		if(null != $userIds) {
			foreach($userIds as $id) {
				if($id != '')
					$this->adminConfigForm->addUser($id);
			}
		}
	}

	
	/**
	 * createUsers function.
	 * 
	 * @access public
	 * @return void
	 */
	function createUsers() {
		$userIds = $_POST['userids'];

		if(null != $userIds) {
			$add_users = $this->adminConfigForm->added_users;
				
			foreach($add_users as $u) {

				if(in_array($u['id'], $userIds)) {

					$user_id = wp_create_user($u['username'], $u['password'], $u['email']);

					if(!$user_id) {
						echo 'failed creating user';
					} else {
						//$this->sendInvite();
					}
				}
			}
		}
	}

	/**
	 * sendInvite function.
	 * 
	 * @access public
	 * @return void
	 */
	function sendInvite() {
		//$message = $text_new_user_notify;
		//$message .= sprintf(__('Username: %s'), $user_login) . "\r\n";
		//$message .= sprintf(__('Password: %s'), $plaintext_pass) . "\r\n\r\n";
		//$message .= site_url('', 'login') . "\r\n";

		$to = 'dligthart@gmail.com';
		$subject = 'test';
		$message = 'testing';

		wp_mail( $to, $subject, $message, $headers = '', $attachments = array() );
		//wp_mail($user_email, sprintf(__('[%s] Inloggegevens'), get_option('blogname')), $message);
	}
}