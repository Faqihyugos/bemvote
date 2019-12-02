<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('Login_model', 'login', TRUE);
    }

    // Login Mahasiswa
    public function index(){
      if(!$this->input->post(null, TRUE)){
        $input = (object) $this->login->loginDefaultValues();
        $this->load->view('bem/login', compact('input'));

        if($this->session->userdata('login')){
          redirect('');
          return;
        }
      }else{
        $npm = $this->input->post('npm', TRUE);
        $tgllahir = $this->input->post('tgl_lahir', TRUE);
        $pemilih = $this->login->checkPemilih($npm, $tgllahir);

        if($pemilih > 0){
          if ($pemilih->telah_memilih === 'tidak') {
            $data = [
              'login' => TRUE,
              'id_pemilih' => $pemilih->id_pemilih,
              'npm' => $pemilih->npm_pemilih,
              'nama' => $pemilih->nama_pemilih,
              'user' => 'Mahasiswa',
              'pemilih' => TRUE
            ];
          }else{
            $data = [
              'login' => TRUE,
              'id_pemilih' => $pemilih->id_pemilih,
              'npm' => $pemilih->npm_pemilih,
              'nama' => $pemilih->nama_pemilih,
              'user' => 'Mahasiswa',
            ];
          }

          $this->session->set_userdata($data);
          // $this->login->aktifkanStatusPemilih($this->session->userdata('npm'));
          $this->login->loginTerakhirPemilih($this->session->userdata('npm'));
          
          if($this->session->userdata('login')){
            redirect('');
            return;
          }
        }else{
          $this->session->set_flashdata('error_msg', 'Username dan/atau Password Anda Salah');
          $input = (object) $this->input->post(null, TRUE);
          $this->load->view('bem/login', compact('input'));
        }
      }
    }

    // Login Admin, Operator, Dekan, Rektor
    public function admin(){
      if(!$this->input->post(null, TRUE)){
        $input = (object) $this->login->loginDefaultValues();
        $this->load->view('bem/login-admin', compact('input'));

        if($this->session->userdata('login')){
          redirect('');
          return;
        }
      }else{
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $admin = $this->login->checkAdmin($username, $password);

        if($admin > 0){
          if ($admin->hak_akses === 'admin') {
            $data = [
              'login' => TRUE,
              'id_admin' => $admin->id_admin,
              'username' => $admin->username_admin,
              'hak_akses' => $admin->hak_akses,
              'user' => 'Admin',
              'admin' => TRUE
            ];
          }elseif ($admin->hak_akses === 'wakil ketua III') {
            $data = [
              'login' => TRUE,
              'id_admin' => $admin->id_admin,
              'username' => $admin->username_admin,
              'hak_akses' => $admin->hak_akses,
              'user' => 'Wakil Ketua III',
              'wakil' => TRUE
            ];
          }elseif ($admin->hak_akses === 'dosen') {
            $data = [
              'login' => TRUE,
              'id_admin' => $admin->id_admin,
              'username' => $admin->username_admin,
              'hak_akses' => $admin->hak_akses,
              'user' => 'Dosen',
              'dosen' => TRUE
            ];
          }

          $this->session->set_userdata($data);
          $this->login->loginTerakhirAdmin($this->session->userdata('id_admin'));
          if($this->session->userdata('login')){
            redirect('');
            return;
          }
        }else{
          $this->session->set_flashdata('error_msg', 'Username dan/atau Password Salah');
          $input = (object) $this->input->post(null, TRUE);
          $this->load->view('bem/login-admin', compact('input'));
        }
      }
    }

    // Logout all user
    public function logout(){
      $this->session->sess_destroy();
      redirect('');
    }

    public function doc(){
      $this->load->view('doc');
    }

  }
