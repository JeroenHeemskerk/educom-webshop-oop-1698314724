<?php

require_once('forms_doc.php');
class ContactDoc extends FormsDoc
{
    protected function showHeaderContent()
    {
        echo '<h1 class="headers">Contactpage</h1>';
    }

    protected function showContent()
    {
        if (!$pageData['valid']) {
            $this->showContactForm($pageData);
        } else {
            $this->showContactThanks($pageData);
        }
    }

    private function showContactForm($formData)
    {
        require_once('form-fields.php');
        showFormStart();
        showFormField('salutation', NULL, 'select', $formData, SALUTATIONS);
        showFormField('name', 'Name:', 'text', $formData);
        showFormField('email', 'Email:', 'email', $formData);
        showFormField('phonenumber', 'Phonenumber:', 'text', $formData);
        showFormField('comm_preference', 'Communication preference:', 'radio', $formData, COMM_PREFS);
        showFormField('message', 'Message:', 'textarea', $formData, ['rows' => 5, 'cols' => 40]);
        showFormEnd('contact', 'submit');
    }

    private function showContactThanks($contactData)
    {
        echo ' <p>Bedankt voor uw reactie:</p>
         <div>Name:' . SALUTATIONS[$contactData['salutation']] . " " . $contactData['name'] . '</div>
         <div>Email:' . $contactData['email'] . '</div>
         <div>Phonenumber:' . $contactData['phonenumber'] . '</div>
         <div>Communication preference:' . COMM_PREFS[$contactData['comm_preference']] . '</div>
         <div>Your message:' . $contactData['message'] . '</div>';
    }
}
