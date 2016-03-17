<?php 
namespace Wronski\Controllers;

use Wronski\Models\User;
use Wronski\Models\Contact;
use Wronski\Auth\LoggedIn;

class AuthController extends Controller {

	
	public function getLogin() {

		if(LoggedIn::user()) {
			redirectTo('/');
		}

		$this->renderView('login');
	}

	public function postLogin() {

		$user = User::where('email', $_POST['email'])->first();

		if(!$this->userIsVerified($user, $_POST['password'])) {
			
			$this->flashMessage(['danger', 'Niepoprawny login lub hasło']);
			redirectTo('/login');	
		} 

		$_SESSION['user'] = $user;
		$this->flashMessage(["success", "Zostałeś poprawnie zalogowany"]);
		redirectTo('/');
	}

	public function logout() {

		unset($_SESSION['user']);
		$this->flashMessage(["success", "Zostałeś pomyślnie wylogowany"]);
		redirectTo('/login');
	}

}
