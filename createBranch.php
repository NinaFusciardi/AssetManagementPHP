<?php
require_once 'Branch.php';
require_once 'Connection.php';
require_once 'BranchTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$branchID = filter_input(INPUT_POST, 'branchID', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_STRING);
$branchManager = filter_input(INPUT_POST, 'branchManager', FILTER_SANITIZE_STRING);
$openingHours = filter_input(INPUT_POST, 'openingHours', FILTER_SANITIZE_STRING);

$errorMessage = array();
if($branchID === FALSE || $branchID === ''){
    $errorMessage['branchID'] = "Cannot leave branchID blank";
}
if($address === FALSE || $address === ''){
    $errorMessage['address'] = "Cannot leave address blank";
}
if($mobile === FALSE || $mobile === ''){
    $errorMessage['mobile'] = "Cannot leave mobile blank";
}
if($branchManager === FALSE || $branchManager === ''){
    $errorMessage['branchManager'] = "Cannot leave branch manager name blank";
}
if($openingHours === FALSE || $openingHours === ''){
    $errorMessage['openingHours'] = "Cannot leave hours blank";
}

if(empty($errorMessage)){
   $connection = Connection::getInstance();
   $gateway = new BranchTableGateway($connection);
   $id = $gateway->insertBranch($branchID, $address, $mobile, $branchManager, $openingHours); 
    
   header('Location: branchTable.php');
}
else {
    //require 'createBranchForm.php';
}