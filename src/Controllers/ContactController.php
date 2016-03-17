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
		
		if($contact->save()) {
			$this->flashMessage(['success', 'Kontakt został dodany']);
		} else {
			$this->flashMessage(['danger', 'Niestety kontakt nie mógł zostać dodany']);
		}

		redirectTo('/');
	}

	public function edit($id) {

		$contact = $this->findContactOr404($id);

		$this->renderView('edit', compact('contact'));
	}

	public function update($id) {

		$contact = $this->findContactOr404($id);

		$contact->first_name = $_POST['first_name'];
		$contact->last_name = $_POST['last_name'];
		$contact->email = $_POST['email'];
		$contact->phone = $_POST['phone'];
		$contact->birth_date = $_POST['birth_date'];
		
		if($contact->save()) {
			$this->flashMessage(['success', 'Kontakt został zmodyfikowany']);
		} else {
			$this->flashMessage(['danger', 'Niestety nie można było dokonać modyfikacji']);
		}

		redirectTo('/contact/'.current($id));
	}

	public function delete() {

		$contact = $this->findContactOr404((int)$_POST['id']);

		if($contact->delete()) {
			$this->flashMessage(['success', 'Kontakt został usunięty']);
		} else {
			$this->flashMessage(['danger', 'Niestety nie mógł zostać usunięty']);
		}

		redirectTo('/');
	}

	

}