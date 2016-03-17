<?php 
namespace Wronski\Controllers;

use Wronski\Auth\LoggedIn;
use Wronski\Models\User;
use Wronski\Messages\Messanger;
use Wronski\Models\Contact;
use Kunststube\CSRFP\SignatureGenerator;

class Controller {

	protected $loader;
	protected $twig;
	protected $signer;

	public function __construct() {
		// inicjalizacja Twiga
		$this->twigInit();
		// ochrona CSRF
		$this->signer = new SignatureGenerator(getenv('CSRF_SECRET'));
	}

	protected function renderView($templateName, $params = []) {

		$params['signer'] = $this->signer;
		echo $this->twig->render($templateName.'.html', $params);
		$this->undoMessages();
		
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

	protected function errorMessage(array $message) {
		$_SESSION['errorMessage'] = $message;
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

	protected function undoMessages() {
		if(isset($_SESSION['flashMessage'])) { 
			unset($_SESSION['flashMessage']);
		}
		if(isset($_SESSION['errorMessage'])) { 
			unset($_SESSION['errorMessage']);
		}
	}

	protected function twigInit() {
		$this->loader = new \Twig_Loader_Filesystem(__DIR__ . "/../../views");
		$this->twig = new \Twig_Environment($this->loader, [
			'cache' => false, 'debug' => true
		]);
		$this->twigAddFunctions();
	}

	protected function twigAddFunctions() {
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
		// dodanie nowej funkcji przekazującej błędy walidacji
		$function = new \Twig_SimpleFunction('errorMessage', function () {
		    return Messanger::errorMessage();
		});
		$this->twig->addFunction($function);
	}

	protected function csrfProtect() {
		if(!$this->signer->validateSignature($_POST['_token'])) {
			header('HTTP/1.0 400 Bad Request');
			exit();
		}
	}
}