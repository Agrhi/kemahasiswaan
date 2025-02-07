<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'title' => 'Kontak Person',
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/contact/index', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}
}
