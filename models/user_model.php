<?php

require_once('page_model.php');

class UserModel extends PageModel
{
    public $name = ""; // of $values = array();
    public $email = ""; //or $meta = array();
    public $password = "";
    public $repeatedPassword = "";
    public $phonenumber = "";
    public $comm_preference = "";
    public $message = "";
    public $namerErr = "";
    public $emailErr = "";
    public $passwordErr = "";
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
            // logError("authentication failed: " . $e->getMessage());
            $this->valid = false;
            $this->genericErr = "Inloggen is op dit moment niet mogelijk. Probeer het later nog eens.";
        }
    }

    public function doLoginUser()
    {
        $this->sessionManager->doLoginUser($this->userName, $this->userId);
        $this->genericMessage = "Login succesvol";
        //$this->errors['genericError'] = "Login succesvol";
        // die onderste werkt bij mij

    }
}
