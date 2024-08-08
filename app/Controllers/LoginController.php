<?php
namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function authenticate()
    {
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post' && $this->validate('login')) {
            $model = new UserModel();
            $user = $model->where('username', $this->request->getPost('username'))->first();

            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                $this->setUserSession($user);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid login credentials');
            }
        } else {
            return view('login', ['validation' => $this->validator]);
        }
    }

    private function setUserSession($user)
    {
        $data = [
            'id'       => $user['id'],
            'username' => $user['username'],
            'email'    => $user['email'],
            'logged_in'=> true,
        ];

        session()->set($data);
        return true;
    }
}
