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
        <!--<script type="text/javascript" src="js/customer.js"></script>-->
        <link rel="stylesheet" type="text/css" href="style.css"> <!-- Links my CSS file to the page and adds the designs --> 
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Create Branch Form</h1>
        
            <form id ="createBranchForm"    
                  action="createBranch.php" 
                  method="POST">
                
                <table border="0">  <!-- Start of the table -->
                    <tbody>
                        <tr>
                            <td>BranchID</td>
                            <td>
                                <!--PHP code that stores the input when submitted if other fields are left blank--> 
                                <input type="text" name="branchID" value="<?php    
                                if (isset($_POST) && isset($_POST['branchID'])){
                                    echo $_POST['branchID'];
                                } ?>" />  
                                
                                <span id="branchIDError" class="error"></span> 
                                <!-- PHP code that calls the error message and display it if fields are left blank -->
                                <?php    
                                if (isset($errorMessage) && isset($errorMessage['branchID'])) {
                                    echo $errorMessage['branchID'];
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
                            <td>Branch Manager</td>
                            <td>
                                <input type="text" name="branchManager" value="<?php
                                if (isset($_POST) && isset($_POST['branchManager'])){
                                echo $_POST['branchManager'];
                                }?>" />
                            
                                <span id="branchManagerError" class="error"></span>
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['branchManager'])) {
                                    echo $errorMessage['branchManager'];
                                }
                                ?>
                            </td>
                        </tr>
                       
                        <tr>
                            <td>Opening Hours</td>
                            <td>
                                <input type="text" name="openingHours" value="<?php
                                if (isset($_POST) && isset($_POST['openingHours'])){
                                echo $_POST['openingHours'];
                                }?>" />
                            
                                <span id="openingHoursError" class="error"></span>
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['openingHours'])) {
                                    echo $errorMessage['openingHours'];
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Create Branch" name="createBranch" />  <!-- Button link that submits the customer details -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        <!--<script type="text/javascript" src="js/customer.js"></script> <!-- This links the JS check to the form. Must be after as the form has to load first -->
    </body>
</html>
                                            
