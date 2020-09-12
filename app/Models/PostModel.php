<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table      = 'post';
    protected $useTimestamps = true;
    protected $allowedFields = ['user_id', 'judul', 'deskripsi', 'berkas', 'kategori'];
}
