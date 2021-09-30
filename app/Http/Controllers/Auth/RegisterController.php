<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required'],
            'birthday' => ['required'],
            'age' =>['required','string','max:200'],
            'prefecture' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(Request $request)
    {
        $birth = strtotime($request->input('birth'));
        
        $birthday = date("Ymd",$birth);
        
                           
        $birth_year = (int)date("Y",$birth);
        $birth_month = (int)date("m",$birth);
        $birth_day = (int)date("d",$birth);
        
        //dd($birth_year.'/'.$birth_month.'/'.$birth_day);                
        // 現在の年月日を取得
        $now_year = (int)date("Y");
        $now_month = (int)date("m");
        $now_day = (int)date("d");
                                
                                
        // 年齢を計算
        $age = $now_year - $birth_year;
        // 「月」「日」で年齢を調整
        if( $birth_month === $now_month ) {
                                    
                if( $now_day < $birth_day ) {
                $age--;
                }
        } elseif( $now_month < $birth_month ) {
                $age--;
        }
        
        
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'gender' => $request['gender'],
            'birthday' => $birthday,
            'age' => $age,
            'prefecture' => $request['prefecture'],
        ]);
        return redirect($this->redirectTo);
    }
    
    
}
