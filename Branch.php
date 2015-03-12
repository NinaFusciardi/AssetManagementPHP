<?php

class Branch {
    private $branchID;
    private $address;
    private $mobile;
    private $branchManager;
    private $openingHours;
    
    public function __construct($id, $a, $m, $bm, $hrs) {
        $this->branchID = $id;
        $this->address = $a;
        $this->mobile = $m;
        $this->branchManager = $bm;
        $this->openingHours = $hrs;
        
    }
    
    public function getBranchID() {
        return $this->branchID;
    }
    
    public function getAddress() {
        return $this->address;
    }
    
    public function getMobile() {
        return $this->mobile;
    }
    
    public function getbranchManager() {
        return $this->branchManager;
    }
    
    public function getOpeningHours() {
        return $this->openingHours;
    }
}
