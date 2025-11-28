<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    // --- HALAMAN PUBLIK (FRONTEND) ---
    // Poin 4A: Hanya menampilkan data
    public function index()
    {
        $model = new PegawaiModel();
        $data['pegawai'] = $model->findAll();
        return view('pegawai_public', $data); // Nanti kita buat view ini
    }

    // --- HALAMAN ADMIN (BACKEND) ---
    // Poin 4B: Aksi CRUD

    // 1. READ (Tabel Admin)
    public function adminList()
    {
        $model = new PegawaiModel();
        $data['pegawai'] = $model->findAll();
        return view('admin_pegawai_list', $data);
    }

    // 2. CREATE (Form Tambah)
    public function create()
    {
        return view('admin_pegawai_form');
    }

    public function store()
    {
        $model = new PegawaiModel();

        // Ambil file foto
        $foto = $this->request->getFile('foto_pegawai');

        // Cek apakah user upload foto?
        if ($foto->isValid() && ! $foto->hasMoved()) {
            // Generate nama random biar gak kembar
            $namaFoto = $foto->getRandomName();
            // Pindahkan ke folder public/uploads
            $foto->move('uploads', $namaFoto);
        } else {
            $namaFoto = 'default.jpg'; // Foto bawaan kalau gak upload
        }

        $model->save([
            'nama_pegawai'  => $this->request->getPost('nama_pegawai'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'foto_pegawai'  => $namaFoto
        ]);

        return redirect()->to('admin/pegawai')->with('msg', 'Data Pegawai Berhasil Ditambah');
    }

    // 3. UPDATE (Edit)
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

        // Logika Ganti Foto
        if ($foto->isValid() && ! $foto->hasMoved()) {
            // Hapus foto lama jika bukan default
            if ($oldData['foto_pegawai'] != 'default.jpg' && file_exists('uploads/' . $oldData['foto_pegawai'])) {
                unlink('uploads/' . $oldData['foto_pegawai']);
            }
            // Upload foto baru
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads', $namaFoto);
        } else {
            // Kalau gak upload baru, pakai nama lama
            $namaFoto = $oldData['foto_pegawai'];
        }

        $model->update($id, [
            'nama_pegawai'  => $this->request->getPost('nama_pegawai'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'foto_pegawai'  => $namaFoto
        ]);

        return redirect()->to('admin/pegawai')->with('msg', 'Data Pegawai Berhasil Diupdate');
    }

    // 4. DELETE (Hapus)
    public function delete($id)
    {
        $model = new PegawaiModel();
        $data = $model->find($id);

        // Hapus file foto dari folder
        if ($data['foto_pegawai'] != 'default.jpg' && file_exists('uploads/' . $data['foto_pegawai'])) {
            unlink('uploads/' . $data['foto_pegawai']);
        }

        $model->delete($id);
        return redirect()->to('admin/pegawai')->with('msg', 'Data dihapus');
    }
}
