<?php 
namespace Wronski\Controllers;

class PageController extends Controller {

	public function index() {

		$this->renderView('index');
	}

	public function getLogin() {

		$this->renderView('login');
	}

	public function test($id) {
		print_r($id);
	}

	public function get404() {
		echo "Nie znaleziono strony, błąd 404";
	}

}
