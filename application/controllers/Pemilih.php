<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Pemilih extends MY_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('Pemilih_model', 'pemilih', TRUE);
      $this->load->library('pagination');

      // Hanya bisa diakses Operator, Dekan, Rektor
      if($this->session->has_userdata('npm')) redirect('');

    }

    // Halaman Utama Pemilih
    public function index($page = null){
      if($this->session->has_userdata('admin')) redirect('');
      if($this->session->has_userdata('wakil ketua III')) redirect('');
      if($this->session->has_userdata('dosen')) redirect('');

      $perPage = 10;
      if($page === null) $offset = 0;
      else $offset = ($page * $perPage) - $perPage;

      $pemilihs = $this->pemilih->allPemilih($jurusan, $perPage, $offset);
      $jumlahPemilih = $this->pemilih->jumlahPemilih($jurusan);
      $belumMemilihs = $this->pemilih->allPemilihBelumMemilih($jurusan, $perPage, $offset);
      $jumlahBelumPemilih = $this->pemilih->jumlahBelumPemilih($jurusan);
      $jurusans = $this->pemilih->allJurusan();
      $input = (object) $this->pemilih->pemilihDefaultValues();

      $config['base_url'] = base_url('pemilih');
      $config['total_rows'] = $jumlahPemilih;
      $config['per_page'] = $perPage;
      $config['use_page_numbers'] = true;
      $config['next_link'] = 'Selanjutnya';
      $config['prev_link'] = 'Sebelumnya';
      $config['first_link'] = 'Pertama';
      $config['last_link'] = 'Terakhir';
      $config['num_links'] = '2';
      $config['first_tag_open'] = '<li>';
      $config['first_tag_close'] = '</li>';
      $config['last_tag_open'] = "<li class='page-item'>";
      $config['last_tag_close'] = '</li>';
      $config['next_tag_open'] = "<li class='page-item'>";
      $config['next_tag_close'] = '</li>';
      $config['prev_tag_open'] = "<li class='page-item'>";
      $config['prev_tag_close'] = '</li>';
      $config['cur_tag_open'] = "<li class='page-item'><span class='page-link'>";
      $config['cur_tag_close'] = "<span class='sr-only'>(current)</span></span></li>";
      $config['num_tag_open'] = "<li class='page-item'>";
      $config['num_tag_close'] = '</li>';
      $config['attributes'] = array('class' => 'page-item');
      $this->pagination->initialize($config);
      $pagination = $this->pagination->create_links();

      $main_view = 'bem/pemilih';
      $this->load->view('template', compact('main_view', 'pemilihs', 'input', 'jurusans', 'belumMemilihs', 'pemilihJurusans', 'jumlahPemilih', 'jumlahBelumPemilih', 'pagination'));
    }

    // Halaman Pemilih untuk Admin, Dekan, Rektor
    public function pemilihadmin($page = null){
      if($this->session->has_userdata('admin')) redirect('');

      $perPage = 10;
      if($page === null) $offset = 0;
      else $offset = ($page * $perPage) - $perPage;

      $pemilihs = $this->pemilih->allPemilihAdmin($perPage, $offset);
      $totalPemilihAdmin = $this->pemilih->totalPemilihAdmin();
      $belumMemilihs = $this->pemilih->allPemilihBelumMemilihAdmin($perPage, $offset);
      $totalPemilihBelumMemilihAdmin = $this->pemilih->totalPemilihBelumMemilihAdmin();
      $jurusans = $this->pemilih->allJurusan();
      $input = (object) $this->pemilih->pemilihDefaultValues();

      $config['base_url'] = base_url('pemilih-admin');
      $config['total_rows'] = $totalPemilihAdmin;
      $config['per_page'] = $perPage;
      $config['use_page_numbers'] = true;
      $config['next_link'] = 'Selanjutnya';
      $config['prev_link'] = 'Sebelumnya';
      $config['first_link'] = 'Pertama';
      $config['last_link'] = 'Terakhir';
      $config['num_links'] = '2';
      $config['first_tag_open'] = '<li>';
      $config['first_tag_close'] = '</li>';
      $config['last_tag_open'] = "<li class='page-item'>";
      $config['last_tag_close'] = '</li>';
      $config['next_tag_open'] = "<li class='page-item'>";
      $config['next_tag_close'] = '</li>';
      $config['prev_tag_open'] = "<li class='page-item'>";
      $config['prev_tag_close'] = '</li>';
      $config['cur_tag_open'] = "<li class='page-item'><span class='page-link'>";
      $config['cur_tag_close'] = "<span class='sr-only'>(current)</span></span></li>";
      $config['num_tag_open'] = "<li class='page-item'>";
      $config['num_tag_close'] = '</li>';
      $config['attributes'] = array('class' => 'page-item');
      $this->pagination->initialize($config);
      $pagination = $this->pagination->create_links();

      $main_view = 'bem/pemilih-admin';
      $this->load->view('template', compact('main_view', 'pemilihs', 'input', 'jurusans', 'belumMemilihs', 'totalPemilihAdmin', 'totalPemilihBelumMemilihAdmin', 'pagination'));
    }

    // Tambah Pemilih
    public function store(){
      if (!$this->cekLoginAdmin()) redirect('');
      if(!$this->input->post(null, TRUE)) redirect('');
      $input = (object) $this->input->post(null, TRUE);
      if(!$this->pemilih->validationPemilih()){
        $belumMemilihs = $this->pemilih->allPemilih();
        $pemilihJurusan = $this->pemilih->pemilihJurusan(1);
        $pemilihs = $this->pemilih->allPemilih();
        $jurusans = $this->pemilih->allJurusan();
        $main_view = "bem/pemilih";
        $this->load->view('template', compact('main_view', 'jurusans', 'input', 'pemilihs', 'pemilihJurusans', 'belumMemilihs'));
        return;
      }
      $pemilih->telah_memilih === 'tidak';
      $this->pemilih->insertPemilih($input);
      $this->session->set_flashdata('msg', 'Pemilih Berhasil Di Tambahkan!');
      redirect('pemilih-admin');
    }

    // Hapus Pemilih
    public function destroy(){
      if(!$this->cekLoginAdmin()) redirect('');
      if(!$this->input->post('id_pemilih', TRUE)) redirect('pemilih');
      $id = $this->input->post('id_pemilih', TRUE);
      if($this->pemilih->deletePemilih($id)){
        $this->session->set_flashdata('msg', 'Pemilih Berhasil Di Hapus!');
        redirect('pemilih-admin');
      }
    }

    public function search(){
      if($this->session->has_userdata('admin')) redirect('');
      if($this->session->has_userdata('wakil ketua III')) redirect('');
      if($this->session->has_userdata('dosen')) redirect('');

      $npm = $this->input->get('npm', true);
      $nama = $this->input->get('nama', true);

      $pemilihs = $this->pemilih->searchPemilih($npm, $nama, $jurusan);
      $jumlahSearchPemilih = $this->pemilih->jumlahSearchPemilih($npm, $nama, $jurusan);

      $main_view = 'bem/search-pemilih';
      $this->load->view('template', compact('main_view', 'pemilihs', 'npm', 'nama', 'jumlahSearchPemilih'));
    }

    public function searchajax(){
      if($this->session->has_userdata('admin')) redirect('');
      if($this->session->has_userdata('wakil ketua III')) redirect('');
      if($this->session->has_userdata('dosen')) redirect('');

      $npm = $this->input->get('npm', true);
      $nama = $this->input->get('nama', true);

      $pemilihs = $this->pemilih->searchPemilih($npm, $nama, $jurusan);
      $jumlahSearchPemilih = $this->pemilih->jumlahSearchPemilih($npm, $nama, $jurusan);

      $main_view = 'bem/search-pemilih-ajax';
      $this->load->view('template', compact('main_view', 'pemilihs', 'npm', 'nama', 'jumlahSearchPemilih'));
    }

    public function searchpemilihadmin(){
      if($this->session->has_userdata('panitia')) redirect('');

      $npm = $this->input->get('npm', true);
      $nama = $this->input->get('nama', true);
      $pemilihs = $this->pemilih->searchPemilihByAdmin($npm, $nama);
      $jumlahsearchPemilihByAdmin = $this->pemilih->jumlahsearchPemilihByAdmin($npm, $nama);
      $main_view = 'bem/search-pemilih-admin';
      $this->load->view('template', compact('main_view', 'pemilihs', 'npm', 'nama','jumlahsearchPemilihByAdmin'));
    }

    public function searchadminajax(){
      if($this->session->has_userdata('panitia')) redirect('');

      $npm = $this->input->get('npm', true);
      $nama = $this->input->get('nama', true);
      $pemilihs = $this->pemilih->searchPemilihByAdmin($npm, $nama);
      $jumlahsearchPemilihByAdmin = $this->pemilih->jumlahsearchPemilihByAdmin($npm, $nama);
      $main_view = 'bem/search-pemilih-admin-ajax';
      $this->load->view('template', compact('main_view', 'pemilihs', 'npm', 'nama','jumlahsearchPemilihByAdmin'));
    }


  }
