<?php

interface IUser {
  public function areAllFieldsFilledIn();
  public function isConfirmPasswordMatching();
  public function isEmailValid();
}

class User implements IUser  {
  public $firstName;
  public $lastName;
  public $email;
  public $password;
  public $confirmPassword;

  public function __construct($firstName, $lastName, $email, $password, $confirmPassword) {
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->email = $email;
      $this->password = $password;
      $this->confirmPassword = $confirmPassword;
  }

  function areAllFieldsFilledIn() {
    return !($this->firstName == '' || $this->lastName == '' || $this->email == '' || $this->password == '' || $this->confirmPassword == '');
  }

  function isConfirmPasswordMatching(){
    return $this->password == $this->confirmPassword;
  }

  function isEmailValid() {
      
    return filter_var($this->email, FILTER_VALIDATE_EMAIL);
  }
}

?>