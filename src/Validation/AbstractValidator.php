<?php 
namespace Wronski\Validation;

use Wronski\Models\Contact;
use Respect\Validation\Validator as Valid;

abstract class AbstractValidator {

	abstract protected static function messages($index);
	abstract protected static function rules();

	public static function isValid() {

		$errors = [];

		foreach (static::rules() as $name => $value) {

			$rules = explode("|", $value);

			foreach ($rules as $rule) {
			
				$exploded = explode(":", $rule);

				switch ($exploded[0]) {
					case 'min':
						$min = (int)$exploded[1];
						if (Valid::stringType()->length($min)->validate($_POST[$name]) == false) {
							$errors[] = static::messages($name.'.'.$rule);
						} 
						break;

					case 'notEmpty':
						if (Valid::stringType()->notEmpty()->validate($_POST[$name]) == false) {
							$errors[] = static::messages($name.'.'.$rule);
						}
						break;

					case 'email':
						if(Valid::email()->validate($_POST[$name]) == false) {
							$errors[] = static::messages($name.'.'.$rule);
						}
						break;

					case 'unique':
						$contact = Contact::where('email', $_POST[$name])->first();
						if($contact != null && $contact->id != $_POST['id']) {
							$errors[] = static::messages($name.'.'.$rule);
						}
						break;

					case 'date':
						if(Valid::date('Y-m-d')->validate($_POST[$name]) == false) {
							$errors[] = static::messages($name.'.'.$rule);
						}
						break;

					case 'equalTo':
						if(Valid::equals($_POST[$name])->Validate($_POST[$exploded[1]]) == false) {
							$errors[] = 'Value does not match verification value';
						}
						break;
					
					default:
						
						break;
				}
			}

		}

		return $errors;
	}

}