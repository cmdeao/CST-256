<?php
namespace App\Services\Business;

use App\Services\Data\CustomerDAO;
use App\Services\Data\OrderDAO;

class OrderService
{
    public function createOrder($firstName, $lastName, $product)
    {
        $database = mysqli_connect("localhost", "root", "root", "activity2");
        $database->autocommit(FALSE);
        $database->begin_transaction();
        
        $customerDAO = new CustomerDAO();
        $customerID = $customerDAO->addCustomer($firstName, $lastName, $database);
        
        $orderDAO = new OrderDAO();
        $orderID = $orderDAO->addOrder($product, $customerID, $database);
        
        if($customerID > 0 && $orderID > 0)
        {
            echo "We're making the commit!";
            $database->commit();
        }
        else
        {
            echo "We're rolling back the commit!";
            $database->rollback();
        }
    }
}

