<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUserForm()
    {
        return view("createuser");
    }

    public function storeUser(Request $request)
    {
        $name = $request->input('name');

    }
}
