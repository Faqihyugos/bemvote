<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Admin extends MY_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('Admin_model', 'admin', TRUE);

      // Hanya bisa diakses admin
      if (!$this->cekLoginAdmin()) {
        redirect('');
      }

    }

    // Halaman Utama Admin
    public function index(){
      $admins = $this->admin->allAdmin();
      $totalAdmin = $this->admin->totalAdmin();
      $input = (object) $this->admin->adminDefaultValues();
      $main_view = 'bem/admin';
      $this->load->view('template', compact('main_view', 'admins', 'input', 'totalAdmin'));
    }

    // Tambah Admin
    public function store(){
      if(!$this->input->post(null, TRUE)) redirect('');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->admin->validationAdmin()){
        $admins = $this->admin->allAdmin();
        $main_view = "bem/admin";
        $this->load->view('template', compact('main_view', 'admins', 'input'));
        return;
      }
      $this->admin->insertAdmin($input);
      $this->session->set_flashdata('msg', 'Admin Berhasil Di Tambahkan!');
      redirect('admin');
    }

    // Hapus Admin
    public function destroy(){
      if(!$this->input->post('id_admin', TRUE)) redirect('admin');
      $id = $this->input->post('id_admin', TRUE);
      if($this->admin->deleteAdmin($id)){
        $this->session->set_flashdata('msg', 'Admin Berhasil Di Hapus!');
        redirect('admin');
      }
    }

  }
