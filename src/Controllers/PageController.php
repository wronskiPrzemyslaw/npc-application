<?php 
namespace Wronski\Controllers;

use Wronski\Models\User;
use Wronski\Models\Contact;

class PageController extends Controller {

	public function index() {
		$contacts = Contact::all();
		$this->renderView('index', ['contacts' => $contacts]);
	}

	public function getLogin() {

		$this->renderView('login');
	}

	public function test() {
		$user = User::find(1);
		echo $user->name;
	}

	public function get404() {
		echo "Nie znaleziono strony, błąd 404";
	}

}
