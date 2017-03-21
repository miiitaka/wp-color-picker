<?php
/*
Plugin Name: Color Picker Sample Plugin
Plugin URI: https://github.com/miiitaka/wp-color-picker
Description: Color Picker sample plugin.
Version: 1.0.0
Author: Kazuya Takami
Author https://www.terakoya.work/
License: GPLv2 or later
*/

new Wp_Color_Picker();

class Wp_Color_Picker {
	public function __construct () {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	public function admin_menu () {
		$page = add_menu_page(
			'Color Picker Sample',
			'Color Picker Sample',
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'page_render' )
		);
		add_action( 'admin_print_styles-'  . $page, array( $this, 'admin_style' ) );
		add_action( 'admin_print_scripts-' . $page, array( $this, 'admin_scripts') );
	}

	public function admin_style () {
		wp_enqueue_style( 'wp-color-picker' );
	}

	public function admin_scripts () {
		wp_enqueue_script( 'color-picker-main-js', plugins_url( 'js/color-picker-main.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ) );
	}

	public function page_render () {
		echo '<div class="wrap">';
		echo '<h1>Color Picker</h1>';
		echo '<p><input id="color-picker" type="text"></p>';
		echo '</div>';
	}
}