<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lembagadesa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_lembaga');
		$this->load->model('M_penduduk');
		cek_login();
	}

	// Load Halaman Lembaga
	public function index()
	{
		$this->loadView();
	}

	// Load View
	private function loadView($showModal = "index")
	{
		$data = [
			'title' => 'Lembaga Desa',
			'lembaga' => $this->M_lembaga->get()->result(),
			'penduduk' => $this->M_penduduk->get()->result(),
			'showModal' => $showModal
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/lembaga/index', $data);
		$this->load->view('layout/footer');
	}

	// Get Data By ID
	public function getOneData()
	{
		$id = htmlspecialchars($this->input->post('id', true));
		$data = $this->M_lembaga->get($id)->row();
		echo json_encode($data);
	}

	// Add lembaga
	public function add()
	{
		$this->form_validation->set_rules('kades', 'Kepala Desa', 'required|trim', [
			'required' => 'Kepala Desa harus diisi!',
		]);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
			'required' => 'Keterangan harus diisi!',
		]);

		if ($this->form_validation->run() == false) {
			$this->loadView('add');
		} else {

			$data = [
				'id_penduduk' => htmlspecialchars($this->input->post('kades', true)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
			];

			$result = $this->M_lembaga->insert($data);
			if ($result) {
				$this->session->set_flashdata('swetalert', '`Upssz!`, `Data Gagal Di Tambahkan !`, `error`');
			} else {
				$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Tambahkan !`, `success`');
			}
			redirect('lembagadesa');
		}
	}

	public function update()
	{
		// Deklarasi Variable
		$id = htmlspecialchars($this->input->post('id', true));
		$kades = htmlspecialchars($this->input->post('kades', true));
		$keterangan = htmlspecialchars($this->input->post('keterangan', true));

		// Set Rules
		$this->form_validation->set_rules('kades', 'Ketua RT/RW', 'required|trim', [
			'required' => 'Ketua RT/RW harus diisi!',
		]);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
			'required' => 'Keterangan harus diisi!',
		]);

		// Cek Validasi
		if ($this->form_validation->run() == false) {
			$this->loadView('edit');
		} else {
			$data 	= [
				'id_penduduk'		=> $kades,
				'keterangan'		=> $keterangan,
			];
			$result = $this->M_lembaga->update($id, $data);
			if ($result) {
				$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Gagal Di Ubah !`, `error`');
			} else {
				$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Ubah !`, `success`');
			}
			redirect('lembagadesa');
		}
	}

	// delete data
	public function delete($id)
	{
		$data = $this->M_lembaga->get($id)->row();

		// Menentukan path lengkap dari file yang akan dihapus
		$file_path = 'assets/lembaga/' . $data->gambar;

		unlink($file_path);

		$result = $this->M_lembaga->delete($id);
		if ($result) {
			$this->session->set_flashdata('swetalert', '`Upssz!`, `Data Gagal Di Hapus !`, `error`');
		} else {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Hapus !`, `success`');
		}
		redirect('lembagadesa');
	}

	// Konfirmasi Status
	public function status($act, $id)
	{
		if ($act == 'aktif') {
			$status = 1;
		} else {
			$status = 0;
		}
		$result = $this->M_lembaga->status($id, $status);
		if ($result && $status == 1) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `lembaga Gagal di Aktifkan`, `error`');
		} else if ($result && $status == 0) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `lembaga Gagal di Non Aktifkan`, `error`');
		} else if (!$result && $status == 1) {
			$this->session->set_flashdata('swetalert', '`Good job!`, `lembaga Berhasil di Aktifkan`, `success`');
		} else if (!$result && $status == 0) {
			$this->session->set_flashdata('swetalert', '`Good job!`, `lembaga Berhasil di Non Aktifkan`, `success`');
		}
		redirect('lembagadesa');
	}
}
