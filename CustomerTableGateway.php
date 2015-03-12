<?php

class CustomerTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getCustomers() {
        // execute a query to get all customers
        $sqlQuery = "SELECT * FROM customer";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve customers");
        }
        
        return $statement;
    }
    
     public function getCustomerById($id) {
        // execute a query to get the customer with the specified id
        $sqlQuery = "SELECT * FROM customer WHERE customerID = :customerID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "customerID" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve user");
        }

        return $statement;
    }
    
    public function insertCustomer($fn, $ln, $a, $m, $e, $bid) {
        $sqlQuery = "INSERT INTO customer " .
                "(fName, lName,  address, mobile, email, branchID) " .
                "VALUES (:fName, :lName, :address, :mobile, :email, :branchID)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "fName" => $fn,
            "lName" => $ln,
            "address" => $a,
            "mobile" => $m,
            "email" => $e,
            "branchID" => $bid
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert customer");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }
    
    public function deleteCustomer($customerID) {
        $sqlQuery = "DELETE FROM customer WHERE customerID = :customerID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "customerID" => $customerID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete user");
        }

        return ($statement->rowCount() == 1);
    }
    
    public function updateCustomer($id, $fn, $ln, $a, $m, $e, $bid){
        $sqlQuery =
                "UPDATE customer SET " .
                "fName = :fName, " .
                "lName = :lName, " .
                "address = :address, " .
                "mobile = :mobile, " .
                "email = :email, " .
                "branchID = :branchID " .
                "WHERE customerID = :customerID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "customerID" => $id,
            "fName" => $fn,
            "lName" => $ln,
            "address" => $a,
            "mobile" => $m,
            "email" => $e,
            "branchID" => $bid
        );

        $status = $statement->execute($params);
        
        if(!$status){
            die("Could not update customer");
        }
        
        return ($statement->rowCount() == 1);
    }
}
