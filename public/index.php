<?php

define('ROOT_DIR', realpath(dirname(__DIR__)));
define('VIEWS_DIR', ROOT_DIR . '/src/Views/site');
define('ADMIN_DIR', ROOT_DIR . '/src/Views/admin');
define('BASE_URL','../..');
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once ROOT_DIR . '/vendor/autoload.php';
require_once ROOT_DIR . '/src/functions.php';
// require_once ROOT_DIR . '/src/Views/header.php';
// require_once ROOT_DIR . '/src/Views/home.php';
// require_once ROOT_DIR . '/src/Views/footer.php';
try {
	$PDO = (new App\PDOFactory())->create([
		'dbhost' => 'localhost',
		'dbname' => 'cnweb',
		'dbuser' => 'root',
		'dbpass' => ''
	]);
} catch (Exception $ex) {
	echo 'Không thể kết nối đến MySQL,
		kiểm tra lại username/password đến MySQL.<br>';
	echo '<pre>';
	var_dump($ex);
	exit();
}

use Bramus\Router\Router as Router;

$router = new Router();

require(ROOT_DIR . '/routes/page.php');
require(ROOT_DIR . '/routes/errors.php');

$router->run();
