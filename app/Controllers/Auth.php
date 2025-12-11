<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        echo view('auth_login');
    }

    public function register()
    {
        echo view('auth_register');
    }

    public function save()
    {
        // 1. Validasi Input
        $rules = [
            'name'      => 'required|min_length[3]|max_length[50]',
            'email'     => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'password'  => 'required|min_length[6]|max_length[200]',
            'confpassword' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT) // Enkripsi Password
            ];
            $model->save($data);

            // Redirect ke Login setelah sukses daftar
            session()->setFlashdata('msg', 'Registrasi Berhasil! Silakan Login.');
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('auth_register', $data);
        }
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                // 1. Simpan Role ke Session
                $ses_data = [
                    'user_id'       => $data['id'],
                    'user_name'     => $data['name'],
                    'user_email'    => $data['email'],
                    'user_role'     => $data['role'], // <--- PENTING
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);

                // 2. Cek Arah Tujuan
                if ($data['role'] == 'admin') {
                    return redirect()->to('/admin/news'); // Admin ke Dashboard
                } else {
                    return redirect()->to('/news'); // User biasa ke Berita Utama
                }
            } else {
                $session->setFlashdata('msg', 'Password Salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        session()->destroy();
        return redirect()->to('/');
    }
}
