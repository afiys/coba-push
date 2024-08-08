<?php

namespace App\Controllers;

class Login extends BaseController
{
public function index(): string
{

    echo view('common/header');  
    echo view('Login');
    echo view('common/footer');
}
}
