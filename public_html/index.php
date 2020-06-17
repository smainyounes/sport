<?php 
	
	// include autoloader
	include '../backend/includes/autoloader.inc.php';

	if (isset($_GET['keyword'])) {
		header("Location: ".PUBLIC_URL."sport/search/1/".urlencode($_GET['wilaya'])."/".urlencode($_GET['commune'])."/".urlencode($_GET['keyword']));
	}
	

	// init lang
	new lib_lang();

	// checking language
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		if (isset($_GET['lang'])) {
			new lib_lang($_GET['lang']);
		}
	}

	// init core class
	new lib_core;

 ?>