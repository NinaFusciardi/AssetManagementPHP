<!-- This class acts as a blueprint for when creating customers -->
<?php
class Customer {
    private $customerID;
    private $fName;
    private $lName;
    private $address;
    private $mobile;
    private $email;
    private $branchID;
 
    // Stores the user input 
    public function __construct($id, $fn, $ln, $a, $m, $e, $bid) {
        $this->customerID = $id;
        $this->fName = $fn;
        $this->lName = $ln;
        $this->address = $a;
        $this->mobile = $m;
        $this->email = $e;
        $this->branchID = $bid;
    }
    
    //Get methods - Retreives the user input and outputs it
    public function getCustomerID() { 
        return $this->customerID; 
    } 
    public function getFName() {
        return $this->fName; 
    } 
    public function getLName() { 
        return $this->lName; 
    } 
    public function getAddress() { 
        return $this->address; 
    }
    public function getMobile() { 
        return $this->mobile; 
    }
    public function getEmail() { 
        return $this->email; 
    }
    public function getBranchID() { 
        return $this->branchID;   
    }  
}