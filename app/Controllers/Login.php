<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login | Circle',
            'validation' => $this->validation
        ];

        return view('auth/login', $data);
    }

    public function registration()
    {
        $data = [
            'title' => 'Registration | Circle',
            'validation' => $this->validation
        ];

        return view('auth/registration', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Name cannot be empty!'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email is required!',
                    'is_unique' => 'Email has already registered!'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[3]|matches[password2]',
                'errors' => [
                    'required' => 'Password needed!',
                    'min_length' => 'Password too short!',
                    'matches' => "Password don't matches!"
                ]
            ],
            'password2' => 'required|matches[password]'
        ])) {
            return redirect()->to('/registration')->withInput();
        }

        $email = $this->request->getVar('email');

        $this->userModel->save([
            'nama' => htmlspecialchars($this->request->getVar('nama', true)),
            'email' => htmlspecialchars($this->request->getVar('email', true)),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'foto' => $this->request->getVar('foto'),
        ]);

        session()->setFlashData(
            'pesan',
            '<div class="alert alert-success" role="alert">
                Successfully registered! Please activate your account <a href="http://' . $email . '">here</a>!
            </div>'
        );

        return redirect()->to('/');
    }

    public function login()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required!',
                    'valid_email' => 'Please use the valid email!'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password needed!',
                ]
            ]
        ])) {
            return redirect()->to('/')->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $this->db->query('SELECT * FROM user WHERE email = "' . $email . '"')->getRowArray();

        if ($user) {
            if ($user['is_active'] == 1) {
                if ($user['password'] == $password) {
                    if ($user['level'] == 'admin') {
                        $data = [
                            'email' => $user['email']
                        ];

                        $this->session->set($data);

                        return redirect()->to('/home');
                    } else {
                        $data = [
                            'email' => $user['email']
                        ];

                        $this->session->set($data);

                        return redirect()->to('/Home');
                    }
                } else {
                    session()->setFlashData(
                        'pesan',
                        '<div class="alert alert-danger" role="alert">
                            Wrong email or password!
                        </div>'
                    );

                    return redirect()->to('/');
                }
            } else {
                session()->setFlashData(
                    'pesan',
                    '<div class="alert alert-danger" role="alert">
                        Please verify your email first!
                    </div>'
                );

                return redirect()->to('/');
            }
        } else {
            session()->setFlashData(
                'pesan',
                '<div class="alert alert-danger" role="alert">
                    Email has not already registered!
                </div>'
            );

            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $this->session->remove('email');
        $this->session->remove('level');

        session()->setFlashData(
            'pesan',
            '<div class="alert alert-success" role="alert">
                You have been logout!
            </div>'
        );

        return redirect()->to('/');
    }

    //--------------------------------------------------------------------

}
