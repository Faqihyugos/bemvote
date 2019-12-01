<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Paslon extends MY_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('Paslon_model', 'paslon', TRUE);

    }

    // Halaman Utama Paslon
    public function index(){
      if($this->session->has_userdata('npm')) redirect('');
      $paslons = $this->paslon->allPaslon();
      $input = (object) $this->paslon->paslonDefaultValues();
      $main_view = 'bem/paslon';
      $this->load->view('template', compact('main_view', 'paslons', 'input'));
    }

    // Detail Paslon
    public function show($id){
      $paslon = $this->paslon->getPaslon($id);
      if(!$paslon) redirect('');
      $main_view = 'bem/detail-paslon';
      $this->load->view('template', compact('main_view', 'paslon'));
    }

    // Tambah Paslon
    public function store(){
      if (!$this->cekLoginAdmin()) redirect('');
      if(!$this->input->post(null, TRUE)) redirect('');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->paslon->validationPaslon()){
        $paslons = $this->paslon->allPaslon();
        $main_view = "bem/paslon";
        $this->load->view('template', compact('main_view', 'paslons', 'input'));
        return;
      }
      $paslon['nama_paslon'] = $input->nama_paslon;
      $paslon['nama_koalisi'] = $input->nama_koalisi;
      $paslon['nomor_urut'] = $input->nomor_urut;
      $paslon['visimisi'] = $input->visimisi;
      $this->paslon->insertPaslon($paslon);

      $pas = $this->paslon->getPaslonByName($input->nama_paslon);

      $capres['nama_capres'] = $input->nama_capres;
      $capres['jurusan_capres'] = $input->jurusan_capres;
      $capres['angkatan_capres'] = $input->angkatan_capres;
      $capres['id_paslon'] = $pas->id_paslon;
      $config = [
          'upload_path' => './assets/img',
          'allowed_types' => 'jpg|gif|png',
          'max_size' => '5000'
        ];
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('gambar_capres')){
          $this->session->set_flashdata('msg', 'Upload wajib diisi <br> Hanya boleh mengupload JPG, PNG, GIF <br> Ukuran File max 4MB');
          $paslons = $this->paslon->allPaslon();
          $errors = $this->upload->display_errors();
          $main_view = "bem/paslon";
          $this->load->view('template', compact('main_view', 'paslons', 'input', 'errors'));
          return;
        }
      $capres['gambar_capres'] = $this->upload->data('file_name');
      $this->paslon->insertCapres($capres);

      $cawapres['nama_cawapres'] = $input->nama_cawapres;
      $cawapres['jurusan_cawapres'] = $input->jurusan_cawapres;
      $cawapres['angkatan_cawapres'] = $input->angkatan_cawapres;
      $cawapres['id_paslon'] = $pas->id_paslon;
      $config = [
          'upload_path' => './assets/img',
          'allowed_types' => 'jpg|gif|png',
          'max_size' => '5000'
        ];
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('gambar_cawapres')){
          $this->session->set_flashdata('msg', 'Upload wajib diisi <br> Hanya boleh mengupload JPG, PNG, GIF <br> Ukuran File max 4MB');
          $paslons = $this->paslon->allPaslon();
          $errors = $this->upload->display_errors();
          $main_view = "bem/paslon";
          $this->load->view('template', compact('main_view', 'paslons', 'input', 'errors'));
          return;
        }
      $cawapres['gambar_cawapres'] = $this->upload->data('file_name');
      $this->paslon->insertCawapres($cawapres);

      $this->session->set_flashdata('msg', 'Paslon Berhasil Di Tambahkan!');
      redirect('paslon');
    }

    // Halaman Edit
    public function edit($id){
      if (!$this->cekLoginAdmin()) redirect('');
      $paslon = $this->paslon->getPaslon($id);
      if(!$paslon) redirect('paslon');
      $main_view = 'bem/edit-paslon';
      $this->load->view('template', compact('main_view', 'paslon'));
    }

    // Update Paslon
    public function update(){
      if (!$this->cekLoginAdmin()) redirect('');
      if(!$this->input->post(null, TRUE)) redirect('paslon');
      $paslon = (object) $this->input->post(null, TRUE);
      $id_paslon = $this->input->post('id_paslon', TRUE);

      $pas['nama_paslon'] = $this->input->post('nama_paslon', TRUE);
      $pas['nama_koalisi'] = $this->input->post('nama_koalisi', TRUE);
      $pas['jurusan_koalisi'] = $this->input->post('jurusan_koalisi', TRUE);
      $pas['nomor_urut'] = $this->input->post('nomor_urut', TRUE);
      $pas['visimisi'] = $this->input->post('visimisi', TRUE);

      $capres['nama_capres'] = $this->input->post('nama_capres', TRUE);
      $capres['jurusan_capres'] = $this->input->post('jurusan_capres', TRUE);
      $capres['angkatan_capres'] = $this->input->post('angkatan_capres', TRUE);
      $config = [
          'upload_path' => './assets/img',
          'allowed_types' => 'jpg|gif|png',
          'max_size' => '5000'
      ];
      $this->load->library('upload', $config);
      if($this->upload->do_upload('gambar_capres')){
        $capres['gambar_capres'] = $this->upload->data('file_name');
      }
      $cawapres['nama_cawapres'] = $this->input->post('nama_cawapres', TRUE);
      $cawapres['jurusan_cawapres'] = $this->input->post('jurusan_cawapres', TRUE);
      $cawapres['angkatan_cawapres'] = $this->input->post('angkatan_cawapres', TRUE);
      $config = [
          'upload_path' => './assets/img',
          'allowed_types' => 'jpg|gif|png',
          'max_size' => '5000'
      ];
      $this->load->library('upload', $config);
      if($this->upload->do_upload('gambar_cawapres')){
        $capres['gambar_cawapres'] = $this->upload->data('file_name');
      }

      if(!$this->paslon->validationPaslon()){
        $paslon = (object) $paslon;
        $main_view = "bem/edit-paslon";
        $this->load->view('template', compact('main_view', 'paslon'));
        return;
      }

      $this->paslon->updatePaslon($id_paslon, $pas);
      $this->paslon->updateCapres($id_paslon, $capres);
      $this->paslon->updateCawapres($id_paslon, $cawapres);
      $this->session->set_flashdata('msg', 'Paslon Berhasil Di Edit!');
      redirect('paslon');
    }

    // Hapus Paslon
    public function destroy(){
      if (!$this->cekLoginAdmin()) redirect('');
      if(!$this->input->post('id_paslon', TRUE)) redirect('paslon');
      $id = $this->input->post('id_paslon', TRUE);
      if($this->paslon->deletePaslon($id)){
        $this->session->set_flashdata('msg', 'Paslon Berhasil Di Hapus!');
        redirect('paslon');
      }
    }

  }
