<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('smk.main');
    }

    public function login()
    {
        return view('smk.login');
    }
}
