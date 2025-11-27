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
