<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function sejarah()
	{
		$data = [
			'title' => 'Sejarah',
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/profil/sejarah', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}

	public function vismis()
	{
		$data = [
			'title' => 'Visi & Misi',
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/profil/vismis', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}

	public function struktur()
	{
		$data = [
			'title' => 'Struktur Organisasi',
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/profil/struktur', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}
}
