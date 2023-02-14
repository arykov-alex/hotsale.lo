<?php
	session_start();

	error_reporting(E_ALL);
	ini_set('display_errors',1);

	require_once __DIR__ . '/config.php';
	require_once __DIR__ . '/database.php';
	require_once __DIR__ . '/functions.php';
	require_once __DIR__ . '/translate.php';
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action==='register') {
		require_once __DIR__ . '/modules/register.php';
	}

	require_once __DIR__ . '/templates/header.tpl';
	require_once __DIR__ . '/templates/form.tpl';
	require_once __DIR__ . '/templates/footer.tpl';
?>