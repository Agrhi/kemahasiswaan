<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agama extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_agama');
		cek_login();
	}

	public function index()
	{

		$data = [
			'title' 		=> 'Agama',
			'agama' => $this->M_agama->get()->result(),
		];
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/agama/index', $data);
		$this->load->view('layout/footer');
	}
}
