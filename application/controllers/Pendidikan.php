<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendidikan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pendidikan');
		cek_login();
	}

	public function index()
	{

		$data = [
			'title' 		=> 'Pendidikan',
			'pendidikan' => $this->M_pendidikan->get()->result(),
		];
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/pendidikan/index', $data);
		$this->load->view('layout/footer');
	}
}
