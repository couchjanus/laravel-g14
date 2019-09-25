<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile.home');
    }

    public function info()
    {
        return view('profile.index');
    }

    public function update(Request $request)     {
        // $request->user() returns an instance of the authenticated user...
    }
    
    
}
