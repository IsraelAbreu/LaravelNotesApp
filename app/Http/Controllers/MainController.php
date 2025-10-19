<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
       //load user's note
        $id = session('user');
        $notes = User::find($id)->notes()->get()->toArray();
       //show home view
        return view('home', ['notes' => $notes]);
    }

    public function newNote()
    {
        echo "Criando uma nova nota!";
    }
}
