<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_lembaga');
	}

	

	public function kegiatan()
	{
		$data = [
			'title' => 'Kegiatan Mahasiswa',
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/mahasiswa/kegiatan', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}

	public function prestasi()
	{
		$data = [
			'title' => 'Prestasi Mahasiswa',
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/mahasiswa/prestasi', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}
}
