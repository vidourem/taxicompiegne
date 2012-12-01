

	<tr>
		<th scope="row">
			<label for="<?php echo $input_key; ?>"><?php echo $label_name;?>:</label>
		</th>
		<td>
			<?php echo '<textarea rows="5" cols="50" name="'.$input_key.'" id="'.$input_key.'">'.$input_value.'</textarea>' . "\n"; ?>
			<br/>
			<?php echo $input_description; ?>
		</td>
	</tr>