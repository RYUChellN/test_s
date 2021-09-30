<?php

namespace App\Http\Controllers;
use App\User_post;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\countTest;
use App\Providers\RouteServiceProvider;
use App\Prefecture;



class MypageController extends Controller
{
    
    public function mypage(Request $request)
    {
        
        $id =  auth()->user()->id;
        $user = User::find($id); 
        $prefectures = Prefecture::all();
        
       return view('mypage')->with(["user"=>$user, "prefectures"=>$prefectures]);
    }
    
    public function delete()
    {
        
    
    }
    
    public function update(Request $request, User $user)
    {
        $success_message = null;
        
        $input_items = array(
            'name',
            'email',
            'prefecture',
            );
        
        $input_values = array(
            'name',
            'email',
            'prefecture',
            );
            
        $input_user = array();
        for($i = 0;$i < count($input_values);$i++ )
            {
                if($request[$input_values[$i]] != null){
                    $input_user += array($input_items[$i]=>$request[$input_values[$i]]);
                }
            }
            
        
        $user -> fill($input_user) ->save();
        $success_message = '新しいユーザーデータを更新しました。';
        return redirect('/mypage/'.$user->id)->with('success_message','新しいユーザーデータを更新しました。')->with('success_message','新しいユーザーデータを更新しました。');
    }
    
    
    public function edit(User $user)
    {
        return view('/mypage')->with(['user' => $user]);
    }
    
    
}
?>