<?php
$configDB = array();
$configDB["host"] 		= "localhost";
$configDB["database"]	= "webdatdoan";
$configDB["username"] 	= "root";
$configDB["password"] 	= "";
define("HOST", "localhost");
define("DB_NAME", "webdatdoan");
define("DB_USER", "root");
define("DB_PASS", "");
define('ROOT', dirname(dirname(__FILE__) ) );
//Thu muc tuyet doi truoc cua config; c:/wamp/www/lab/
define("BASE_URL", "http://".$_SERVER['SERVER_NAME']."/lab/");//dia chi website


require_once ROOT . '/classes/dish.php';
require_once ROOT . '/classes/category.php';
// require_once ROOT . '/classes/customer.php';
// require_once ROOT . '/classes/orders.php';
// require_once ROOT . '/classes/orderdetail.php';
// require_once ROOT . '/classes/promotion.php';
// require_once ROOT . '/classes/payment.php';