<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $interviewers=User::where('role','interviewer')->get();
        // dd($interviewers->email);
        // $companies=User::where('role','company')->get();
        return view('users.index',compact('interviewers'));
    }

    public function show($id){
        $user=User::findOrFail($id);
        // dd($user->name);
        return view('users.show',compact('user'));
    }
}
