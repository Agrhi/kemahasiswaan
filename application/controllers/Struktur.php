<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Struktur extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_struktur');
		cek_login();
	}

	// Load Halaman Struktur
	public function index()
	{
		$this->loadView();
	}

	// Load View
	private function loadView($showModal = "index")
	{
		$data = [
			'title' => 'Struktur Organisasi',
			'struktur' => $this->M_struktur->get()->result(),
			'showModal' => $showModal
		];
		// print_r($data); die;
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/struktur/index', $data);
		$this->load->view('layout/footer');
	}

	// Get Data By ID
	public function getOneData()
	{
		$id = htmlspecialchars($this->input->post('id', true));
		$data = $this->M_struktur->get($id)->row();
		echo json_encode($data);
	}

	// Add Struktur
	public function add()
	{
		$this->form_validation->set_rules('kades', 'Kepala Desa', 'required|trim', [
			'required' => 'Kepala Desa harus diisi!',
		]);
		$this->form_validation->set_rules('thnm', 'Tahun Mulai', 'required|trim', [
			'required' => 'Tahun Mulai harus diisi!',
		]);
		$this->form_validation->set_rules('thna', 'Tahun Akhir', 'required|trim', [
			'required' => 'Tahun Akhir harus diisi!',
		]);
		// $this->form_validation->set_rules('gambar', 'Gambar', 'callback_check_upload');

		if ($this->form_validation->run() == false) {
			$this->loadView('add');
		} else {
			$kades = htmlspecialchars($this->input->post('kades', true));
			$thnm = htmlspecialchars($this->input->post('thnm', true));
			$thna = htmlspecialchars($this->input->post('thna', true));
			$tahun = $thnm . ' - ' . $thna;

			$config['upload_path'] = './assets/struktur';
			$config['allowed_types'] = 'jpg|jpeg|png'; // Tipe file yang diizinkan
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('gambar')) {
			} else {
				$gambar = $this->upload->data('file_name');
			}

			$data = [
				'kades' => $kades,
				'tahun' => $tahun,
				'gambar' => $gambar,
				'status' => 'Y'
			];

			$result = $this->M_struktur->insert($data);
			if ($result) {
				$this->session->set_flashdata('swetalert', '`Upssz!`, `Data Gagal Di Tambahkan !`, `error`');
			} else {
				$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Tambahkan !`, `success`');
			}
			redirect('struktur');
		}
	}

	public function update()
	{
		// Deklarasi Variable
		$id = htmlspecialchars($this->input->post('id', true));
		$kades = htmlspecialchars($this->input->post('kades', true));
		$thnm = htmlspecialchars($this->input->post('thnm', true));
		$thna = htmlspecialchars($this->input->post('thna', true));
		$tahun = $thnm . ' - ' . $thna;

		// Cek data
		$cek = $this->M_struktur->get($id)->row();
		// Cek Perubahan Data
		if ($kades == $cek->kades && $tahun == $cek->tahun) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Tidak Berubah`, `error`');
			redirect('struktur');
		}

		// Set Rules
		$this->form_validation->set_rules('kades', 'Kepala Desa', 'required|trim', [
			'required' => 'Kepala Desa harus diisi!',
		]);
		$this->form_validation->set_rules('thnm', 'Tahun Mulai', 'required|trim', [
			'required' => 'Tahun Mulai harus diisi!',
		]);
		$this->form_validation->set_rules('thna', 'Tahun Akhir', 'required|trim', [
			'required' => 'Tahun Akhir harus diisi!',
		]);

		// Cek Validasi
		if ($this->form_validation->run() == false) {
			$this->loadView('edit');
		} else {
			$data 	= [
				'kades'		=> $kades,
				'tahun'		=> $tahun,
			];
			$result = $this->M_struktur->update($id, $data);
			if ($result) {
				$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Gagal Di Ubah !`, `error`');
			} else {
				$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Ubah !`, `success`');
			}
			redirect('struktur');
		}
	}

	// delete data
	public function delete($id)
	{
		$data = $this->M_struktur->get($id)->row();

		// Menentukan path lengkap dari file yang akan dihapus
		$file_path = 'assets/struktur/' . $data->gambar;

		unlink($file_path);

		$result = $this->M_struktur->delete($id);
		if ($result) {
			$this->session->set_flashdata('swetalert', '`Upssz!`, `Data Gagal Di Hapus !`, `error`');
		} else {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Hapus !`, `success`');
		}
		redirect('struktur');
	}

	// Konfirmasi Status
	public function status($act, $id)
	{
		if ($act == 'aktif') {
			$status = 1;
		} else {
			$status = 0;
		}
		$result = $this->M_struktur->status($id, $status);
		if ($result && $status == 1) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `Struktur Gagal di Aktifkan`, `error`');
		} else if ($result && $status == 0) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `Struktur Gagal di Non Aktifkan`, `error`');
		} else if (!$result && $status == 1) {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Struktur Berhasil di Aktifkan`, `success`');
		} else if (!$result && $status == 0) {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Struktur Berhasil di Non Aktifkan`, `success`');
		}
		redirect('struktur');
	}
}
