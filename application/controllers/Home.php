<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$data = [
			'title' 		=> 'Home',
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/home/index', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}
}
