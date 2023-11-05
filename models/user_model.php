<?php

require_once('page_model.php');

class UserModel extends PageModel
{
    public $salutation;
    public $name = ""; // of $values = array();
    public $email = ""; //or $meta = array();
    public $password = "";
    public $repeatedPassword = "";
    public $phonenumber = "";
    public $comm_preference = "";
    public $message = "";
    public $salutationErr;
    public $nameErr = "";
    public $emailErr = "";
    public $passwordErr = "";
    public $repeatedPasswordErr = "";
    public $phonenumberErr = "";
    public $comm_preferenceErr = "";
    public $messageErr = "";

    public $valid = false;
    public $userName;
    public $userId;


    public function __construct($pageModel)
    {
        PARENT::__construct($pageModel);
        //volgens mij roep ik hier de constructor van pagemodel (parent) aan. 
        // de input geef ik mee als ik een nieuwe instantie maak van usermodel. 
    }

    public function validateLogin()
    {
        require_once("validators.php");
        Validators::validateLogin($this);
        if ($this->valid) {
            $this->authenticateUser();
        }
    }

    public function registerUser()
    {
        require_once("validators.php");
        require_once("database-connection.php");
        Validators::validateRegister($this);
        if ($this->valid) {
            DatabaseConnection::saveUser($this->email, $this->name, $this->password);
        }
    }

    public function validateContact()
    {
        require_once("validators.php");
        Validators::validateContact($this);
    }


    private function authenticateUser()
    {
        require_once('database-connection.php');

        try {
            $user = DatabaseConnection::findUserByEmail($this->email);

            if ($user == null) {
                $this->emailErr = "This email-adress is not registered";
                $this->valid = false;
                return;
            }

            //in user zit nu nogsteeds een assoc array
            require_once("user-service.php");
            $valid = UserService::authenticateUser($user, $this->password);

            if (!$valid) {
                $this->passwordErr = "Incorrect password";
                $this->valid = false;
            }

            $this->userName = $user['name'];
            $this->userId = $user['id'];
        } catch (Exception $e) {
            require_once("logger.php");
            Logger::logError("authentication failed: " . $e->getMessage());
            $this->valid = false;
            $this->genericErr = "Inloggen is op dit moment niet mogelijk. Probeer het later nog eens.";
        }
    }

    public function doLoginUser()
    {
        $this->sessionManager->doLoginUser($this->userName, $this->userId);
        $this->genericMessage = "Login succesvol";
    }
}
