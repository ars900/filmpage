<?php
	//Database Params
	
	session_start();
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','framework');

	//URL Root(Dynamic Links)

	define('URLROOT','http://framework1/');
	
	//App Root
	
	define('APPROOT', dirname(dirname(__FILE__)));
	
	//Public root
	
	define('PUBLICROOT', dirname(dirname(dirname(__FILE__))));
	
	//Site NAme
	
	define('SITENAME', 'Framework');

?>