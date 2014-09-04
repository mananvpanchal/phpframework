<?php
class User {
	
	public $username;
	public $password;
	
	public function doLogin() {
		echo "doLogin";
		echo "Username: ".$this -> username.", Password: ".$this -> password;
		return "home_homemodel";
	}
}
?>