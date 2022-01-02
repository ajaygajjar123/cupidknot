<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('id','!=',auth()->user()->id)->where('role','!=','1')->orderBy('id','DESC')->get();
        return view('user.dashboard',compact('user'));
    }
}
