<?php

/*
	Plugin Name: URL Customizer
	Plugin URI: https://github.com/Towhidn/Q2A-URL-Customizer
	Plugin Update Check URI:https://github.com/Towhidn/Q2A-URL-Customizer/master/qa-plugin.php
	Plugin Description: Customizes Question URL
	Plugin Version: 1.1
	Plugin Date: 2014-07-04
	Plugin Author: QA-Themes.com
	Plugin Author URI: http://QA-Themes.com
	Plugin Minimum Question2Answer Version: 1.6
	Plugin License: MIT License
	Plugin Minimum PHP Version:
*/


	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}
	qa_register_plugin_module('module', 'url-customizer-admin.php', 'url_customizer_admin', 'URL Customizer Admin Form');
	qa_register_plugin_overrides('url-customizer.php');

/*
	Omit PHP closing tag to help avoid accidental output
*/