<?php
/**
 * Admin config template
 .
 * @author dligthart <info@daveligthart.com>
 * @version 0.3
 * @package wp-vcard
 */

// Security.
$user = wp_get_current_user();
?>

<?php if($user->caps['administrator']): ?>

<div class="wrap">
	<?php if(function_exists('screen_icon')) { screen_icon('users'); } ?>	
	<h2><?php _e('vCard Import Users', 'wp-vcard');?></h2>
	
	<form name="wp-vcard_config_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<?php
		//$form->htmlFormId();
		?>
		<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
		<tr>
		<th scope="row">
			<?php _e('vCard data providers', 'wp-vcard'); ?>
		</th>
		<td><br/>
	
			<ul>
				<li><strong>LinkedIn</strong>: <a href="http://www.linkedin.com/addressBookExport?exportNetworkRedirect=&outputType=vcard" target="_blank" title="Download linkedin contact vcard data"><?php _e('contacts', 'wp-vcard'); ?></a><br/><small><?php _e('Fill in captcha text, click on export', "wp-vcard");?></small></li>
				<li><strong>GMail</strong>: <a href="http://mail.google.com/mail/?hl=nl&shva=1#contacts" target="_blank" title="Download gmail contact vcard data"><?php _e('contacts', 'wp-vcard'); ?></a><br/><small><?php _e('Under contacts -> export -> choose vcard format', "wp-vcard");?></small></li>
			</ul>
			
			<?php _e('Suggest an additional provider, ', 'wp-vcard')?><a href="mailto:dligthart@gmail.com?subject=wp-vcard" target="_blank" title="<?php _e('Mail suggestion','wp-vcard'); ?>"><?php _e('mail me', 'wp-vcard'); ?></a>!
		</td>
		</tr>
		
	
		<?php /* <tr>
			<th scope="row">
				<label for="file"><?php _e('Choose vCard file');?>:</label>
			</th>
			<td>
				<input type="file" name="file" id="file" /> 			
				<br/>
				<?php _e('upload vcard file', 'wp-vcard'); ?>
			</td>
		</tr> */ ?>
		
		<?php wpvc_load_admin_block('form-textarea',
			array(
			'input_key'=>'wpvc_import',
			'input_value'=>$form->vcard_data,
			'input_description'=>__('Copy the contents of a vCard file; multiple vcards allowed. <br/>vCard file type: <strong>.vcf</strong>', 'wp-vcard'),
			'label_name'=>__('vCard data', 'wp-vcard'))
		);
		?>

		</table>
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Preview import','wp-vcard'); ?>" />
		</p>
		
	</form>
</div>

<?php if($form->getAddedUsers() != null) : ?>
<?php require_once('blocks/list-users.php'); 
	  else: 
?>


<?php endif; endif; ?>

	   <a style="float:left; margin-right:10px;" href="http://daveligthart.com" target="_blank" title="<?php _e('Like'); ?>">
	   		<img src="<?php echo plugins_url( 'resources/images/thumbsup.png' , dirname(dirname(__FILE__))); ?>" width="32" height="32" alt="<?php _e('I Like', 'wct'); ?>" />
	   	</a>
 
	   <div style="margin:15px 0px;"> 
	   		<span><?php _e('By', 'wct'); ?></span>  <a href="http://daveligthart.com" target="_blank" title="<?php _e('Created by DaveLigthart.com', 'wct'); ?>">
	   		<span>Dave</span> <span>Ligthart</span></a> 
	    	<cite><?php _e('Happy to be of service.', 'wct'); ?></cite> 
	   </div>
