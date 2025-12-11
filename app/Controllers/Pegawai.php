<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    // --- FRONTEND ---
    public function index()
    {
        $model = new PegawaiModel();
        $data['pegawai'] = $model->findAll();
        return view('pegawai_public', $data);
    }

    // --- BACKEND ---

    // 1. READ + FILTER
    public function adminList()
    {
        $model = new PegawaiModel();

        // Ambil Input
        $keyword = $this->request->getGet('keyword');
        $divisi  = $this->request->getGet('divisi');
        $gender  = $this->request->getGet('gender');

        // Logic Cari (Nama ATAU Divisi)
        if ($keyword) {
            $model->groupStart()
                ->like('nama_pegawai', $keyword)
                ->orLike('divisi', $keyword)
                ->groupEnd();
        }

        // Logic Filter
        if ($divisi) {
            $model->where('divisi', $divisi);
        }
        if ($gender) {
            $model->where('jenis_kelamin', $gender);
        }

        // Eksekusi
        $data = [
            'pegawai'   => $model->findAll(),
            'keyword'   => $keyword,
            'divisi'    => $divisi,
            'gender'    => $gender
        ];

        return view('admin_pegawai_list', $data);
    }

    // 2. CREATE
    public function create()
    {
        return view('admin_pegawai_form');
    }

    public function store()
    {
        $model = new PegawaiModel();
        $foto = $this->request->getFile('foto_pegawai');

        if ($foto->isValid() && ! $foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads', $namaFoto);
        } else {
            $namaFoto = 'default.jpg';
        }

        $model->save([
            'nama_pegawai'  => $this->request->getPost('nama_pegawai'),
            'divisi'        => $this->request->getPost('divisi'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'foto_pegawai'  => $namaFoto
        ]);

        return redirect()->to('admin/pegawai')->with('msg', 'Data Berhasil Ditambah');
    }

    // 3. UPDATE
    public function edit($id)
    {
        $model = new PegawaiModel();
        $data['p'] = $model->find($id);
        return view('admin_pegawai_edit', $data);
    }

    public function update($id)
    {
        $model = new PegawaiModel();
        $oldData = $model->find($id);
        $foto = $this->request->getFile('foto_pegawai');

        if ($foto->isValid() && ! $foto->hasMoved()) {
            if ($oldData['foto_pegawai'] != 'default.jpg' && file_exists('uploads/' . $oldData['foto_pegawai'])) {
                unlink('uploads/' . $oldData['foto_pegawai']);
            }
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads', $namaFoto);
        } else {
            $namaFoto = $oldData['foto_pegawai'];
        }

        $model->update($id, [
            'nama_pegawai'  => $this->request->getPost('nama_pegawai'),
            'divisi'        => $this->request->getPost('divisi'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'foto_pegawai'  => $namaFoto
        ]);

        return redirect()->to('admin/pegawai')->with('msg', 'Data Berhasil Diupdate');
    }

    // 4. DELETE
    public function delete($id)
    {
        $model = new PegawaiModel();
        $data = $model->find($id);

        if ($data['foto_pegawai'] != 'default.jpg' && file_exists('uploads/' . $data['foto_pegawai'])) {
            unlink('uploads/' . $data['foto_pegawai']);
        }

        $model->delete($id);
        return redirect()->to('admin/pegawai')->with('msg', 'Data Dihapus');
    }
}
