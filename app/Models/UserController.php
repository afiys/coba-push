<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function login()
    {
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $validation->setRules(config('Validation')->login);

            if (!$validation->withRequest($this->request)->run()) {
                return view('login', ['validation' => $validation]);
            }

            // Verifikasi pengguna
            $userModel = new UserModel();
            $user = $userModel->verifyPassword($this->request->getPost('username'), $this->request->getPost('password'));

            if ($user) {
                // Set session atau token
                session()->set('loggedIn', true);
                session()->set('user', $user);

                return redirect()->to('/dashboard');
            } else {
                return view('login', ['error' => 'Invalid username or password']);
            }
        }

        return view('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
