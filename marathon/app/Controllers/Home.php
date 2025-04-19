<?php

namespace App\Controllers;

use App\Models\Member;

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
            $Member = new Member();

            if($Member->user_login($this->request->getPost('username'), $this->request->getPost('password')))
            {
                // Pass
                header("Location: admin");
                exit();
            }
            else
            {
                // Fail
                $data = array('load_error'=>'true', 'error_message'=>'Invalid Username or Password');
                helper('form');
                return view('homepage', $data);
            }
        }
    }

    public function create(): string
    {
        $rules=[
            'username'=>'required|is_unique[memberLogin.memberName]',
            'password'=>'required',
            'retype'=>'required|matches[password]',
            'email'=>'required|valid_email|is_unique[memberLogin.memberEmail]'
        ];

        if(!$this->validate($rules))
        {
            $data = array('load_error'=>'true');
            helper('form');
            return view('homepage', $data);
        }
        else
        {
            // Connect to the database, validate username, password and email
            $Member = new Member();

            if($Member->user_create(
                $this->request->getPost('username'),
                $this->request->getPost('password'),
                $this->request->getPost('email')
            ))
            {
                // Pass
                return view('admin_page');
            }
            else
            {
                // Fail
                $data = array('load_error'=>'true', 'error_message'=>'Failed to create user.');
                helper('form');
                return view('homepage', $data);
            }
        }
    }
}
