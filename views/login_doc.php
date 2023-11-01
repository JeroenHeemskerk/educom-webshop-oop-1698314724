<?php

require_once('forms_doc.php');
class LoginDoc extends FormsDoc
{
    public $data;

    public function __construct($myData)
    {
        $this->data = $myData;
    }

    protected function showHeaderContent()
    {
        echo '<h1 class="headers">Loginpage</h1>';
    }

    protected function showContent()
    {
        $this->showFormStart();
        $this->showFormField('email', 'Email:', 'email', $this->data);
        $this->showFormField('password', 'Password:', 'password', $this->data);
        $this->showFormEnd('login', 'submit');
    }
}
