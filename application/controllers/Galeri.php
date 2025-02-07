<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_galeri');
	}

	public function index()
	{
		$data = [
			'title' => 'Galeri',
			'galeri' => $this->M_galeri->get()->result(),
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/galeri/index', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}

	// Get Data By ID
	public function getOneData()
	{
		$id = htmlspecialchars($this->input->post('id', true));
		$data = $this->M_galeri->get($id)->row();
		echo json_encode($data);
	}
}
