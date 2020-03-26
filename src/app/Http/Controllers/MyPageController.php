<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class MyPageController extends Controller
{
    public function index($user_id){

        $user = User::find($user_id);
        return view('pages.mypage')->with(
            ['user_name'=>$user->name]
        );
    }
}
