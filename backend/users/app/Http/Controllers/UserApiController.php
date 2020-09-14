<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\User;


class UserApiController extends Controller
{
    public function index()
    {
        return User::with('colors')->orWhereNull('is_admin')->get();       
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    { 
        $test = Str::random(12);
        $user = new User();

        $user->name = 'app_user_'.$test;
        $user->email = $test.'@app-user-colorit.com';
        $user->password = bcrypt('demoUser');
        $user->save();
        $user->generateToken();
        $user->save();

        return response()->json(User::where('id', '=',$user->id)->with('colors')->first(), 201);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function getUserColors(User $user) {
        
        return response()->json(User::where('id', '=', $user->id)->with('colors')->first(), 201);
    }

    public function delete(User $user)
    {
        $user->colors()->delete();
        $user->delete();
        
        return response()->json(null, 204);
    }
}