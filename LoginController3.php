<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\SecurityService;

use App\Services\Data\SecurityDAO;

use App\Services\Data\CustomerDAO;
use App\Services\Data\OrderDAO;
use App\Services\Business\OrderService;

use Illuminate\Http\Request;

class LoginController3 extends Controller
{
    function index(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $this->validateForm($request);
        
        $user = new UserModel($username, $password);
        
        $service = new SecurityService();
        $loginResult = $service->login($user);
        
        $orderService = new OrderService();
        $orderService->createOrder("John", "Doe", "New Test Product");
        
        if(!$loginResult)
        {
            return view('loginFailed');
        }
        else
        {
            $data = ['model' => $user];
            return view('loginPassed2')->with($data);
//             $data = ['username' => $user->getUsername()];
//             return view('loginPassed')->with($data);
        }
    }
    
    private function validateForm(Request $request)
    {
        $rules = ['username' => 'Required | Between:4,10 | Alpha',
            'password' => 'Required | Between:4,10'];
        
        $this->validate($request, $rules);
    }
}
