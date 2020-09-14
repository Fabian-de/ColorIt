<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\User;
use App\UserColor;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('handleAdmin', ['users' => $users]);
    }

    public function addColor(User $user)
    {
        if (isset($_GET['color']) ) {
            $color = filter_input(INPUT_GET, 'color',FILTER_SANITIZE_STRING);
            $user->addColor($color);
            return redirect('/admin/home');
        }
        return view('addColor', ['user' => $user]);
    }

    public function editColor(User $user, UserColor $userColor)
    {
        return view('deleteColor', ['user' => $user, 'userColor' => $userColor]);   
    }

    public function updateColor(User $user, UserColor $userColor )
    {

        if (isset($_GET['color']) ) {
            $color = filter_input(INPUT_GET, 'color',FILTER_SANITIZE_STRING);
            $userColor = UserColor::find($userColor)->first();
            $userColor->color = $color;            
            $userColor->save();
        }
        return redirect('/admin/home');       
    }

    public function deleteColor(User $user, UserColor $userColor)
    {
        $userColor->delete();
        return redirect('/admin/home');
    }
}