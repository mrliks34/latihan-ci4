<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\PegawaiModel;
use App\Models\ActivityModel;
use App\Models\EducationModel;
use App\Models\BiodataModel;

class Page extends BaseController
{
	// 1. HALAMAN ABOUT (Tentang Kami)
	public function about()
	{
		$data = [
			'title' => 'Tentang Kami',
			'navbarColor' => 'bg-dark' // Navbar Hitam
		];
		return view('about', $data);
	}

	// 2. HALAMAN CONTACT (Hubungi Kami)
	public function contact()
	{
		$data = [
			'title' => 'Hubungi Kami',
			'navbarColor' => 'bg-primary' // Navbar Biru Default
		];
		return view('contact', $data);
	}

	// 3. HALAMAN FAQ
	public function faqs()
	{
		// Data Dummy untuk FAQ
		$data_faqs = [
			[
				'question' => 'Apakah website ini menggunakan CI4?',
				'answer' => 'Ya, website ini dibangun menggunakan Framework CodeIgniter 4.'
			],
			[
				'question' => 'Siapa yang membuat website ini?',
				'answer' => 'Website ini dibuat oleh Tim ILKOM C sebagai tugas Proyek Akhir.'
			],
			[
				'question' => 'Bagaimana cara melamar kerja disini?',
				'answer' => 'Silakan cek halaman "Hubungi Kami" untuk mengirim CV Anda.'
			]
		];

		$data = [
			'title' => 'FAQ',
			'data_faqs' => $data_faqs,
			'navbarColor' => 'bg-info' // Navbar Biru Muda
		];
		return view('faqs', $data);
	}

	// 4. HALAMAN PEGAWAI (Tim Kami)
	public function pegawai()
	{
		$model = new PegawaiModel();

		// Ambil Input URL
		$keyword = $this->request->getVar('keyword');
		$divisi = $this->request->getVar('divisi');
		$sortBy = $this->request->getVar('sort_by') ? $this->request->getVar('sort_by') : 'nama_pegawai';
		$order = $this->request->getVar('order') ? $this->request->getVar('order') : 'ASC';

		// Filter Logic
		if ($keyword) {
			$model->like('nama_pegawai', $keyword);
		}
		if ($divisi) {
			$model->where('divisi', $divisi);
		}

		// Sorting Logic
		$model->orderBy($sortBy, $order);

		$data = [
			'title' => 'Tim Kami',
			'pegawai' => $model->paginate(8, 'pegawai'), // Tampil 8 per halaman
			'pager' => $model->pager,

			// Variabel ini WAJIB dikirim biar View gak error
			'keyword' => $keyword,
			'divisi' => $divisi,
			'order' => $order,

			// Styling Navbar Ungu
			'navbarColor' => '',
			'navbarStyle' => 'background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);'
		];

		return view('pegawai_public', $data);
	}

	// 5. HALAMAN AKTIVITAS
	public function activities()
	{
		$model = new ActivityModel();

		$keyword = $this->request->getVar('keyword');
		$startDate = $this->request->getVar('start_date');
		$endDate = $this->request->getVar('end_date');
		$sortBy = $this->request->getVar('sort_by') ? $this->request->getVar('sort_by') : 'tanggal';
		$order = $this->request->getVar('order') ? $this->request->getVar('order') : 'DESC';

		if ($keyword) {
			$model->like('nama_aktivitas', $keyword);
		}
		if ($startDate && $endDate) {
			$model->where("tanggal >=", $startDate)->where("tanggal <=", $endDate);
		}

		$model->orderBy($sortBy, $order);

		$data = [
			'title' => 'Aktivitas Harian',
			'activities' => $model->paginate(6, 'activities'),
			'pager' => $model->pager,

			// Kirim variabel balik
			'keyword' => $keyword,
			'start_date' => $startDate,
			'end_date' => $endDate,

			// Navbar Biru Laut
			'navbarColor' => '',
			'navbarStyle' => 'background: linear-gradient(135deg, #0d6efd, #0099ff);'
		];

		return view('public_activities', $data);
	}

	// 6. HALAMAN PENDIDIKAN
	public function education()
	{
		$model = new EducationModel();

		$keyword = $this->request->getVar('keyword');
		$jenjang = $this->request->getVar('jenjang');
		$sortBy = $this->request->getVar('sort_by') ? $this->request->getVar('sort_by') : 'tahun_lulus';
		$order = $this->request->getVar('order') ? $this->request->getVar('order') : 'DESC';

		if ($keyword) {
			$model->like('nama_sekolah', $keyword);
		}
		if ($jenjang) {
			$model->where('jenjang', $jenjang);
		}

		$model->orderBy($sortBy, $order);

		$data = [
			'title' => 'Riwayat Pendidikan',
			'education' => $model->paginate(10, 'education'),
			'pager' => $model->pager,

			// Kirim variabel balik
			'keyword' => $keyword,
			'jenjang' => $jenjang,
			'order' => $order,

			// Navbar Hijau
			'navbarColor' => '',
			'navbarStyle' => 'background: linear-gradient(135deg, #11998e, #38ef7d);'
		];

		return view('public_education', $data);
	}

	// 7. HALAMAN BIODATA
	public function biodata()
	{
		$model = new BiodataModel();

		$keyword = $this->request->getVar('keyword');
		$sortBy = $this->request->getVar('sort_by') ? $this->request->getVar('sort_by') : 'nama_lengkap';
		$order = $this->request->getVar('order') ? $this->request->getVar('order') : 'ASC';

		if ($keyword) {
			$model->like('nama_lengkap', $keyword);
		}

		$model->orderBy($sortBy, $order);

		$data = [
			'title' => 'Biodata Diri',
			'biodata' => $model->paginate(10, 'biodata'),
			'pager' => $model->pager,

			// Kirim variabel balik
			'keyword' => $keyword,

			// Navbar Ungu Pink
			'navbarColor' => '',
			'navbarStyle' => 'background: linear-gradient(135deg, #667eea, #764ba2);'
		];

		return view('public_biodata', $data);
	}
}
