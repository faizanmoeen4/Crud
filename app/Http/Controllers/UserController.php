<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::active()->get();
        // $users=User::all();
        // dd(    $users );
return view('users.index', compact('users'));

    }
}
