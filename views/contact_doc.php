<?php

require_once('forms_doc.php');
class ContactDoc extends FormsDoc
{

    public $data;

    public function __construct($myData)
    {
        $this->data = $myData;
    }

    protected function showHeaderContent()
    {
        echo '<h1 class="headers">Contactpage</h1>';
    }

    protected function showContent()
    {
        if (!$this->data['valid']) {
            $this->showContactForm($this->data);
        } else {
            $this->showContactThanks($this->data);
        }
    }

    private function showContactForm($formData)
    {
        $this->showFormStart();
        $this->showFormField('salutation', NULL, 'select', $formData, self::SALUTATIONS);
        $this->showFormField('name', 'Name:', 'text', $formData);
        $this->showFormField('email', 'Email:', 'email', $formData);
        $this->showFormField('phonenumber', 'Phonenumber:', 'text', $formData);
        $this->showFormField('comm_preference', 'Communication preference:', 'radio', $formData, self::COMM_PREFS);
        $this->showFormField('message', 'Message:', 'textarea', $formData, ['rows' => 5, 'cols' => 40]);
        $this->showFormEnd('contact', 'submit');
    }

    private function showContactThanks($contactData)
    {
        echo ' <p>Bedankt voor uw reactie:</p>
         <div>Name:' . self::SALUTATIONS[$contactData['salutation']] . " " . $contactData['name'] . '</div>
         <div>Email:' . $contactData['email'] . '</div>
         <div>Phonenumber:' . $contactData['phonenumber'] . '</div>
         <div>Communication preference:' . COMM_PREFS[$contactData['comm_preference']] . '</div>
         <div>Your message:' . $contactData['message'] . '</div>';
    }
}
