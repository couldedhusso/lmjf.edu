<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        // create middleware for super root - user qui peut creer un user root
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
        // Validator::make($data, [
        //     // // 'userFirstName' => 'max:255',
        //     // // 'userLastName' => 'max:255',
        //     // 'userLogin' => 'required|email|max:255|unique:users',
        //     // 'userPassword' => 'required|min:6|confirmed',
        // ])
          return True ;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'userFirstName' => $data['userFirstName'],
            'userLastName' => $data['userLastName'],
            'userContact' => $data['userContact'],
            'userLogin' => $data['userLogin'],
            'userPassword' => bcrypt($data['userPassword']),
        ]);

        // grant Enseingnant role to user
        $user->roles()->attach($data['userRole']);


        return redirect('/');
    }
}
