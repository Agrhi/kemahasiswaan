<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }

    // Load View Login
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];
        $this->load->view('content/login/layout/header', $data);
        $this->load->view('content/login/index');
        $this->load->view('content/login/layout/footer');
    }

    // Load View Register
    public function regist()
    {
        $data = [
            'title' => 'Registrasi',
        ];
        $this->load->view('content/login/layout/header', $data);
        $this->load->view('content/login/regist');
        $this->load->view('content/login/layout/footer');
    }

    // Proses Login
    public function prosses()
    {
        $username   = htmlspecialchars($this->input->post('username'));
        $password   = htmlspecialchars($this->input->post('password'));
        
        $cekuser = $this->M_user->cekuser($username)->result();
        if ($cekuser) {
            
            $ceklogin = $this->M_user->ceklogin($username, $password)->row();
            // print_r($ceklogin); die;

            if ($ceklogin) {

                    if ($ceklogin->status == 1) {
                        $this->session->set_userdata('namauser', $ceklogin->namauser);
                        $this->session->set_userdata('role', $ceklogin->role);
                        redirect('dashboard');
                    } else {
                        $this->session->set_flashdata('swetalert', '`Upsss!`, `Maaf User Anda Belum Aktif`, `error`');
                        redirect('login');
                    }
            } else {
                // echo 'gagal login'; die;
                $this->session->set_flashdata('swetalert', '`Upsss!`, `Maaf Username dan Password Anda Salah`, `error`');
                // print_r($this->session->flashdata('swetalert')); die;
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('swetalert', '`Upsss!`, `Maaf User Anda Belum Terdaftar`, `error`');
            redirect('login');
        }
    }

    // Proses Logout
    public function logout()
    {
        $this->session->unset_userdata('nameuser');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('swetalert', '`Good job!`, `Abda Berhasil Logout`, `success`');
        redirect('home');
    }

    // Load View Blocked
    public function blocked()
    {
        $this->load->view('content/login/blocked');
    }
}
