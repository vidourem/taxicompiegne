<?php
/**
 * WPVCAdminConfigForm model object.
 * @author Dave Ligthart <info@daveligthart.com>
 * @version 0.1
 * @package wp-vcard
 */
include_once('WPVCBaseForm.php');
class WPVCAdminConfigForm extends WPVCBaseForm{

	var $added_users;
	
	var $vcard_data;
	
	function WPVCAdminConfigForm(){
		parent::WPVCBaseForm();
	}
	
	function loadFormValues() {
	
		 $this->vcard_data = $_POST['wpvc_import'];
		 
		 $del_user_ids = array();
		 $add_user_ids = array();
		 
		 // Save or load vcard data.
		 if('' != $this->vcard_data) {
		 	$this->saveOption('wpvc_tempdata', $this->vcard_data);
		 	$this->saveOption('wpvc_del_user_ids', '');
		 	$this->saveOption('wpvc_add_user_ids', '');
		 }
		 else {
		 	$this->vcard_data = $this->loadOption('wpvc_tempdata');
		 	$del_user_ids = explode(',', $this->loadOption('wpvc_del_user_ids'));
		 	$add_user_ids = explode(',', $this->loadOption('wpvc_add_user_ids'));
		 	//print_r($del_user_ids);
		 }
		 
		 if($this->loadOption('wpvc_tempdata') != $this->vcard_data) {
		 		$this->saveOption('wpvc_tempdata', $this->vcard_data);
		 		$this->saveOption('wpvc_del_user_ids', '');
		 	    $this->saveOption('wpvc_add_user_ids', '');
		 }
		 
 		 // instantiate a parser object
	     $parse = new Contact_Vcard_Parse();
		
	     // parse a vCard file and store the data
	     // in $cardinfo
	     $cardinfo = $parse->fromText($this->vcard_data);
	 
		 $add_users = array();
		 
		 $i = 1;
		 
		 foreach($cardinfo as $card) {
		 	$lastname = trim(stripslashes($card['N'][0]['value'][0][0]));

		 	$firstname = trim(stripslashes($card['N'][0]['value'][1][0]));

			$email = trim(stripslashes($card['EMAIL'][0]['value'][0][0]));

			$user_pass = wp_generate_password();

			$user_login = $email;
			
			if((!in_array($i, $del_user_ids) || $del_user_ids == null) && (!in_array($i, $add_user_ids) || $add_user_ids == null)) { //check for deleted user.
				
				if($email != '' && $user_pass != '') {
					$add_users[] = array('id'=>$i, 'firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'password'=>$user_pass,'username'=>$user_login);
				}	
			}
			
			$i++;
		}

		$this->added_users = $add_users;
		
		
	}
	
	function clearData() {
		$this->saveOption('wpvc_tempdata', $this->vcard_data);
		$this->saveOption('wpvc_del_user_ids', '');
		$this->saveOption('wpvc_add_user_ids', '');
	}
	
	function getAddedUsers() {
		return $this->added_users;
	}
	
	function deleteUser($id) {
		$deleted_user_ids = $this->loadOption('wpvc_del_user_ids');
		
		$deleted_user_ids.= $id . ',';
		
		$this->saveOption('wpvc_del_user_ids', $deleted_user_ids);
		
		return true;
	}
	
	function addUser($id) { 
		$added_user_ids = $this->loadOption('wpvc_add_user_ids');
		
		$added_user_ids .= $id . ',';
		
		$this->saveOption('wpvc_add_user_ids', $added_user_ids);
		
		return true;
	}
}
?>