<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        echo 'Ok!';
    }
    
    public function logout()
    {
        echo 'logout';
    }
}
