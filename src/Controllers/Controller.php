<?php 
namespace Wronski\Controllers;

use Wronski\Auth\LoggedIn;
use Wronski\Models\User;
use Wronski\Messages\Messanger;
use Wronski\Models\Contact;

class Controller {

	protected $loader;
	protected $twig;

	public function __construct() {
		
		$this->loader = new \Twig_Loader_Filesystem(__DIR__ . "/../../views");
		$this->twig = new \Twig_Environment($this->loader, [
			'cache' => false, 'debug' => true
		]);
		// dodanie nowej funkcji autoryzacyjnej do Twiga
		$function = new \Twig_SimpleFunction('loggedUser', function () {
		    return LoggedIn::user();
		});
		$this->twig->addFunction($function);
		// dodanie nowej funkcji przekazującej wiadomości do Twiga
		$function = new \Twig_SimpleFunction('flashMessage', function () {
		    return Messanger::flashMessage();
		});
		$this->twig->addFunction($function);
	}

	protected function renderView($templateName, $params = []) {

		echo $this->twig->render($templateName.'.html', $params);
		
		if(isset($_SESSION['flashMessage'])) { 
			unset($_SESSION['flashMessage']);
		}
	}

	public function get404() {
		$this->renderView('404');
		exit();
	}

	protected function userIsFound($user, $hash) {
		return ($user != null && password_verify($hash, $user->password));
	}

	protected function flashMessage(array $message) {
		$_SESSION['flashMessage'] = $message;
	}

	protected function findContactOr404($id) {

		if(is_array($id)) {
			$contact = Contact::find(current($id));
		} else {
			$contact = Contact::find($id);
		}

		if($contact == null) {
			$this->get404();
		}

		return $contact;
	}


}