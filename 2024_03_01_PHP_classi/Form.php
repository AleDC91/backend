<?php 
namespace ADC {

    class Form {
        protected string $buttonName;
        protected string $method;
        protected string $action;
        protected array $textFields;
        protected array $emailFields;
        protected array $passwordFields;
        protected array $checkboxFields;
        protected array $radioFields;
        protected array $allNames;


        function __construct(
                        string $action, 
                        string $method = "POST", 
                        string $buttonName = "Submit",
                        array $textFields = ["username"], 
                        array $emailFields = ["email"], 
                        array $passwordFields = ["password"], 
                        array $checkboxFields = [], 
                        array $radioFields = []) {

            $this->method = $method;
            $this->action = $action;
            $this->buttonName = $buttonName;
            $this->textFields = $textFields;
            $this->emailFields = $emailFields;
            $this->passwordFields = $passwordFields;
            $this->checkboxFields = $checkboxFields;
            $this->radioFields = $radioFields;
            $this->allNames = [...$this->textFields, ...$this->emailFields, ...$this->passwordFields, ...$this->checkboxFields, ...$this->radioFields];
        }

        private function isValidFieldName($newName){
            if(!in_array($newName, $this->allNames)){
                return true;
            } else {
                return false;
            }
        }

        public function setTextFields(array $text) {
            $this->textFields = $text;
        }

        public function setEmailFields(array $email) {
            $this->emailFields = $email;
        }

        public function setPasswordFields(array $password) {
            $this->passwordFields = $password;
        }

        public function setCheckboxFields(array $checkbox) {
            $this->checkboxFields = $checkbox;
        }

        public function setRadioFields(array $radio) {
            $this->radioFields = $radio;
        }

        public function addText(string $text) {
            if($this->isValidFieldName($text)){
                $this->textFields[] = $text;
            }
        }

        public function addEmail(string $email) {
            if($this->isValidFieldName($email)){
            $this->emailFields[] = $email;
            }
        }
        
        public function addPassword(string $password) {
            if($this->isValidFieldName($password)){
            $this->passwordFields[] = $password;
            }
        }

        public function addCheckbox(string $checkbox) {
            if($this->isValidFieldName($checkbox)){
            $this->checkboxFields[] = $checkbox;
            }
        }

        public function addRadio(string $radio) {
            if($this->isValidFieldName($radio)){
            $this->radioFields[] = $radio;
            }
        }

        public function drawForm(){
            $textHTML = '';
            $emailHTML = '';
            $passwordHTML = '';
            $checkboxHTML = '';
            $radioHTML = '';

            foreach($this->textFields as $textField) {
                $textHTML .= "<div class='mb-3'>
                <label for='$textField' class='form-label'>" . ucwords($textField) . "</label>
                <input type='text' id='$textField' name='$textField' class='form-control'>
                </div> ";
          
            }

            foreach($this->emailFields as $emailField) {
                $emailHTML .= "<div class='mb-3'>
                <label for='$emailField' class='form-label'>" . ucwords($emailField) . "</label>
                <input type='email' id='$emailField' name='$emailField' class='form-control'>
                </div> ";
            }

            foreach($this->passwordFields as $passwordField) {
                $passwordHTML .= "<div class='mb-3'>
                <label for='$passwordField' class='form-label'>" . ucwords($passwordField) . "</label>
                <input type='password' id='$passwordField' name='$passwordField' class='form-control'>
                </div> ";
            }

            $form = "<form class='mt-5' action='$this->action' method='$this->method'> 
            $textHTML $emailHTML $passwordHTML  
            <button type='submit' class='btn btn-primary mb-5'>$this->buttonName</button>
            </form>";

            echo $form;
        }
    }
}