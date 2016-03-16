<?php 
namespace Wronski\Controllers;

use Wronski\Models\User;
use Wronski\Models\Contact;

class PageController extends Controller {

	public function index() {

		$contacts = Contact::all();
		$this->renderView('index', compact('contacts'));
	}

	public function singleContact($id) {

		$contact = Contact::find(current($id));

		if($contact == null) {
			$this->get404();
		}
		
		$contact->birth_date = convertDate($contact->birth_date);

		$this->renderView('contact', compact('contact'));
	}

}
