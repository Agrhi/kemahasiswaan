<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statuskeluarga extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_statuskeluarga');
		cek_login();
	}

	public function index()
	{

		$data = [
			'title' 		=> 'Status Keluarga',
			'statuskeluarga' => $this->M_statuskeluarga->get()->result(),
		];
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/statuskeluarga/index', $data);
		$this->load->view('layout/footer');
	}
}
