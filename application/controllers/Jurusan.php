<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Jurusan extends MY_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('Jurusan_model', 'jurusan', TRUE);

      // Hanya bisa diakses Admin
      if (!$this->cekLoginAdmin()) {
        redirect('');
      }

    }

    // Halaman Utama Jurusan
    public function index(){
      $jurusans = $this->jurusan->allJurusan();
      $main_view = 'bem/jurusan';
      $totalJurusan = $this->jurusan->totalJurusan();
      $input = (object) $this->jurusan->jurusanDefaultValues();
      $this->load->view('template', compact('main_view', 'jurusans', 'input', 'totalJurusan'));
    }

    // Tambah Jurusan
    public function store(){
      if(!$this->input->post(null, TRUE)) redirect('');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->jurusan->validationJurusan()){
        $jurusans = $this->jurusan->allJurusan();
        $main_view = "bem/jurusan";
        $this->load->view('template', compact('main_view', 'jurusans', 'input'));
        return;
      }
      $this->jurusan->insertJurusan($input);
      $this->session->set_flashdata('msg', 'Jurusan Berhasil Di Tambahkan!');
      redirect('jurusan');
    }

    // Halaman Edit Jurusan
    public function edit($id){
      $jurusan = $this->jurusan->getJurusan($id);
      if(!$jurusan) redirect('jurusan');
      $main_view = 'bem/edit-jurusan';
      $this->load->view('template', compact('main_view', 'jurusan'));
    }

    // Edit Jurusan
    public function update(){
      if(!$this->input->post(null, TRUE)) redirect('jurusan');
      $id_jurusan = $this->input->post('id_jurusan', TRUE);
      $jurusan['nama_jurusan'] = $this->input->post('nama_jurusan', TRUE);
      $jurusan['id_jurusan'] = $this->input->post('id_jurusan', TRUE);
      if(!$this->jurusan->validationJurusan()){
        $jurusan = (object) $jurusan;
        $main_view = "bem/edit-jurusan";
        $this->load->view('template', compact('main_view', 'jurusan'));
        return;
      }
      $this->jurusan->updateJurusan($id_jurusan, $jurusan);
      $this->session->set_flashdata('msg', 'Jurusan Berhasil Di Edit!');
      redirect('jurusan');
    }

    // Hapus Jurusan
    public function destroy(){
      if(!$this->input->post('id_jurusan', TRUE)) redirect('jurusan');
      $id = $this->input->post('id_jurusan', TRUE);
      if($this->jurusan->deleteJurusan($id)){
        $this->session->set_flashdata('msg', 'Jurusan Berhasil Di Hapus!');
        redirect('Jurusan');
      }
    }

  }
