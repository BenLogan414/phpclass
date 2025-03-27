<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('homepage');
    }

    public function play($data): string
    {
        echo "Hello World " . $data;
        exit();
        //return view('welcome_message');
    }
}
