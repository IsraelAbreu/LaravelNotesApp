<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        //form validation
        $request->validate(
            //rules
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            //messages
            [
                'text_username.required' => 'O username é obrigatório',
                'text_username.email' => 'O username deve ser um e-mail válido',
                'text_password.required' => 'A senha é obrigatória',
                'text_password.min' => 'A senha precisa ter no mínimo :min caracteres',
                'text_password.max' => 'A senha só pode ter no máximo :max caracteres',
            ]
        );

        //get user input
        $username = $request->input('text_username');
        $userpass = $request->input('text_password');

        //check if user exist
        $user = User::where('username', $username)
                    ->where('deleted_at', NULL)
                    ->first();
        if(!$user){
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Username ou Password incorretos');
        }

        if (!password_verify($userpass, $user->password)) {
           return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Username ou Password incorretos');
        }

        //update last login on DB
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        //login user - keep on the session the data logged user.
        session([
            'user' => $user->id,
            'username' => $user->username
        ]);

        // redirect to homepage
        return redirect()->to('/');
    }
    
    public function logout()
    {
        //logout from the aplication
        session()->forget('user');
        //redirect to login page
        return redirect()->to('/login');
    }
}
