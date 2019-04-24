<?php

namespace Nexmo\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\User;
use Nexmo\Notifications\SMSNotification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        /*
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => bcrypt($data['password']),
                ]);
 
        $user->notify(new AccountCreatedSMS($user));
 
        return $user;*/

        $user = new User();
        $user->phone = '+59175729198';   // Don't forget specify country code.
        $user->notify(new SMSNotification());

        return ['message'=>'Mensaje enviado complet'];
    }

}
