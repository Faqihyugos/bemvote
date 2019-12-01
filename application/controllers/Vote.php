<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Vote extends MY_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->model('Vote_model', 'vote', TRUE);
      $this->load->model('Paslon_model', 'paslon', TRUE);
    }

    // Fitur Mencoblos
    public function index(){
      if($this->input->post('coblos', TRUE)) {
        $data = [
          'id_pemilih' => $this->input->post('id_pemilih', TRUE),
          'id_paslon' => $this->input->post('id_paslon', TRUE)
        ];

        $pemilih = $this->vote->pemilih($this->session->userdata('id_pemilih'));
        if ($pemilih->telah_memilih === 'tidak') {
          $this->vote->coblosPaslon($data);
        }

        $this->vote->setTelahMemilih($this->session->userdata('id_pemilih'));
        $this->session->unset_userdata('pemilih');
        $this->session->set_flashdata('mencoblos', TRUE);
        redirect('');
      }else{
        $paslons = $this->vote->allPaslon();
        $capress = $this->paslon->allCapres();
        $cawapress = $this->paslon->allCawapres();
        $main_view = 'bem/index';
        $this->load->view('template', compact('main_view', 'paslons', 'capress', 'cawapress'));
      }
    }

    // Halaman Pemilihan
    public function pemilihan(){
      if(!$this->cekLoginAdmin()) redirect('');
      $suaraMasuks = $this->vote->suaraMasuk();
      $totalSuaraMasuk = $this->vote->totalSuaraMasuk();
      $main_view = 'bem/pemilihan';
      $this->load->view('template', compact('main_view', 'suaraMasuks', 'totalSuaraMasuk'));
    }

    // Fitur Statistik Pemilihan
    public function stat(){
      if($this->session->has_userdata('npm')) redirect('');
      if($this->session->has_userdata('panitia')) redirect('');

      $totalPemilihSI = $this->vote->totalPemilihSI();
      $totalSuaraMasukSI = $this->vote->totalSuaraMasukSI();
      $totalTidakMemilihSI = $this->vote->totalTidakMemilihSI();
      $totalSuaraMasukSIStat = $this->vote->totalSuaraMasukSIStat();

      $totalPemilihSK = $this->vote->totalPemilihSK();
      $totalSuaraMasukSK = $this->vote->totalSuaraMasukSK();
      $totalTidakMemilihSK = $this->vote->totalTidakMemilihSK();
      $totalSuaraMasukSKStat = $this->vote->totalSuaraMasukSKStat();

      $totalPemilihMI = $this->vote->totalPemilihMI();
      $totalSuaraMasukMI = $this->vote->totalSuaraMasukMI();
      $totalTidakMemilihMI = $this->vote->totalTidakMemilihMI();
      $totalSuaraMasukMIStat = $this->vote->totalSuaraMasukMIStat();

      

      $main_view = 'bem/statistik-pemilih';
      $this->load->view('template', compact('main_view',
      'totalSuaraMasukSIStat', 'totalTidakMemilihSI', 'totalSuaraMasukSI', 'totalPemilihSI',
      'totalSuaraMasukSKStat', 'totalTidakMemilihSK', 'totalSuaraMasukSK', 'totalPemilihSK',
      'totalSuaraMasukMIStat', 'totalTidakMemilihMI', 'totalSuaraMasukMI', 'totalPemilihMI'
      ));
    }

    // Fitur Statistik Pemilihan Berdasarkan Fakultas
    public function statjurusan(){
      if($this->session->has_userdata('npm')) redirect('');
      if($this->session->has_userdata('admin')) redirect('');
      if($this->session->has_userdata('wakil ketua III')) redirect('');
      if($this->session->has_userdata('dosen')) redirect('');

      $jurusan = $this->session->userdata('jurusan');
      $totalPemilihJurusan = $this->vote->totalPemilihJurusan($jurusan);
      $totalSuaraMasukJurusan = $this->vote->totalSuaraMasukJurusan($jurusan);
      $totalTidakMemilihJurusan = $this->vote->totalTidakMemilihJurusan($jurusan);
      $totalSuaraMasukJurusanStat = $this->vote->totalSuaraMasukJurusanStat($jurusan);

      $main_view = 'bem/statistik-jurusan';
      $this->load->view('template', compact('main_view',
      'totalSuaraMasukJurusanStat', 'totalTidakMemilihJurusan', 'totalSuaraMasukJurusan', 'totalPemilihJurusan'));
    }

    // Fitur Live Count
    public function livecount(){
      if($this->session->has_userdata('npm')) redirect('');

      $paslonSatu = $this->vote->getPaslonSatu();
      $paslonDua = $this->vote->getPaslonDua();

      $totalSuaraMasukSatuStat = $this->vote->totalSuaraMasukSatuStat();
      $totalSuaraMasukSatu = $this->vote->totalSuaraMasukSatu();

      $totalSuaraMasukDuaStat = $this->vote->totalSuaraMasukDuaStat();
      $totalSuaraMasukDua = $this->vote->totalSuaraMasukDua();

      $totalPemilih = $this->vote->totalPemilih();
      $totalSuaraMasuk = $this->vote->totalSuaraMasuk();
      $totalTidakMemilih = $this->vote->totalTidakMemilih();
      $totalSuaraMasukStat = $this->vote->totalSuaraMasukStat();

      $main_view = 'bem/live-count';
      $this->load->view('template', compact('main_view', 'paslonSatu', 'paslonDua', 'totalPemilih', 'totalSuaraMasuk', 'totalTidakMemilih', 'totalSuaraMasukStat', 'totalSuaraMasukDuaStat', 'totalSuaraMasukDua', 'totalSuaraMasukSatuStat', 'totalSuaraMasukSatu'));
    }

    // Fitur Live Count Fakultas
    public function livecountfakultas(){
      if($this->session->has_userdata('npm')) redirect('');
      if($this->session->has_userdata('admin')) redirect('');
      if($this->session->has_userdata('wakil ketua III')) redirect('');
      if($this->session->has_userdata('dosen')) redirect('');

      $jurusan = $this->session->userdata('jurusan');

      $paslonSatu = $this->vote->getPaslonSatu();
      $paslonDua = $this->vote->getPaslonDua();

      $totalSuaraMasukSatuJurusanStat = $this->vote->totalSuaraMasukSatuJurusanStat($jurusan);
      $totalSuaraMasukSatuJurusan = $this->vote->totalSuaraMasukSatuJurusan($jurusan);

      $totalSuaraMasukDuaJurusanStat = $this->vote->totalSuaraMasukDuaJurusanStat($jurusan);
      $totalSuaraMasukDuaJurusan = $this->vote->totalSuaraMasukDuaJurusan($jurusan);

      $totalPemilihJurusan = $this->vote->totalPemilihJurusan($jurusan);
      $totalSuaraMasukJurusan = $this->vote->totalSuaraMasukJurusan($jurusan);
      $totalTidakMemilihJurusan = $this->vote->totalTidakMemilihJurusan($jurusan);
      $totalSuaraMasukJurusanStat = $this->vote->totalSuaraMasukJurusanStat($jurusan);

      $main_view = 'bem/live-count-jurusan';
      $this->load->view('template', compact('main_view', 'paslonSatu', 'paslonDua', 'totalPemilihJurusan', 'totalSuaraMasukJurusan', 'totalTidakMemilihJurusan', 'totalSuaraMasukJurusanStat', 'totalSuaraMasukDuaJurusanStat', 'totalSuaraMasukDuaJurusan', 'totalSuaraMasukSatuJurusanStat', 'totalSuaraMasukSatuJurusan'));
    }

    public function waitlivecount(){
      $this->load->view('waitlivecount');
    }

  }
