<?php
namespace App\Services\Data;

class CustomerDAO
{
    public function addCustomer($firstName, $lastName, $database)
    {
        //$database = mysqli_connect("localhost", "root", "root", "activity2");
        
        $sql = $database->prepare("INSERT INTO customers (FIRST_NAME, LAST_NAME) VALUES (?,?)");
        $sql->bind_param("ss", $firstName, $lastName);
        $sql->execute();
        
        if($sql->affected_rows > 0)
        {
            //return true;
            return $database->insert_id;
        }
        else
        {
            return false;
        }
    }
}

