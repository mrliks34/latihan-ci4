<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserAdmin extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('admin_list_users', $data);
    }

    public function create()
    {

        return view('admin_create_user');
    }

    public function store()
    {
        $model = new UserModel();

        $model->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role')
        ]);

        return redirect()->to('admin/users')->with('msg', 'User baru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('admin_edit_user', $data);
    }

    public function update($id)
    {
        $model = new UserModel();

        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role'  => $this->request->getPost('role'),
        ];

        $passwordBaru = $this->request->getPost('password');

        if (!empty($passwordBaru)) {
            $data['password'] = password_hash($passwordBaru, PASSWORD_DEFAULT);
        }

        $model->update($id, $data);

        return redirect()->to('admin/users')->with('msg', 'Data user berhasil diperbarui.');
    }

    public function delete($id)
    {
        $model = new UserModel();

        if ($id == session()->get('user_id')) {
            return redirect()->to('admin/users')->with('error', 'Anda tidak bisa menghapus akun sendiri!');
        }

        $model->delete($id);

        return redirect()->to('admin/users')->with('msg', 'User berhasil dihapus.');
    }
}
