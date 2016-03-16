<?php 
namespace Wronski\Controllers;

use Wronski\Models\User;
use Wronski\Models\Contact;

class AuthController extends Controller {

	
	public function getLogin() {

		$this->renderView('login');
	}

	public function postLogin() {

		$user = User::where('email', $_POST['email'])->first();

		if($this->userVerified($user, $_POST['password'])) {

			$_SESSION['user'] = $user;
			redirectTo('/');
		} 

		$this->renderView('login', ['msg' => 'Niepoprawny login lub hasło']);
		
	}

	public function logout() {
		
		unset($_SESSION['user']);
		session_destroy();
		redirectTo('/login');
	}

}
