<?php 

namespace User;

class Guest{
    private $username;
    private $email;

    function __construct($username, $email) {
        $this->username = $username;
        $this->email = $email;
    }

}