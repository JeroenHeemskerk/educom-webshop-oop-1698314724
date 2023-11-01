<?php

require_once('forms_doc.php');
class RegisterDoc extends FormsDoc
{
    public $data;

    public function __construct($myData)
    {
        $this->data = $myData;
    }


    protected function showHeaderContent()
    {
        echo '<h1 class="headers">Registerpage</h1>';
    }

    protected function showContent()
    {
        $this->showFormStart();
        $this->showFormField('name', 'Name:', 'text',  $this->data);
        $this->showFormField('email', 'Email:', 'email', $this->data);
        $this->showFormField('password', 'Password:', 'password', $this->data);
        $this->showFormField('repeatedPassword', 'Repeat password:', 'password', $this->data);
        $this->showFormEnd('register', 'Submit');
    }
}
