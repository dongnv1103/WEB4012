<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserCotroller extends Controller
{
    public function index(){
        $users = User::all();
        return view('user.index', compact('users'));
    }
}
