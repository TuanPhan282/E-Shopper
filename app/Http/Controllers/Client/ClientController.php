<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\RegisterUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ClientController extends Controller
{
    // public function __construct()
    // {
    //     $this-> middleware('auth'); 
    // }

    public function getClient()
    {
        // $user = Auth::user();
        return view('client/index');
    }

}
