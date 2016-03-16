<?php 
namespace Wronski\Auth;

class LoggedIn {

	public static function user() {

		if(isset($_SESSION['user'])) {
			return $_SESSION['user'];
		}

		return false;

	}
}