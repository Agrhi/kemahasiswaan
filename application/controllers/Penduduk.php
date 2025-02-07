<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penduduk');
		$this->load->model('M_pendidikan');
		$this->load->model('M_pekerjaan');
		$this->load->model('M_agama');
		$this->load->model('M_statuskawin');
		$this->load->model('M_statuskeluarga');
		cek_login();
	}

	// Load Halaman Penduduk
	public function index()
	{
		$this->loadView();
	}

	// Load View
	private function loadView($showModal = "index")
	{
		$data = [
			'title' => 'Penduduk',
			'penduduk' => $this->M_penduduk->get()->result(),
			'pendidikan' => $this->M_pendidikan->get()->result(),
			'pekerjaan' => $this->M_pekerjaan->get()->result(),
			'agama' => $this->M_agama->get()->result(),
			'statuskawin' => $this->M_statuskawin->get()->result(),
			'statuskeluarga' => $this->M_statuskeluarga->get()->result(),
			'showModal' => $showModal
		];
		// print_r($data['statuskawin']); die;
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/penduduk/index', $data);
		$this->load->view('layout/footer');
	}

	// Get Data Data By ID
	public function getOneData()
	{
		$id = htmlspecialchars($this->input->post('id', true));
		$data = $this->M_penduduk->get($id)->row();
		echo json_encode($data);
	}

	// Add Penduduk
	public function add()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required|exact_length[16]|trim', [
			'required' => 'NIK harus diisi!',
			'exact_length' => 'NIK harus 16 Karakter',
		]);
		$this->form_validation->set_rules('nokk', 'Nomor Kartu Keluarga', 'required|exact_length[16]|trim', [
			'required' => 'Nomor Kartu Keluarga harus diisi!',
			'exact_length' => 'Nomor Kartu Keluarga harus 16 Karakter',
		]);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama harus diisi!',
		]);
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', [
			'required' => 'Jenis Kelamin harus diisi!',
		]);
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [
			'required' => 'Tanggal Lahir harus diisi!',
		]);
		$this->form_validation->set_rules('agama', 'Agama', 'required|trim', [
			'required' => 'Agama harus diisi!',
		]);
		$this->form_validation->set_rules('pendidikan', 'Pendidikan terakhir', 'required|trim', [
			'required' => 'Pendidikan terakhir harus diisi!',
		]);
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', [
			'required' => 'Pekerjaan harus diisi!',
		]);
		$this->form_validation->set_rules('status_kawin', 'Status Kawin', 'required|trim', [
			'required' => 'Status Kawin harus diisi!',
		]);
		$this->form_validation->set_rules('status_keluarga', 'Status Keluarga', 'required|trim', [
			'required' => 'Status Keluarga harus diisi!',
		]);
		$this->form_validation->set_rules('kk', 'Status Kepala Keluarga', 'required|trim', [
			'required' => 'Status Kepala Keluarga harus diisi!',
		]);
		if ($this->form_validation->run() == false) {
			$this->loadView('add');
		} else {
			$data 	= [
				'nama'		=> htmlspecialchars($this->input->post('nama', true)),
				'nik'		=> htmlspecialchars($this->input->post('nik', true)),
				'nokk'		=> htmlspecialchars($this->input->post('nokk', true)),
				'jk'		=> htmlspecialchars($this->input->post('jk', true)),
				'id_agama'		=> htmlspecialchars($this->input->post('agama', true)),
				'tgl_lahir'		=> htmlspecialchars($this->input->post('tgl_lahir', true)),
				'id_pendidikan'		=> htmlspecialchars($this->input->post('pendidikan', true)),
				'id_pekerjaan'		=> htmlspecialchars($this->input->post('pekerjaan', true)),
				'id_status_kawin'		=> htmlspecialchars($this->input->post('status_kawin', true)),
				'id_status_keluarga'		=> htmlspecialchars($this->input->post('status_keluarga', true)),
				'kk'		=> htmlspecialchars($this->input->post('kk', true)),
			];
			$result = $this->M_penduduk->insert($data);
			if ($result) {
				$this->session->set_flashdata('swetalert', '`Upssz!`, `Data Gagal Di Tambahkan !`, `error`');
			} else {
				$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Tambahkan !`, `success`');
			}
			redirect('penduduk');
		}
	}

	public function update()
	{
		// Deklarasi Variable
		$id = htmlspecialchars($this->input->post('id', true));
		$nama = htmlspecialchars($this->input->post('nama', true));
		$nik = htmlspecialchars($this->input->post('nik', true));
		$nokk = htmlspecialchars($this->input->post('nokk', true));
		$jk = htmlspecialchars($this->input->post('jk', true));
		$tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir', true));
		$agama = htmlspecialchars($this->input->post('agama', true));
		$pendidikan = htmlspecialchars($this->input->post('pendidikan', true));
		$pekerjaan = htmlspecialchars($this->input->post('pekerjaan', true));
		$statuskawin = htmlspecialchars($this->input->post('status_kawin', true));
		$statuskeluarga = htmlspecialchars($this->input->post('status_keluarga', true));
		$kk = htmlspecialchars($this->input->post('kk', true));	

		// Set Rules
		$this->form_validation->set_rules('nik', 'NIK', 'required|exact_length[16]|trim', [
			'required' => 'NIK harus diisi!',
			'exact_length' => 'NIK harus 16 Karakter',
		]);
		$this->form_validation->set_rules('nokk', 'Nomor Kartu Keluarga', 'required|exact_length[16]|trim', [
			'required' => 'Nomor Kartu Keluarga harus diisi!',
			'exact_length' => 'Nomor Kartu Keluarga harus 16 Karakter',
		]);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama harus diisi!',
		]);
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', [
			'required' => 'Jenis Kelamin harus diisi!',
		]);
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [
			'required' => 'Tanggal Lahir harus diisi!',
		]);
		$this->form_validation->set_rules('agama', 'Agama', 'required|trim', [
			'required' => 'Agama harus diisi!',
		]);
		$this->form_validation->set_rules('pendidikan', 'Pendidikan terakhir', 'required|trim', [
			'required' => 'Pendidikan terakhir harus diisi!',
		]);
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', [
			'required' => 'Pekerjaan harus diisi!',
		]);
		$this->form_validation->set_rules('status_kawin', 'Status Kawin', 'required|trim', [
			'required' => 'Status Kawin harus diisi!',
		]);
		$this->form_validation->set_rules('status_keluarga', 'Status Keluarga', 'required|trim', [
			'required' => 'Status Keluarga harus diisi!',
		]);
		$this->form_validation->set_rules('kk', 'Status Kepala Keluarga', 'required|trim', [
			'required' => 'Status Kepala Keluarga harus diisi!',
		]);

		// Cek Validasi
		if ($this->form_validation->run() == false) {
			$this->loadView('edit');
		} else {
			$data 	= [
				'nama'			=> $nama,
				'nik'			=> $nik,
				'nokk'			=> $nokk,
				'jk'			=> $jk,
				'id_agama'			=> $agama,
				'tgl_lahir'		=> $tgl_lahir,
				'id_pendidikan'	=> $pendidikan,
				'id_pekerjaan'		=> $pekerjaan,
				'id_status_kawin'		=> $statuskawin,
				'id_status_keluarga'	=> $statuskeluarga,
				'kk'				=> $kk,
			];
			// print_r($data); die;
			$result = $this->M_penduduk->update($id, $data);
			if ($result) {
				$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Gagal Di Ubah !`, `error`');
			} else {
				$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Ubah !`, `success`');
			}
			redirect('penduduk');
		}
	}

	// delete data
	public function delete($id)
	{
		$result = $this->M_penduduk->delete($id);
		if ($result) {
			$this->session->set_flashdata('swetalert', '`Upssz!`, `Data Gagal Di Hapus !`, `error`');
		} else {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Hapus !`, `success`');
		}
		redirect('penduduk');
	}
}
