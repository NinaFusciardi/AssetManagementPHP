<?php
require_once 'Branch.php';
require_once 'Connection.php';
require_once 'BranchTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}

$branchID = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new BranchTableGateway($connection);

$statement = $gateway->getBranchById($branchID);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--<script type="text/javascript" src="js/customer.js"></script>-->
        <link rel="stylesheet" type="text/css" href="style.css">
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>BranchID</td>'
                    . '<td>' . $row['branchID'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Address</td>'
                    . '<td>' . $row['address'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Mobile</td>'
                    . '<td>' . $row['mobile'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>BranchManager</td>'
                    . '<td>' . $row['branchManager'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>OpeningHours</td>'
                    . '<td>' . $row['openingHours'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                ?>
            </tbody>
        </table>
        <p><a href="branchTable.php">Return</a></p>
        
         
        <!--<p> <a class="deleteCustomer" href="deleteCustomer.php?id=<?php echo $row['customerID']; ?>">
                Delete Customer</a> 
        </p>-->
    </body>
</html>

