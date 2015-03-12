<?php

class BranchTableGateway {
    
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getBranches() {
        // execute a query to get all customers
        $sqlQuery = "SELECT * FROM branch";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve branches");
        }
        
        return $statement;
    }
    
    public function getBranchById($id) {
        // execute a query to get the customer with the specified id
        $sqlQuery = "SELECT * FROM branch WHERE branchID = :branchID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "branchID" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve branch");
        }

        return $statement;
    }
    
    public function insertBranch ($id, $a, $m, $bm, $hrs) {
        $sqlQuery = "INSERT INTO branch " .
                    "(branchID, address, mobile, branchManager, openingHours) " .
                    "VALUES (:branchID, :address, :mobile, :branchManager, :openingHours)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array (
            "branchID" => $id,
            "address" => $a,
            "mobile" => $m,
            "branchManager" => $bm,
            "openingHours" => $hrs
        );
        
        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert branch");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }
}
