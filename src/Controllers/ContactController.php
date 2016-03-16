<?php 
namespace Wronski\Controllers;

use Wronski\Models\User;
use Wronski\Models\Contact;

class ContactController extends Controller {

	public function create() {

		$this->renderView('create');
	}

	public function store() {

		$contact = new Contact;
		$contact->first_name = $_POST['first_name'];
		$contact->last_name = $_POST['last_name'];
		$contact->email = $_POST['email'];
		$contact->phone = $_POST['phone'];
		$contact->birth_date = $_POST['birth_date'];
		$contact->save();
	}

	public function edit($id) {

		$contact = Contact::find(current($id));

		if($contact == null) {
			$this->get404();
		}

		$this->renderView('edit', compact('contact'));
	}

	public function update($id) {

		$contact = Contact::find(current($id));

		if($contact == null) {
			$this->get404();
		}

		$contact->first_name = $_POST['first_name'];
		$contact->last_name = $_POST['last_name'];
		$contact->email = $_POST['email'];
		$contact->phone = $_POST['phone'];
		$contact->birth_date = $_POST['birth_date'];
		$contact->save();

		redirectTo('/contact/'.current($id));
	}

	public function delete($id) {

		$contact = Contact::find(current($id));

		if($contact == null) {
			$this->get404();
		}

		$contact->delete();

		redirectTo('/');
	}

	

}