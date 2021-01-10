<?php
	
	// HEADER GGWP
	header('Access-Control-Allow-Origin: *');
	
	// SESSION GGWP
	session_start();
	
	// AUTOLOAD GGWP
	require_once '../vendor/autoload.php';


// CURRENT_TIMESTAMP

	//Load Config and Helper
	require 'Config/auth.php';
	require 'Config/plugin.php';
	require 'Config/database.php';
	require 'Config/config.php';
	require 'Helper/url.php';
	require 'Helper/application.php';
	require 'web.php';