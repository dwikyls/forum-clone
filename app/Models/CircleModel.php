<?php

namespace App\Models;

use CodeIgniter\Model;

class CircleModel extends Model
{
    protected $table      = 'diskusi';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'foto', 'judul', 'deskripsi', 'berkas', 'type', 'kategori', 'jml_balasan'];

    public function getDetail($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function tipe($type)
    {
        return $this->where(['type' => $type])->findAll();
    }
}
