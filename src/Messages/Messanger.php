<?php 
namespace Wronski\Messages;

class Messanger {

	public static function flashMessage() {

		if(isset($_SESSION['flashMessage'])) {
			$flashMessage = $_SESSION['flashMessage'];
			return $flashMessage;
		}

		return false;
	}

}