<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statuskawin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_statuskawin');
		cek_login();
	}

	public function index()
	{

		$data = [
			'title' 		=> 'Status Kawin',
			'statuskawin' => $this->M_statuskawin->get()->result(),
		];
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/statuskawin/index', $data);
		$this->load->view('layout/footer');
	}
}
