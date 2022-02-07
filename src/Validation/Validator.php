<?php namespace App\Validation;

class Validator
{
	protected $errors;

	public function validate($request, array $rules)
	{
		foreach ($rules as $field => $rule) {
			if(!$request->getParam($field)) {
				$this->errors[$field] = $rule;
			}
		}

		$_SESSION['errors'] = $this->errors;
		return $this;
	}

	public function failed()
	{
		return !empty($this->errors);
	}

    public function getErrors()
    {
    	return $this->errors;
    }

    public function getError($key)
    {
   	    return $this->errors[$key];
    }
}
