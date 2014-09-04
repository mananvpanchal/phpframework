<?php 
function __autoload($className) {
	include $className.".php";
}
session_start();
?>