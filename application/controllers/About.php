<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'title' => 'About',
			'ok' => 'About',
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/about/index', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}
}
