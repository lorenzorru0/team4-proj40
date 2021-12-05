<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PageController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view("front.vuejs", compact('users'));
    }

    public function apiUsers()
    {
        $users = User::all();

        return view("front.vuejs", compact('users'));
    }
}
