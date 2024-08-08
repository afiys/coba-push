<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function create()
    {
        $validation = \Config\Services::validation();
        
        if ($this->request->getMethod() === 'post' && $this->validate('register')) {
            $model = new UserModel();
            $data = [
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            $model->save($data);
            return redirect()->to('/login');
        } else {
            return view('register', ['validation' => $this->validator]);
        }
    }
}
