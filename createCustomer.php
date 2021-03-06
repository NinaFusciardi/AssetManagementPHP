<?php
require_once 'Customer.php';
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$fName = filter_input(INPUT_POST, 'fName', FILTER_SANITIZE_STRING);
$lName = filter_input(INPUT_POST, 'lName', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
$branchID = filter_input(INPUT_POST, 'branchID', FILTER_SANITIZE_STRING);

$errorMessage = array();
if($fName === FALSE || $fName === ''){
    $errorMessage['fName'] = "Cannot leave first name blank";
}
if($lName === FALSE || $lName === ''){
    $errorMessage['lName'] = "Cannot leave surname blank";
}
if($address === FALSE || $address === ''){
    $errorMessage['address'] = "Cannot leave address blank";
}
if($mobile === FALSE || $mobile === ''){
    $errorMessage['mobile'] = "Cannot leave mobile blank";
}
if($email === FALSE || $email === ''){
    $errorMessage['email'] = "Cannot leave email blank";
}
if($branchID === FALSE || $branchID === ''){
    $errorMessage['branchID'] = "Cannot leave branchID blank";
}

if(empty($errorMessage)){
   $connection = Connection::getInstance();
    $gateway = new CustomerTableGateway($connection);
    $id = $gateway->insertCustomer($fName, $lName, $address, $mobile, $email, $branchID); 
    
    header('Location: home.php');
}
else {
    require 'createCustomerForm.php';
}
