<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $todoController = new TodoController();
        $todos = $todoController->index()->getData();

        return view('home', compact('todos'));
    }
}