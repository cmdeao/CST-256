<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\SecurityService;

use App\Services\Data\SecurityDAO;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function index(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        $user = new UserModel($username, $password);
        
        $service = new SecurityService();
        $loginResult = $service->login($user);
        
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
}
