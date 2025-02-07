<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pekerjaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pekerjaan');
		cek_login();
	}

	public function index()
	{

		$data = [
			'title' 		=> 'Pekerjaan',
			'pekerjaan' => $this->M_pekerjaan->get()->result(),
		];
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/pekerjaan/index', $data);
		$this->load->view('layout/footer');
	}
}
