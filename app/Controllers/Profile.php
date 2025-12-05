<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        // Cek login (Proteksi)
        if (!session()->get('logged_in')) {
            return redirect()->to('login');
        }

        $model = new UserModel();
        $id = session()->get('user_id'); // Ambil ID orang yang lagi login
        $data['user'] = $model->find($id);

        return view('user_profile', $data);
    }

    public function update()
    {
        $model = new UserModel();
        $id = session()->get('user_id');

        // Data yang boleh diupdate (Role tidak boleh!)
        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        // Cek apakah user mau ganti password?
        $passBaru = $this->request->getPost('password');
        if (!empty($passBaru)) {
            $data['password'] = password_hash($passBaru, PASSWORD_DEFAULT);
        }

        $model->update($id, $data);

        // Update nama di session biar Navbar langsung berubah
        session()->set('user_name', $data['name']);

        return redirect()->to('profile')->with('msg', 'Profil berhasil diupdate!');
    }
}
