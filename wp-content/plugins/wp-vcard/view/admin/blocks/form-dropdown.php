

	<tr>
		<th scope="row">
			<label for="<?php echo $input_key; ?>"><?php echo $label_name;?>:</label>
		</th>
		<td>
		<?php
		echo dl_html_dropdown($input_key, $input_values, $input_selected);
		?>
		</td>
	</tr>

