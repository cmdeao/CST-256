<?php
namespace App\Services\Data;

class OrderDAO
{
    public function addOrder($product, $customerID, $database)
    {
       //$database = mysqli_connect("localhost", "root", "root", "activity2");
       
       $sql = $database->prepare("INSERT INTO orders (PRODUCT, CUSTOMER_ID) VALUES (?,?)");
       $sql->bind_param("si", $product, $customerID);
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

