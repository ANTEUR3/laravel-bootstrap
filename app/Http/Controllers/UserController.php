<?php

namespace App\Http\Controllers;

use App\Http\requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\requests\skillRequest;
use App\Models\skill;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function store(UserRequest $request)
    {

        $user=new User();
        $user->name=$request->input('fullName');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->birthDate=$request->input('birthDate');
        $user->level=$request->input('level');
        $user->university=$request->input('university');
        $user->points=0;
        $totalUsers = User::count();
        $newRanking = $totalUsers + 1;
        $user->ranking=$newRanking;


        if ($user->save()) {
            return redirect()->route('profile', ['user' => $user->id])
                ->with('status', 'User registered successfully!');
        } else {
            return back()->withInput()->with('error', 'Failed to save user');
        }

    }

    public function profile ($user)
    {
        $userP=User::find($user);
        $skills = Auth::user()->skills;


        return view ('profile',['user'=>$userP,'skills'=>$skills]);
    }

    public function authentification(Request $request )
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            return redirect()->route('profile', ['user' => $user]);
        } else {
            // Authentication failed
            return back()->with('error', 'Invalid credentials');
        }
    }

    public function addSkill(skillRequest $request)
    {
        $skill=new skill();
        $skill->title=$request->input('title');
        $skill->description=$request->input('description');
        $skill->user_id = auth()->id();
        if ($skill->save()) {
            return redirect()->route('profile', ['user' => auth()->id()])
                ->with('status', 'User registered successfully!');
        } else {
            return back()->withInput()->with('error', 'Failed to save user');
        }

    }

}
