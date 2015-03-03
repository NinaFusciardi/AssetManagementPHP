<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Customer Form</title>
        <script type="text/javascript" src="js/customer.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css"> <!-- Links my CSS file to the page and adds the designs --> 
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Create Customer Form</h1>
        
            <form id ="createCustomerForm"    
                  action="createCustomer.php" 
                  method="POST">
                
                <table border="0">  <!-- Start of the table -->
                    <tbody>
                        <tr>
                            <td>First Name</td>
                            <td>
                                <!--PHP code that stores the input when submitted if other fields are left blank--> 
                                <input type="text" name="fName" value="<?php    
                                if (isset($_POST) && isset($_POST['fName'])){
                                    echo $_POST['fName'];
                                } ?>" />  
                                
                                <span id="fNameError" class="error"></span> 
                                <!-- PHP code that calls the error message and display it if fields are left blank -->
                                <?php    
                                if (isset($errorMessage) && isset($errorMessage['fName'])) {
                                    echo $errorMessage['fName'];
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Surname</td>
                            <td>
                                <!--PHP code that stores the input when submitted if other fields are left blank--> 
                                <input type="text" name="lName" value="<?php    
                                if (isset($_POST) && isset($_POST['lName'])){
                                    echo $_POST['lName'];
                                } ?>" />  
                                
                                <span id="lNameError" class="error"></span> 
                                <!-- PHP code that calls the error message and display it if fields are left blank -->
                                <?php    
                                if (isset($errorMessage) && isset($errorMessage['lName'])) {
                                    echo $errorMessage['lName'];
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                <input type="text" name="address" value="<?php
                                if (isset($_POST) && isset($_POST['address'])){
                                echo $_POST['address'];
                                }?>" />
                            
                                <span id="addressError" class="error"></span>
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['address'])) {
                                    echo $errorMessage['address'];
                                }
                                ?>
                            </td>
                        </tr> 
                        <tr>
                            <td>Mobile</td>
                            <td>
                                <input type="text" name="mobile" value="<?php
                                if (isset($_POST) && isset($_POST['mobile'])){
                                echo $_POST['mobile'];
                                }?>" />
                            
                                <span id="mobileError" class="error"></span>
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['mobile'])) {
                                    echo $errorMessage['mobile'];
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" name="email" value="<?php
                                if (isset($_POST) && isset($_POST['email'])){
                                echo $_POST['email'];
                                }?>" />
                            
                                <span id="emailError" class="error"></span>
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['email'])) {
                                    echo $errorMessage['email'];
                                }
                                ?>
                            </td>
                        </tr>
                       
                        <tr>
                            <td>BranchID</td>
                            <td>
                                <input type="text" name="branchID" value="<?php
                                if (isset($_POST) && isset($_POST['branchID'])){
                                echo $_POST['branchID'];
                                }?>" />
                            
                                <span id="branchIDError" class="error"></span>
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['branchID'])) {
                                    echo $errorMessage['branchID'];
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Create Customer" name="createCustomer" />  <!-- Button link that submits the customer details -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        <script type="text/javascript" src="js/customer.js"></script> <!-- This links the JS check to the form. Must be after as the form has to load first -->
    </body>
</html>
                                                                                                                                                                                                                                                                                                                                                          