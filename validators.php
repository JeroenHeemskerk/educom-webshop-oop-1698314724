<?php

class Validators
{

    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    public function collectRequiredField($data, $key, $label)
    {
        $data[$key] = $this->test_input(Util::getPostVar($key));
        if (empty($data[$key])) {
            $data[$key . 'Err'] = "*$label is required";
        }
        return $data;
    }

    public function collectAndValidateEmail($data, $key, $label)
    {
        $data = $this->collectRequiredField($data, $key, $label);
        // check if e-mail address is well-formed 
        if (empty($data[$key . 'Err']) && !filter_var($data[$key], FILTER_VALIDATE_EMAIL)) {
            $data[$key . 'Err'] = "*Invalid email format";
        }
        return $data;
    }

    public function collectAndValidateName($data, $key, $label)
    {
        $data = $this->collectRequiredField($data, $key, $label);

        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $data[$key])) {
            $data[$key . 'Err'] = "*Only letters and white space allowed";
        }
        return $data;
    }

    //====================================================

    public function validateLogin($loginData)
    {
        $loginData = $this->collectAndValidateEmail($loginData, "email", "Email");
        $loginData = $this->collectRequiredField($loginData, 'password', "Password");

        $loginData['valid'] = empty($loginData['emailErr']) && empty($loginData['passwordErr']);

        if ($loginData['valid'] == true) {
            $loginData = validateLoginAttempt($loginData);
        }

        if ($loginData['valid'] == true) {
            $loginData['page'] = 'home';
        }

        return $loginData;
    }

    public function validateRegister($registerData)
    {
        $registerData = $this->collectAndValidateName($registerData, "name", "Name");
        $registerData = $this->collectAndValidateEmail($registerData, "email", "Email");
        $registerData = $this->collectRequiredField($registerData, "password", "Password");

        if (empty(Util::getPostVar("repeatedPassword"))) {
            $registerData['repeatedPasswordErr'] = "*Password is required";
        } else {
            $registerData['repeatedPassword'] = $this->test_input(Util::getPostVar("repeatedPassword"));
            if ($registerData['password'] != $registerData['repeatedPassword']) {
                $registerData['passwordErr'] = $registerData['repeatedPasswordErr'] = "*Passwords do not match";
            }
        }

        $registerData['valid'] = empty($registerData['nameErr']) && empty($registerData['emailErr']) && empty($registerData['passwordErr']) && empty($registerData['repeatedPasswordErr']);

        return $registerData;
    }

    public function validateContact($contactData)
    {
        // validate for the 'POST' data

        $contactData = $this->collectRequiredField($contactData, "salutation", "Salutation");
        $contactData = $this->collectAndValidateName($contactData, "name", "Name");
        $contactData = $this->collectAndValidateEmail($contactData, "email", "Email");
        $contactData = $this->collectRequiredField($contactData, "phonenumber", "Phonenumber");
        $contactData = $this->collectRequiredField($contactData, "comm_preference", "Communication preference");
        $contactData = $this->collectRequiredField($contactData, "message", "Message");

        if (empty($contactData['salutationErr']) && empty($contactData['nameErr']) && empty($contactData['emailErr']) && empty($contactData['phonenumberErr']) && empty($contactData['comm_preferenceErr']) && empty($contactData['messageErr'])) {
            $contactData['valid'] = true;
        } else {
            $contactData['valid'] = false;
        }

        return $contactData;
    }
}
