<?php 
namespace Wronski\Controllers;

use Wronski\Auth\LoggedIn;
use Wronski\Models\User;

class Controller {

	protected $loader;
	protected $twig;

	public function __construct() {
		
		$this->loader = new \Twig_Loader_Filesystem(__DIR__ . "/../../views");
		$this->twig = new \Twig_Environment($this->loader, [
			'cache' => false, 'debug' => true
		]);
		// dodanie nowej funkcji do Twiga
		$function = new \Twig_SimpleFunction('loggedUser', function () {
		    return LoggedIn::user();
		});
		$this->twig->addFunction($function);
	}

	protected function renderView($templateName, $params = []) {
		echo $this->twig->render($templateName.'.html', $params);
	}

	public function get404() {
		echo "Nie znaleziono strony, błąd 404";
		exit();
	}

	protected function userVerified(User $user, $hash) {
		return ($user != null && password_verify($hash, $user->password));
	}

}