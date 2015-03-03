<?php
require_once 'Customer.php';
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$customerID = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);

$statement = $gateway->getCustomerById($customerID);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/customer.js"></script>
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
                    echo '<td>CustomerID</td>'
                    . '<td>' . $row['customerID'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>fName</td>'
                    . '<td>' . $row['fName'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>lName</td>'
                    . '<td>' . $row['lName'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>address</td>'
                    . '<td>' . $row['address'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>mobile</td>'
                    . '<td>' . $row['mobile'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>email</td>'
                    . '<td>' . $row['email'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>branchID</td>'
                    . '<td>' . $row['branchID'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <p> <a class="deleteCustomer" href="deleteCustomer.php?id=<?php echo $row['customerID']; ?>">
                Delete Customer</a> 
        </p>
    </body>
</html>
