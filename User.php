<!-- This class acts as a blueprint for when creating users -->
<?php
class User {
    private $username;
    private $password;
    
    // Stores the user input 
    public function __construct($u, $p) {
        $this->username = $u;
        $this->password = $p;  
    }
    
    //Get methods - Retreives the user input and outputs it
    public function getUsername(){ return $this->username; }    
    public function getPassword() { return $this->password; }
}