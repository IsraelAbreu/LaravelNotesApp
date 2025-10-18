<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        echo "Estou dentro do app!";
    }

    public function newNote()
    {
        echo "Criando uma nova nota!";
    }
}
