<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penduduk');
		$this->load->model('M_user');
		cek_login();
	}

	public function index()
	{
		$jml = $this->M_penduduk->get()->result();
		$laki_laki = 0;
		$perempuan = 0;
		$kk = 0;

		foreach ($jml as $penduduk) {
			if ($penduduk->jk == 'L') {
				$laki_laki++;
			} elseif ($penduduk->jk == 'P') {
				$perempuan++;
			}
			if ($penduduk->kk == 'Y') {
				$kk++;
			}
		}

		$data = [
			'title' 		=> 'Dashboard',
			'jml' => $laki_laki + $perempuan,
			'kk' => $kk,
			'pengelolah' => count($this->M_user->get()->result()),
		];
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/dashboard/index', $data);
		$this->load->view('layout/footer');
	}
}
