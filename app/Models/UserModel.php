<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'fullname', 'role'];
    protected $useTimestamps = true;

    // cari user berdasarkan username/email
    public function getUser($login)
    {
        return $this->where('username', $login)
                    ->orWhere('email', $login)
                    ->first();
    }
}