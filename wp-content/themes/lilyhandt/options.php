<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	$options = array();

	// General Settings
	$options[] = array(
		'name' => __('General Settings', 'options_check'),
		'type' => 'heading' );

	$options[] = array(
		'name' => __('Primary Logo (Above the menu)', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'lily_logo_primary',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Secondary Logo (Shows on bottom)', 'options_check'),
		'desc' => __('', 'options_check'),
		'id' => 'lily_logo_secondary',
		'type' => 'upload');

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	// Social Settings
	$options[] = array(
		'name' => __('Social Settings', 'options_check'),
		'type' => 'heading' );

	$options[] = array(
		'name' => __('Twitter URL', 'options_check'),
		'desc' => __('https://twitter.com/username', 'options_check'),
		'id' => 'lily_twitter',
		'std' => '',
		'class' => 'of-input',
		'type' => 'text');

	$options[] = array(
		'name' => __('Facebook URL', 'options_check'),
		'desc' => __('https://facebook.com/username', 'options_check'),
		'id' => 'lily_facebook',
		'std' => '',
		'class' => 'of-input',
		'type' => 'text');

	$options[] = array(
		'name' => __('Instagram', 'options_check'),
		'desc' => __('https://instagram.com/username', 'options_check'),
		'id' => 'lily_instagram',
		'std' => '',
		'class' => 'of-input',
		'type' => 'text');

	return $options;
}