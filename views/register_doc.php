<?php

require_once('forms_doc.php');
class RegisterDoc extends FormsDoc
{

    protected function showHeaderContent()
    {
        echo '<h1 class="headers">Registerpage</h1>';
    }

    protected function showContent($formData)
    {
        require_once('form-fields.php');
        showFormStart();
        showFormField('name', 'Name:', 'text', $formData);
        showFormField('email', 'Email:', 'email', $formData);
        showFormField('password', 'Password:', 'password', $formData);
        showFormField('repeatedPassword', 'Repeat password:', 'password', $formData);
        showFormEnd('register', 'Submit');
    }
}
