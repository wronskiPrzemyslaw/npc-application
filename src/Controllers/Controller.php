<?php 
namespace Wronski\Controllers;

class Controller {

	protected $loader;
	protected $twig;

	public function __construct() {
		$this->loader = new \Twig_Loader_Filesystem(__DIR__ . "/../../views");
		$this->twig = new \Twig_Environment($this->loader, [
			'cache' => false, 'debug' => true
		]);
	}

	protected function renderView($templateName, $params = []) {
		echo $this->twig->render($templateName.'.html', $params);
	}

	public function get404() {
		echo "Nie znaleziono strony, błąd 404";
		exit();
	}

}