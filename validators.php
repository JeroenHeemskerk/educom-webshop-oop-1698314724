<?php

class Validators
{

    public static function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function collectRequiredField($userModel, $key, $label)
    {
        require_once("util.php");
        $userModel->$key = self::test_input(Util::getPostVar($key));
        if (empty($userModel->$key)) {
            $errorKey = $key . 'Err';
            $userModel->$errorKey = "*$label is required";
        }
    }

    public static function collectAndValidateEmail($userModel, $key, $label)
    {
        self::collectRequiredField($userModel, $key, $label);
        // check if e-mail address is well-formed 
        $errorKey = $key . 'Err';
        if (empty($userModel->$errorKey) && !filter_var($userModel->$key, FILTER_VALIDATE_EMAIL)) {
            $userModel->$errorKey = "*Invalid email format";
        }
    }

    public static function collectAndValidateName($userModel, $key, $label)
    {
        self::collectRequiredField($userModel, $key, $label);

        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $userModel->$key)) {
            $errorKey = $key . 'Err';
            $userModel->$errorKey = "*Only letters and white space allowed";
        }
    }

    //====================================================

    public static function validateLogin($userModel)
    {
        self::collectAndValidateEmail($userModel, "email", "Email");
        self::collectRequiredField($userModel, 'password', "Password");

        $userModel->valid = empty($userModel->emailErr) && empty($userModel->passwordErr);
    }


    public static function validateRegister($registerData)
    {
        $registerData = self::collectAndValidateName($registerData, "name", "Name");
        $registerData = self::collectAndValidateEmail($registerData, "email", "Email");
        $registerData = self::collectRequiredField($registerData, "password", "Password");

        if (empty(Util::getPostVar("repeatedPassword"))) {
            $registerData['repeatedPasswordErr'] = "*Password is required";
        } else {
            $registerData['repeatedPassword'] = self::test_input(Util::getPostVar("repeatedPassword"));
            if ($registerData['password'] != $registerData['repeatedPassword']) {
                $registerData['passwordErr'] = $registerData['repeatedPasswordErr'] = "*Passwords do not match";
            }
        }

        $registerData['valid'] = empty($registerData['nameErr']) && empty($registerData['emailErr']) && empty($registerData['passwordErr']) && empty($registerData['repeatedPasswordErr']);

        return $registerData;
    }

    public static function validateContact($contactData)
    {
        // validate for the 'POST' data

        $contactData = self::collectRequiredField($contactData, "salutation", "Salutation");
        $contactData = self::collectAndValidateName($contactData, "name", "Name");
        $contactData = self::collectAndValidateEmail($contactData, "email", "Email");
        $contactData = self::collectRequiredField($contactData, "phonenumber", "Phonenumber");
        $contactData = self::collectRequiredField($contactData, "comm_preference", "Communication preference");
        $contactData = self::collectRequiredField($contactData, "message", "Message");

        if (empty($contactData['salutationErr']) && empty($contactData['nameErr']) && empty($contactData['emailErr']) && empty($contactData['phonenumberErr']) && empty($contactData['comm_preferenceErr']) && empty($contactData['messageErr'])) {
            $contactData['valid'] = true;
        } else {
            $contactData['valid'] = false;
        }

        return $contactData;
    }
}
