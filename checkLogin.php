<?php
//Loads the details of the user input only once and is stored 
require_once 'User.php'; 
require_once 'Connection.php';
require_once 'UserTableGateway.php';

$connection = Connection::getInstance();

$gateway = new UserTableGateway($connection);

$id = session_id();
if ($id == "") {
    session_start();
}

//defining variables as strings and characters that are not strings are filtered out.
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//These are checks to see if the input fields are left blank.
$errorMessage = array();
if ($username === FALSE || $username === '') {
    $errorMessage['username'] = 'Username must not be blank<br/>';
}

if ($password === FALSE || $password === '') {
    $errorMessage['password'] = 'Password must not be blank<br/>';
}

if (empty($errorMessage)) {
    $statement = $gateway->getUserByUsername($username);
    if ($statement->rowCount() != 1) {
        $errorMessage['username'] = 'Username not registered<br/>';
    }
    else if ($statement->rowCount() == 1) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($password !== $row['password']) {
            $errorMessage['password'] = 'Invalid password<br/>';
        }
    }
}

if (empty($errorMessage)) {
    $_SESSION['username'] = $username;
    header('Location: home.php');
}
else {
    require 'login.php';
}