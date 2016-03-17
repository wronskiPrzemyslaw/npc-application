<?php 
namespace Wronski\Validation;

use Respect\Validation\Validator as Valid;

class ContactValidator extends AbstractValidator {

	protected static function rules() {

		$rules = [
			'first_name' 		=> "notEmpty",
			'last_name' 		=> "notEmpty",
			'email'	   			=> "email|notEmpty|unique",
			'phone'				=> "notEmpty",
			'birth_date'		=> "notEmpty|date"
		];

		return $rules;
	}


	protected static function messages($index) {

		$messages = [
			'first_name.notEmpty' => "Pole imię nie może być puste",
			'last_name.notEmpty' => "Pole nazwisko nie może być puste",
			'email.email' => "Pole email musi być poprawnym adresem email",
			'email.unique' => "Taki adres email jest już w bazie danych",
			'email.notEmpty' => "Pole email nie może być puste",
			'phone.notEmpty' => "Pole numer telefonu nie może być puste",
			'birth_date.notEmpty' => 'Pole data urodzenia nie może być puste',
			'birth_date.date'	=> 'Pole data urodzenia musi być poprawną datą'
		];

		return $messages[$index];
	}

}