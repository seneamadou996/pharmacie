<?php
   session_cache_limiter('private_no_expire, must-revalidate');
	$expireTime = 120 * 120 * 2; // 1 heure
	
	// OUVERTURE DE LA SESSION PHP
	session_start();
	//session_set_cookie_params($expireTime);
   
	// AUTHENTIFICATION
	if(!isset($_SESSION['login'])){
		header("Location: index.php");
		exit();
	}
	?>