<?php

/**
 * Created by PhpStorm.
 * User: Олег Бас
 * Date: 30.10.2021
 * Time: 11:06
 */
class Validator
{
    public $errors;
    public $safe_data;

    public function __construct($data)
    {
        $this->errors = [];
        $this->safe_data = $data;
    }

    function validate()
    {
        if (strlen($this->safe_data["username"]) < 5) {
            array_push($this->errors, "username min length 5");
        }
        if (strlen($this->safe_data["username"]) > 10) {
            array_push($this->errors, "username max length 10");
        }
        if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $this->safe_data["email"])) {
            array_push($this->errors, "email isn`t corected");
        }
        return empty($this->errors);
    }
}