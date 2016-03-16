<?php 
namespace Wronski\Controllers;

class PageController {

	public function index() {

		include __DIR__ . '/../../views/index.html';
	}

	public function test($id) {
		print_r($id);
	}

	public function get404() {
		echo "Nie znaleziono strony, błąd 404";
	}

}
