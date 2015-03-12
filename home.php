<?php
//Loads the details of the customer input only once and is stored 
require_once 'Customer.php';
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);

$statement = $gateway->getCustomers();
?> 

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Customer Details</title>
        <script type="text/javascript" src="js/customer.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <p><a href="branchTable.php">Branch Table</a></p>
        <h1> Customer Details </h1>
            <?php 
            if (isset($message)) {
            echo '<p>'.$message.'</p>';
            }
            ?>  
            <table>  <!-- Table that lists all the details of the customers -->
                    <thead>
                        <tr>
                            <th> CustomerID </th>
                            <th> fName </th>
                            <th> lName </th>
                            <th> address </th>
                            <th> mobile </th>
                            <th> email </th>
                            <th> branchID </th>
                        </tr>
                    </thead>
                <tbody>
                    <?php  //Code that retrieves the user input from the create customer form then prints them into the table.
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    while ($row) {
                        echo '<tr>';
                        echo '<td>' . $row['customerID'] . '</td>';
                        echo '<td>' . $row['fName'] . '</td>';
                        echo '<td>' . $row['lName'] . '</td>';
                        echo '<td>' . $row['address'] . '</td>';
                        echo '<td>' . $row['mobile'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['branchID'] . '</td>';
                        echo '<td>'
                        . '<a href="viewCustomer.php?id='.$row['customerID'].'">View</a> '
                        . '<a href="editCustomerForm.php?id='.$row['customerID'].'">Edit</a> '
                        . '<a class="deleteCustomer" href="deleteCustomer.php?id='.$row['customerID'].'">Delete</a> '
                        . '</td>';
                        echo '</tr>';
                        echo '</tr>';
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </tbody>
            </table>
         
        <p><a href="createCustomerForm.php">Create Customer</a></p> <!-- Link to the create customer form -->
        <p><a href="createBranchForm.php">Create Branch</a></p> 
    </body>
</html>
