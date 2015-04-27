<?php

	
	//$time=microtime();
	error_reporting(E_ALL);
	ini_set('display_errors','1');
	//ini_set('output_buffering','on');
	
	include 'constants.php';
	require 'sys/helper.php';
	Session::init();
	

	$conf=Registry::getInstance();
	$conf->init();

	// installation first if necessary
	if (!file_exists('.deployed')){
			$conf->deployed='false';
		}
	// setting init time
	$conf->time;
	Core::init();