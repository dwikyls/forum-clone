<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $user = $this->db->query('SELECT * FROM user WHERE email = "' . session('email') . '"')->getRowArray();

        $data = [
            'title' => 'Forum Diskusi',
            'user' => $user
        ];

        return view('User/index', $data);
    }

    //--------------------------------------------------------------------

}
