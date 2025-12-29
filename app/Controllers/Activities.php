<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ActivityModel;

class Activities extends BaseController
{
    protected $activityModel;

    public function __construct()
    {
        // Pastikan file app/Models/ActivityModel.php sudah ada
        $this->activityModel = new ActivityModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        $startDate = $this->request->getVar('start_date'); // Filter Tanggal Awal
        $endDate = $this->request->getVar('end_date');     // Filter Tanggal Akhir
        $sortBy = $this->request->getVar('sort_by') ? $this->request->getVar('sort_by') : 'tanggal'; // Default sort tanggal
        $order = $this->request->getVar('order') ? $this->request->getVar('order') : 'DESC'; // Default urutan DESC

        // Logic Pencarian [cite: 12]
        if ($keyword) {
            $this->activityModel->like('nama_aktivitas', $keyword);
        }

        // Logic Filtering [cite: 13]
        if ($startDate && $endDate) {
            $this->activityModel->where("tanggal >=", $startDate);
            $this->activityModel->where("tanggal <=", $endDate);
        }

        // Logic Sorting [cite: 15]
        $this->activityModel->orderBy($sortBy, $order);

        $data = [
            'title' => 'Kelola Aktivitas',
            // Pagination 10 Data [cite: 14]
            'activities' => $this->activityModel->paginate(10, 'activities'),
            'pager' => $this->activityModel->pager,
            'keyword' => $keyword,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'sort_by' => $sortBy,
            'order' => $order
        ];

        return view('admin_aktivitas_list', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Aktivitas'];
        // Langsung nembak ke file di app/Views/admin_aktivitas_form.php
        return view('admin_aktivitas_form', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_aktivitas' => 'required',
            'foto' => 'is_image[foto]|max_size[foto,2048]'
        ])) {
            return redirect()->back()->withInput();
        }

        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/aktivitas/', $namaFoto);
        } else {
            $namaFoto = null;
        }

        $this->activityModel->save([
            'tanggal' => $this->request->getVar('tanggal'),
            'jam' => $this->request->getVar('jam'),
            'nama_aktivitas' => $this->request->getVar('nama_aktivitas'),
            'foto' => $namaFoto
        ]);

        return redirect()->to('/admin/activities');
    }

    public function delete($id)
    {
        $this->activityModel->delete($id);
        return redirect()->to('/admin/activities');
    }
}
