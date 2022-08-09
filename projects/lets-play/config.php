<?php
/**
 *  configure error display (production vs development)
 */

/* ------------------configure these variables----------------- */


define('DEBUG_MODE', false);

define( 'USERNAME_MIN', 3 );
define( 'USERNAME_MAX', 30 );

define( 'PASSWORD_MIN', 8 );

//Database Configuration
//different credentials if on local or hosted version
// if( $_SERVER['HTTP_HOST' == 'localhost']){
	// $database_name = 'lets-play';
	// $database_user = 'lets-play';
	// $database_password = '$2y$10$Y64KcY7kqGr7qlSBnRvVW.x3dBpm6B7gNWLUvYSWSbuV3pwVzY/yO';
	// $host = 'localhost';
	
//	define('ROOT_DIR', 'C:\xampp\htdocs\adoni\lets-play' ); // for the server
//	define('ROOT_URL', 'http://localhost/adoni/lets-play/' );  // for the browser
// }else{
	$database_name = 'adonires_lets-play';
	$database_user = 'adonires_letsply';
	$database_password = 'QO5*C&f59c,@';
	$host = 'localhost';
	
	define('ROOT_DIR', '/home3/adonires/public_html/portfolio/college/lets-play/' ); // for the server
	define('ROOT_URL', 'http://www.adonitorres.com/portfolio/college/lets-play/' );  // for the browser
// }


/* -------------------------stop editing------------------------ */


/* DISPLAY ERRORS
On a development server
	error_reporting should be set to E_ALL value;
	display_errors should be set to 1
	log_errors could be set to 1

On a production server
	error_reporting should be set to E_ALL value;
	display_errors should be set to 0
	log_errors should be set to 1
*/
if(DEBUG_MODE){
	//development
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
}else{
	//production
	ini_set('display_errors', 0);
	ini_set('log_errors', 1);
}

/**
 * Connect to our Database
 * @link https://phpbestpractices.org/#mysql
 */
$DB = new PDO( "mysql:host=$host;dbname=$database_name;charset=utf8mb4",
								$database_user,
								$database_password,
								array(
									PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
									PDO::ATTR_PERSISTENT => false
								)
              );

session_start();