<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pendidikan');
		$this->load->model('M_penduduk');
		$this->load->model('M_pekerjaan');
		$this->load->model('M_statuskawin');
		$this->load->model('M_statuskeluarga');
		$this->load->model('M_agama');
	}

	public function pendidikan()
	{
		$pendidikan = $this->M_pendidikan->get()->result();
		$penduduk = $this->M_penduduk->get()->result();

		// Array untuk menyimpan statistik
		$statistics = [];

		// Inisialisasi statistik berdasarkan tingkat pendidikan
		foreach ($pendidikan as $p) {
			$statistics[$p->tingkat_pendidikan] = [
				'L' => 0,
				'P' => 0,
				'Total' => 0
			];
		}

		// Proses data penduduk untuk menghitung statistik
		foreach ($penduduk as $pd) {
			$tingkat_pendidikan = $pd->tingkat_pendidikan; // Asumsikan $pd memiliki tingkat pendidikan sebagai string
			$jenis_kelamin = $pd->jk; // Asumsikan $pd memiliki jenis kelamin sebagai string 'Laki-laki' atau 'Perempuan'

			// Increment jumlah berdasarkan jenis kelamin
			$statistics[$tingkat_pendidikan][$jenis_kelamin]++;

			// Increment total
			$statistics[$tingkat_pendidikan]['Total']++;
		}

		$datapendidikan = [];
		// Output statistik
		foreach ($statistics as $tingkat_pendidikan => $stat) {
			$datapendidikan[] = [
				'tingkat_pendidikan' => $tingkat_pendidikan,
				'L' => $stat['L'],
				'P' => $stat['P'],
				'total' => $stat['Total'],
			];
		}

		$data = [
			'title' => 'Pendidikan',
			'data' => $datapendidikan
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/statistik/pendidikan', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}

	public function pekerjaan()
	{
		$pekerjaan = $this->M_pekerjaan->get()->result();
		$penduduk = $this->M_penduduk->get()->result();

		// Array untuk menyimpan statistik
		$statistics = [];

		// Inisialisasi statistik berdasarkan pekerjaan
		foreach ($pekerjaan as $p) {
			$statistics[$p->pekerjaan] = [
				'L' => 0,
				'P' => 0,
				'Total' => 0
			];
		}

		// Proses data penduduk untuk menghitung statistik
		foreach ($penduduk as $pd) {
			$pekerjaan = $pd->pekerjaan; // Asumsikan $pd memiliki pekerjaan sebagai string
			$jenis_kelamin = $pd->jk; // Asumsikan $pd memiliki jenis kelamin sebagai string 'Laki-laki' atau 'Perempuan'

			// Increment jumlah berdasarkan jenis kelamin
			$statistics[$pekerjaan][$jenis_kelamin]++;

			// Increment total
			$statistics[$pekerjaan]['Total']++;
		}

		$datapekerjaan = [];
		// Output statistik
		foreach ($statistics as $pekerjaan => $stat) {
			$datapekerjaan[] = [
				'pekerjaan' => $pekerjaan,
				'L' => $stat['L'],
				'P' => $stat['P'],
				'total' => $stat['Total'],
			];
		}

		$data = [
			'title' => 'Pekerjaan',
			'data' => $datapekerjaan,
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/statistik/pekerjaan', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}

	public function statuskawin()
	{
		$statuskawin = $this->M_statuskawin->get()->result();
		$penduduk = $this->M_penduduk->get()->result();		

		// Array untuk menyimpan statistik
		$statistics = [];

		// Inisialisasi statistik berdasarkan pekerjaan
		foreach ($statuskawin as $p) {
			$statistics[$p->status_kawin] = [
				'L' => 0,
				'P' => 0,
				'Total' => 0
			];
		}

		// Proses data penduduk untuk menghitung statistik
		foreach ($penduduk as $pd) {
			$statuskawin = $pd->status_kawin; // Asumsikan $pd memiliki pekerjaan sebagai string
			$jenis_kelamin = $pd->jk; // Asumsikan $pd memiliki jenis kelamin sebagai string 'Laki-laki' atau 'Perempuan'

			// Increment jumlah berdasarkan jenis kelamin
			$statistics[$statuskawin][$jenis_kelamin]++;

			// Increment total
			$statistics[$statuskawin]['Total']++;
		}

		$datastatuskawin = [];
		// Output statistik
		foreach ($statistics as $statuskawin => $stat) {
			$datastatuskawin[] = [
				'status_kawin' => $statuskawin,
				'L' => $stat['L'],
				'P' => $stat['P'],
				'total' => $stat['Total'],
			];
		}

		$data = [
			'title' => 'Status Kawin',
			'data' => $datastatuskawin,
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/statistik/statuskawin', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}

	public function statuskeluarga()
	{
		$statuskeluarga = $this->M_statuskeluarga->get()->result();
		$penduduk = $this->M_penduduk->get()->result();		

		// Array untuk menyimpan statistik
		$statistics = [];

		// Inisialisasi statistik berdasarkan pekerjaan
		foreach ($statuskeluarga as $p) {
			$statistics[$p->status_keluarga] = [
				'L' => 0,
				'P' => 0,
				'Total' => 0
			];
		}

		// Proses data penduduk untuk menghitung statistik
		foreach ($penduduk as $pd) {
			$statuskeluarga = $pd->status_keluarga; // Asumsikan $pd memiliki pekerjaan sebagai string
			$jenis_kelamin = $pd->jk; // Asumsikan $pd memiliki jenis kelamin sebagai string 'Laki-laki' atau 'Perempuan'

			// Increment jumlah berdasarkan jenis kelamin
			$statistics[$statuskeluarga][$jenis_kelamin]++;

			// Increment total
			$statistics[$statuskeluarga]['Total']++;
		}

		$datastatuskeluarga = [];
		// Output statistik
		foreach ($statistics as $statuskeluarga => $stat) {
			$datastatuskeluarga[] = [
				'status_keluarga' => $statuskeluarga,
				'L' => $stat['L'],
				'P' => $stat['P'],
				'total' => $stat['Total'],
			];
		}

		$data = [
			'title' => 'Status Keluarga',
			'data' => $datastatuskeluarga,
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/statistik/statuskeluarga', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}

	public function agama()
	{
		$agama = $this->M_agama->get()->result();
		$penduduk = $this->M_penduduk->get()->result();

		// Array untuk menyimpan statistik
		$statistics = [];

		// Inisialisasi statistik berdasarkan agama
		foreach ($agama as $p) {
			$statistics[$p->agama] = [
				'L' => 0,
				'P' => 0,
				'Total' => 0
			];
		}

		// Proses data penduduk untuk menghitung statistik
		foreach ($penduduk as $pd) {
			$agama = $pd->agama; // Asumsikan $pd memiliki agama sebagai string
			$jenis_kelamin = $pd->jk; // Asumsikan $pd memiliki jenis kelamin sebagai string 'Laki-laki' atau 'Perempuan'

			// Increment jumlah berdasarkan jenis kelamin
			$statistics[$agama][$jenis_kelamin]++;

			// Increment total
			$statistics[$agama]['Total']++;
		}

		$dataagama = [];
		// Output statistik
		foreach ($statistics as $agama => $stat) {
			$dataagama[] = [
				'agama' => $agama,
				'L' => $stat['L'],
				'P' => $stat['P'],
				'total' => $stat['Total'],
			];
		}

		$data = [
			'title' => 'Agama',
			'data' => $dataagama,
		];

		$this->load->view('content/landingpage/template/header', $data);
		$this->load->view('content/landingpage/template/nav', $data);
		$this->load->view('content/landingpage/statistik/agama', $data);
		$this->load->view('content/landingpage/template/footer', $data);
	}
}
