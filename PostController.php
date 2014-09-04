<?php

function __autoload($className) {
	include $className.".php";
}

if(count($_POST) > 0) {
	$classAndMethod = $_GET["name"];
	
	$class = substr($classAndMethod, 0, strpos($classAndMethod, ".", 0));
	$method = substr($classAndMethod, strpos($classAndMethod, ".", 0)+1);
	
	session_start();
	if(!isset($_SESSION[$class])) {
		echo "inside if";
		$_SESSION[$class] = new $class;
	}
	$model = $_SESSION[$class];
	
	$length=count($_POST);
	for($i=0; $i < $length; $i++) {
		$keys=array_keys($_POST);
		if(property_exists($model, $keys[$i])) {
			$model->$keys[$i]=$_POST[$keys[$i]];
		}
	}
	$page = $model -> $method();
	
	header("Location: ".$page);
}

?>