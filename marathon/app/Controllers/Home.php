<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        helper('form');
        return view('homepage');
    }

    public function login(): string
    {
        $rules=[
            'username'=>'required|valid_email',
            'password'=>'required'
        ];

        if(!$this->validate($rules))
        {
            $data = array('load_error'=>'true');
            helper('form');
            return view('homepage', $data);
        }
        else
        {
            // Connect to the database, validate username and password


            // Pass


            // Fail
            $data = array('load_error'=>'true', 'error_message'=>'Invalid Username or Password');
            helper('form');
            return view('homepage', $data);
        }
    }

    public function create(): string
    {
        echo "Create";
        exit();
    }
}
