<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersLogin extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_user', 'nama', 'username', 'password'];
    protected $useTimestamps = true;

    // protected $beforeInsert = ['hashPasswordEvent'];
    // protected $beforeUpdate = ['hashPasswordEvent'];

    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    // protected function hashPasswordEvent(array $data)
    // {
    //     if (isset($data['data']['password'])) {
    //         $data['data']['password'] = $this->hashPassword($data['data']['password']);
    //     }

    //     return $data;
    // }

    public function createUser(array $data)
    {
        return $this->insert($data);
    }

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    
}