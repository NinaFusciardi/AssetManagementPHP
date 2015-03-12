<?php
require_once 'Branch.php';
require_once 'Connection.php';
require_once 'BranchTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();

$gateway = new BranchTableGateway($connection);
$statement = $gateway->getBranches();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Branch Details</title>
        <!--<script type="text/javascript" src="js/customer.js"></script>-->
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <p><a href="home.php"> Customer table</a></p>
        <h1> Branch Details </h1>
            <?php 
            if (isset($message)) {
            echo '<p>'.$message.'</p>';
            }
            ?>  
            <table>  <!-- Table that lists all the details of the customers -->
                    <thead>
                        <tr>
                            <th> branchID </th>
                            <th> address </th>
                            <th> mobile </th>
                            <th> branchManager </th>
                            <th> openingHours </th>
                        </tr>
                    </thead>
                <tbody>
                    <?php  //Code that retrieves the user input from the create customer form then prints them into the table.
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    while ($row) {
                        echo '<tr>';
                        echo '<td>' . $row['branchID'] . '</td>';
                        echo '<td>' . $row['address'] . '</td>';
                        echo '<td>' . $row['mobile'] . '</td>';
                        echo '<td>' . $row['branchManager'] . '</td>';
                        echo '<td>' . $row['openingHours'] . '</td>';
                        echo '<td>'
                        . '<a href="viewBranch.php?id='.$row['branchID'].'">View</a> '
                        //. '<a href="editCustomerForm.php?id='.$row['customerID'].'">Edit</a> '
                       // . '<a class="deleteCustomer" href="deleteCustomer.php?id='.$row['customerID'].'">Delete</a> '
                        . '</td>';
                        echo '</tr>';
                        echo '</tr>';
                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </tbody>
            </table>
    </body>
</html>
