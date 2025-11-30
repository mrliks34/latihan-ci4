<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    // --- HALAMAN PUBLIK (FRONTEND) ---
    public function index()
    {
        $model = new PegawaiModel();
        $data['pegawai'] = $model->findAll();
        return view('pegawai_public', $data);
    }

    // --- HALAMAN ADMIN (BACKEND) ---

    // 1. READ (Tabel Admin + Filter)
    public function adminList()
    {
        $model = new PegawaiModel();

        // Ambil Data Pencarian dari URL
        $keyword = $this->request->getGet('keyword');
        $divisi  = $this->request->getGet('divisi');

        // --- PERBAIKAN 1: Langsung pakai $model, jangan $builder terpisah ---
        if ($keyword) {
            $model->like('nama_pegawai', $keyword);
        }
        if ($divisi) {
            $model->where('divisi', $divisi);
        }

        // Eksekusi query (otomatis menyertakan filter di atas jika ada)
        $data['pegawai'] = $model->findAll();

        // Kirim balik inputan ke view biar gak hilang
        $data['keyword'] = $keyword;
        $data['divisi']  = $divisi;

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

        $foto = $this->request->getFile('foto_pegawai');

        if ($foto->isValid() && ! $foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads', $namaFoto);
        } else {
            $namaFoto = 'default.jpg';
        }

        $model->save([
            'nama_pegawai'  => $this->request->getPost('nama_pegawai'),
            // --- PERBAIKAN 2: Tambahkan input Divisi ---
            'divisi'        => $this->request->getPost('divisi'),
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
            // --- PERBAIKAN 3: Jangan lupa update Divisi juga ---
            'divisi'        => $this->request->getPost('divisi'),
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

        if ($data['foto_pegawai'] != 'default.jpg' && file_exists('uploads/' . $data['foto_pegawai'])) {
            unlink('uploads/' . $data['foto_pegawai']);
        }

        $model->delete($id);
        return redirect()->to('admin/pegawai')->with('msg', 'Data dihapus');
    }
}
