<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsMyNameController extends Controller
{
    function index(Request $request)
    {
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        echo "Your name is: " . $firstName . " " . $lastName;
        echo "<br>";
        
        $path = $request->path();
        echo "Path Method: " . $path;
        echo "<br>";
        
        $method = $request->isMethod('get')?"GET":"POST";
        echo 'GET or POST Method: ' . $method;
        echo "<br>";
        
        $url = $request->url();
        echo "URL method: " . $url;
        echo "<br>";
        
        $data = ['firstName' => $firstName, 'lastName' => $lastName];
        return view('thatswhoami')->with($data);
    }
}
