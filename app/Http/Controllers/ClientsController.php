<?php

namespace App\Http\Controllers;
use \App\User;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        //dd($user);
       //dd(User::find($user)); //search
       //$user = User::findOrFail($user);
       $title="this is title";
    return view('/home', compact('title'));
   // return view('/home')->with('title', $title);
        
    }
}
