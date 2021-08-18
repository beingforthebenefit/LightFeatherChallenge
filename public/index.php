<?php
require "../bootstrap.php";
use Src\Controller\Controller;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ($uri[1] == 'api') {
	if (!in_array($uri[2], ['supervisors', 'submit'])) {
		header("HTTP/1.1 404 Not Found");
		exit();
	}
}

$requestMethod = $_SERVER["REQUEST_METHOD"];

$controller = new Controller($requestMethod);
$controller->processRequest();