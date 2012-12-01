<?php
/**
 * Utils Extra WordPress Functions.
 * @author dligthart <info@daveligthart.com>
 * @version 0.1
 * @package com.daveligthart.util.wordpress
 */
if(!function_exists('dl_mkdirr')):
function dl_mkdirr($pathname, $mode = 0777) { // Recursive, Hat tip: PHP.net
	// Check if directory already exists
	if ( is_dir($pathname) || empty($pathname) )
		return true;

	// Ensure a file does not already exist with the same name
	if ( is_file($pathname) )
		return false;

	// Crawl up the directory tree
	$next_pathname = substr( $pathname, 0, strrpos($pathname, DIRECTORY_SEPARATOR) );
	if ( dl_mkdirr($next_pathname, $mode) ) {
		if (!file_exists($pathname))
			return mkdir($pathname, $mode);
	}

	return false;
}
endif;

if(!function_exists('dl_create_user')):

function dl_create_user($username, $password, $url = '', $email = '') {
	global $wpdb;

	$user_login = $wpdb->escape($username);
	$user_email = $wpdb->escape($email);
	$user_pass = $password;
	$user_url =  $url;

	$userdata = compact('user_login', 'user_email', 'user_pass', 'user_url');
	return wp_insert_user($userdata);
}

endif;

if(!function_exists('dl_html_dropdown')):
/**
 * Create HTML-code for a dropdown
 * containing a number of options.
 *
 * @param $name   string  The name of the select field.
 * @param $values hash    The values for the options by their names
 *                        eg. $values["value-1"] = "option label 1";
 * @param $selected  string The value of the selected option.
 * $attr Optional attributes (eg. onChange stuff)
 *
 * @return string The HTML code for a option construction.
 */
function dl_html_dropdown($name, $values, $selected = "", $attr = "")
{
	foreach($values as $key => $value) {
        $options .= "\t<option ".(($key == $selected) ? "selected=\"selected\"" : "")." value=\"".$key."\">".$value."&nbsp;&nbsp;</option>\n";
    }

	return "<select name=\"".$name."\"  id=\"".$name."\" $attr>\n".$options."</select>\n";
}
endif;
?>