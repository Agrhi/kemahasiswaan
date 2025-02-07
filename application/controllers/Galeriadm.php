<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeriadm extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_galeri');
		cek_login();
	}

	// Load Halaman Galeri
	public function index()
	{
		$this->loadView();
	}

	// Load View
	private function loadView($showModal = "index")
	{
		$data = [
			'title' => 'Galeri Desa',
			'galeri' => $this->M_galeri->get()->result(),
			'showModal' => $showModal
		];
		// print_r($data); die;
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/galeri/index', $data);
		$this->load->view('layout/footer');
	}

	// Get Data By ID
	public function getOneData()
	{
		$id = htmlspecialchars($this->input->post('id', true));
		$data = $this->M_galeri->get($id)->row();
		echo json_encode($data);
	}

	// Add Galeri
	public function add()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
			'required' => 'Judul harus diisi!',
		]);
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim', [
			'required' => 'Tanggal harus diisi!',
		]);
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim', [
			'required' => 'Lokasi harus diisi!',
		]);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
			'required' => 'Keterangan harus diisi!',
		]);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
			'required' => 'Deskripsi harus diisi!',
		]);

		if ($this->form_validation->run() == false) {
			$this->loadView('add');
		} else {
			$judul = htmlspecialchars($this->input->post('judul', true));
			$tanggal = htmlspecialchars($this->input->post('tanggal', true));
			$lokasi = htmlspecialchars($this->input->post('lokasi', true));
			$keterangan = htmlspecialchars($this->input->post('keterangan', true));
			$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));

			$config['upload_path'] = './assets/galeri';
			$config['allowed_types'] = 'jpg|jpeg|png'; // Tipe file yang diizinkan
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto')) {
			} else {
				$gambar = $this->upload->data('file_name');
			}

			$data = [
				'judul' => $judul,
				'deskripsi' => $deskripsi,
				'tanggal' => $tanggal,
				'lokasi' => $lokasi,
				'keterangan' => $keterangan,
				'foto' => $gambar,
			];

			$result = $this->M_galeri->insert($data);
			if ($result) {
				$this->session->set_flashdata('swetalert', '`Upssz!`, `Data Gagal Di Tambahkan !`, `error`');
			} else {
				$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Tambahkan !`, `success`');
			}
			redirect('galeriadm');
		}
	}

	public function update()
	{
		// Deklarasi Variable
		$id = htmlspecialchars($this->input->post('id', true));
		$judul = htmlspecialchars($this->input->post('judul', true));
		$tanggal = htmlspecialchars($this->input->post('tanggal', true));
		$lokasi = htmlspecialchars($this->input->post('lokasi', true));
		$keterangan = htmlspecialchars($this->input->post('keterangan', true));
		$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
			'required' => 'Judul harus diisi!',
		]);
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim', [
			'required' => 'Tanggal harus diisi!',
		]);
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim', [
			'required' => 'Lokasi harus diisi!',
		]);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
			'required' => 'Keterangan harus diisi!',
		]);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
			'required' => 'Deskripsi harus diisi!',
		]);

		// Cek Validasi
		if ($this->form_validation->run() == false) {
			$this->loadView('edit');
		} else {
			$data = [
				'judul' => $judul,
				'deskripsi' => $deskripsi,
				'tanggal' => $tanggal,
				'lokasi' => $lokasi,
				'keterangan' => $keterangan,
			];
			$result = $this->M_galeri->update($id, $data);
			if ($result) {
				$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Gagal Di Ubah !`, `error`');
			} else {
				$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Ubah !`, `success`');
			}
			redirect('galeriadm');
		}
	}

	// delete data
	public function delete($id)
	{
		$data = $this->M_galeri->get($id)->row();

		// Menentukan path lengkap dari file yang akan dihapus
		$file_path = 'assets/galeri/' . $data->foto;

		unlink($file_path);

		$result = $this->M_galeri->delete($id);
		if ($result) {
			$this->session->set_flashdata('swetalert', '`Upssz!`, `Data Gagal Di Hapus !`, `error`');
		} else {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Hapus !`, `success`');
		}
		redirect('galeriadm');
	}
}
