<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BiodataModel;

class Biodata extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new BiodataModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');

        // Sorting
        $sortBy = $this->request->getVar('sort_by') ? $this->request->getVar('sort_by') : 'nama_lengkap';
        $order = $this->request->getVar('order') ? $this->request->getVar('order') : 'ASC';

        // Search
        if ($keyword) {
            $this->model->like('nama_lengkap', $keyword)
                ->orLike('email', $keyword);
        }

        $this->model->orderBy($sortBy, $order);

        $data = [
            'title' => 'Kelola Biodata',
            'biodata' => $this->model->paginate(10, 'biodata'),
            'pager' => $this->model->pager,
            'keyword' => $keyword,
            'sort_by' => $sortBy,
            'order' => $order
        ];

        return view('admin_biodata_list', $data);
    }

    // ... (Function create, store, delete biarkan sama) ...
    public function create()
    {
        return view('admin_biodata_form', ['title' => 'Tambah']);
    }

    public function store()
    {
        $file = $this->request->getFile('foto_profil');
        $namaFoto = ($file && $file->isValid()) ? $file->getRandomName() : null;
        if ($namaFoto) $file->move('uploads/biodata/', $namaFoto);

        $this->model->save([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
            'email' => $this->request->getVar('email'),
            'deskripsi_diri' => $this->request->getVar('deskripsi_diri'),
            'foto_profil' => $namaFoto
        ]);
        return redirect()->to('/admin/biodata');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/biodata');
    }
}
