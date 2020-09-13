<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $user = $this->db->query('SELECT * FROM user WHERE email = "' . session('email') . '"')->getRowArray();

        $data = [
            'title' => 'Forum Diskusi',
            'nama' => $user['nama']
        ];

        echo "Selamat datang " . $data['nama'] . "!";
    }

    //--------------------------------------------------------------------

}
