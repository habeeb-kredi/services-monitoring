<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function register(Request $request)
    {
        Developer::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
    }
}
// "fullname" : "Idowu Olayinka", 
// "email" : "o.idowu@thekredibank.com", 
// "phone" : "08182928229"