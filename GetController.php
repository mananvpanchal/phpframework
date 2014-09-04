<?php
function __autoload($className) {
	include $className.".php";
}

$pageAndModel = $_GET["name"];

$page = substr($pageAndModel, 0, strpos($pageAndModel, "_", 0));
$class = substr($pageAndModel, strpos($pageAndModel, "_", 0)+1);

session_start();

if(!isset($_SESSION[$class])) {
	$_SESSION[$class] = new $class;
}
$model = $_SESSION[$class];
$model -> load();

$page = $page.".php";
header("Location: ".$page);

?>