<?php

require_once('forms_doc.php');
class LoginDoc extends FormsDoc
{

    protected function showHeaderContent()
    {
        echo '<h1 class="headers">Loginpage</h1>';
    }

    protected function showContent($formData)
    {
        require_once('form-fields.php');
        showFormStart();
        showFormField('email', 'Email:', 'email', $formData);
        showFormField('password', 'Password:', 'password', $formData);
        showFormEnd('login', 'submit');
    }
}
