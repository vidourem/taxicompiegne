<?php
// Table headers.
$columns['cb'] = '<input type="checkbox" />';
$columns['name'] =  __('name', 'wp-vcard');
$columns['username'] = 	__('username', 'wp-vcard');
$columns['email'] = 	__('email','wp-vcard');
$columns['password'] = 	__('password', 'wp-vcard');
?>
<!-- wrap -->
<div class="wrap">

<?php if(function_exists('screen_icon')) { screen_icon('users'); } ?>
<h2><?php echo wp_specialchars(__('vCard Imported Users', 'wp-vcard')); ?></h2>

<!--subsubsub menu -->
<div class="filter">
<form id="list-filter" action="" method="get">
<ul class="subsubsub">
  </ul>
</form>
</div>
<!-- end subsubsub menu -->

<!-- data table -->
<form id="posts-filter" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">	
	<!-- navigation -->
	<div class="tablenav" style="margin-bottom:6px;" >

		<!-- pagination -->
		<div class="tablenav-pages">
		
		
				
		</div>
		<!-- end pagination -->

		<!-- bulk actions -->
		<div class="alignleft actions">
			<select name="action">
				<option value="" selected="selected"><?php _e('Bulk Actions', 'wp-vcard'); ?></option>
				<option value="delete"><?php _e('Delete', 'wp-vcard'); ?></option>
				<option value="add"><?php _e('Add user', 'wp-vcard'); ?></option>
			</select>
			
			<input type="submit" value="<?php _e('Apply'); ?>" name="doaction" id="doaction" class="button-secondary action" />
			
		</div>
		<!-- end bulk actions -->

		<br class="clear" />
	</div>
	<!-- end navigation -->

	<?php if ( is_wp_error( $wp_user_search->search_errors ) ) : ?>
	<!-- start error -->
		<div class="error">
			<ul>
			<?php
				//foreach ( $wp_user_search->search_errors->get_error_messages() as $message )
					//echo "<li>$message</li>";
			?>
			</ul>
		</div>
	<!-- end error -->
	<?php endif; ?>

	<!-- data -->
	<table class="widefat fixed" cellspacing="0">
		<thead>
			<tr class="thead">
				<?php include('table-headers.php'); ?>
			</tr>
		</thead>
		
		<?php $i = 0; foreach($form->added_users as $u):  ?>
		
		<?php if(!is_array($_POST['userids']) || !in_array($u['id'], $_POST['userids'])): ?>
			
		<tr class="<?php if($i % 2 == 0){ echo 'alternate '; } $i++; ?>author-self status-publish">
		
		<th class="check-column" scope="row">
			<input type="checkbox" value="<?php echo $u['id']; ?>" name="userids[]"/>
		</th>
	 
		<td><?php echo $u['firstname']?> <?php echo $u['lastname']?></td>
		
		<td><?php echo $u['username']?></td>
		
		<td>
			<?php echo $u['email']?>
		</td>
		
		<td><?php echo $u['password']?></td>
		
		</tr>
		
			<?php endif; ?>
		
		<?php endforeach; ?>

	</table>
	<!-- end data -->

</form>
<!-- end data table -->
<div class="tablenav">
	<br class="clear"/>
</div>
</div> <!-- end wrap -->