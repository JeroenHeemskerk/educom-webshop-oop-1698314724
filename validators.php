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


    public static function validateRegister($userModel)
    {
        self::collectAndValidateName($userModel, "name", "Name");
        self::collectAndValidateEmail($userModel, "email", "Email");
        self::collectRequiredField($userModel, "password", "Password");

        if (empty(Util::getPostVar('repeatedPassword'))) {
            $userModel->repeatedPasswordErr = "*Password is required";
        } else {
            $userModel->repeatedPassword = self::test_input(Util::getPostVar('repeatedPassword'));
            if ($userModel->password != $userModel->repeatedPassword) {
                $userModel->passwordErr = $userModel->repeatedPasswordErr = "*Passwords do not match";
            }
        }

        if (!empty($userModel->email) && $userModel->doesEmailExist(Util::getPostVar('email'))) {
            $userModel->emailErr = "*User with this email already exists in database.";
        }

        $userModel->valid = empty($userModel->nameErr) && empty($userModel->emailErr) && empty($userModel->passwordErr) && empty($userModel->repeatedPasswordErr);
    }


    public static function validateContact($userModel)
    {
        // validate for the 'POST' data

        self::collectRequiredField($userModel, "salutation", "Salutation");
        self::collectAndValidateName($userModel, "name", "Name");
        self::collectAndValidateEmail($userModel, "email", "Email");
        self::collectRequiredField($userModel, "phonenumber", "Phonenumber");
        self::collectRequiredField($userModel, "comm_preference", "Communication preference");
        self::collectRequiredField($userModel, "message", "Message");

        if (empty($userModel->salutationErr) && empty($userModel->nameErr) && empty($userModel->emailErr) && empty($userModel->phonenumberErr) && empty($userModel->comm_preferenceErr) && empty($userModel->messageErr)) {
            $userModel->valid = true;
        } else {
            $userModel->valid = false;
        }
    }
}
