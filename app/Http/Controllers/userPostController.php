<?php

namespace App\Http\Controllers;
use App\User_post;
use Illuminate\Http\Request;
use DateTime;
use App\User;
use App\Http\Controllers\countTest;



class UserPostController extends Controller
{
    public $count = 0;
    public function index(User_post $text,User $user)
    {
        return view('userPost')->with(['user_posts' => $text->getByLimit()]);
    }
}
?>