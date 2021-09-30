<?php

namespace App\Http\Controllers;
use App\User_post;
use Illuminate\Http\Request;
use App\Users;
use App\Http\Controllers\countTest;
use App\Providers\RouteServiceProvider;


class PostController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:50'],
            'text' => ['required', 'string', 'max:500'],
            'user_id' => ['required','integer']
        ]);
    }
     public function create(Request $request)
    {
       return view('create');
    }
    public function store(Request $request)
    {
        User_post::create([
            'title' => $request['title'],
            'text' => $request['text'],
            'user_id' => auth()->user()->id,
        ]);
        return redirect('/');
    }
}
?>