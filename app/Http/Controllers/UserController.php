<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    // login
    public function login(Request $request)
    {
        $setHash = app()->make('hash');

        $email      = $request->input('email');
        $password   = $request->input('password');

        $login = User::where('email', $email)->first();
        if (!$login) {
            $res['success'] = false;
            $res['message'] = 'Your email or password incorrect!';
            return response($res);
        } else {
            if ($setHash->check($password, $login->password)) {
                $apiToken      = sha1(time());
                $createToken   = User::where('id', $login->id)->update(['api_token' => $apiToken]);

                if ($createToken) {
                    $res['success'] = true;
                    $res['api_token'] = $apiToken;
                    $res['message'] = $login;
                    return response($res);
                }
            }else{
                $res['success'] = true;
                $res['message'] = 'You email or password incorrect!';
                return response($res);
            }
        }
    }

    // register
    public function register(Request $request)
    {
        $setHash = app()->make('hash');

        $username   = $request->input('username');
        $email      = $request->input('email');
        $password   = $setHash->make($request->input('password'));

        $register = User::create([
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);

        if($register) {
            $res['success'] = true;
            $res['message'] = 'Register Success';

            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Failed to register!';

            return response($res);
        }
    }

    // get user
    public function getUser(Request $request, $id)
    {
        $setUser = User::where('id', $id)->get();
        if ($user) {
            $res['success'] = true;
            $res['message'] = $user;

            return response($res);
        }else{
            $res['success'] = false;
            $res['message'] = 'Cannot find user!';

            return response($res);
        }
    }

}