<?php

namespace App\Models;

use CodeIgniter\Model;

class KomenModel extends Model
{
    protected $table      = 'komen';
    protected $useTimestamps = true;
    protected $allowedFields = ['target_post', 'user_id', 'deskripsi', 'berkas'];
}
