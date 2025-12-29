<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EducationModel;

class Education extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new EducationModel();
    }

    public function index()
    {
        // 1. Ambil Input dari URL
        $keyword = $this->request->getVar('keyword');
        $jenjang = $this->request->getVar('jenjang'); // Filter Jenjang

        // Default Sort: Tahun Lulus (Terbaru)
        $sortBy = $this->request->getVar('sort_by') ? $this->request->getVar('sort_by') : 'tahun_lulus';
        $order = $this->request->getVar('order') ? $this->request->getVar('order') : 'DESC';

        // 2. Logic Pencarian
        if ($keyword) {
            $this->model->like('nama_sekolah', $keyword);
        }

        // 3. Logic Filter
        if ($jenjang) {
            $this->model->where('jenjang', $jenjang);
        }

        // 4. Logic Sorting
        $this->model->orderBy($sortBy, $order);

        $data = [
            'title' => 'Riwayat Pendidikan',
            // Pagination 10 Data
            'education' => $this->model->paginate(10, 'education'),
            'pager' => $this->model->pager,

            // Kirim variabel balik ke View biar input gak ilang
            'keyword' => $keyword,
            'jenjang' => $jenjang,
            'sort_by' => $sortBy,
            'order' => $order
        ];

        return view('admin_education_list', $data);
    }

    // ... (Function create, store, delete biarkan tetap sama) ...
    public function create()
    {
        return view('admin_education_form', ['title' => 'Tambah']);
    }

    public function store()
    {
        $this->model->save([
            'jenjang' => $this->request->getVar('jenjang'),
            'nama_sekolah' => $this->request->getVar('nama_sekolah'),
            'tahun_masuk' => $this->request->getVar('tahun_masuk'),
            'tahun_lulus' => $this->request->getVar('tahun_lulus')
        ]);
        return redirect()->to('/admin/education');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/education');
    }
}
