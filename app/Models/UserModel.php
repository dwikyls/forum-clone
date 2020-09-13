<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $useTimestamps = true;
    protected $allowedFields = ['email', 'password', 'nama', 'foto'];
}
