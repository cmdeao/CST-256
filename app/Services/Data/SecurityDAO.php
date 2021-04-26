<?php
namespace App\Services\Data;
use App\Models\UserModel;

class SecurityDAO
{
    public function findByUser(UserModel $user)
    {
        $username = $user->getUsername();
        $password = $user->getPassword();
        
        $database = mysqli_connect("localhost", "root", "root", "activity2");
        
        $sql = "SELECT * FROM users WHERE USERNAME = '$username' AND PASSWORD = '$password'";
        $result = mysqli_query($database, $sql);
        
        if(mysqli_num_rows($result) == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

