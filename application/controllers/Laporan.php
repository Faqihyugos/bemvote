<?php

class Laporan extends CI_Controller{
  public function __construct(){
    parent::__construct();

    require_once(APPPATH . 'third_party/dompdf/dompdf_config.inc.php');

  }

  public function index(){
    
    if($this->session->has_userdata('dosen')) redirect('');
    if($this->session->has_userdata('wakil ketua III')) redirect('');
    if($this->session->has_userdata('npm')) redirect('');

    $this->load->model('Vote_model', 'vote', TRUE);
    $this->load->model('Pemilih_model', 'pemilih', TRUE);
    $this->load->model('Paslon_model', 'paslon', TRUE);

    $paslonSatu = $this->vote->getPaslonSatu();
    $paslonDua = $this->vote->getPaslonDua();
    $paslons = $this->paslon->allPaslon();

    $totalSuaraMasukSatuStat = $this->vote->totalSuaraMasukSatuStat();
    $totalSuaraMasukSatu = $this->vote->totalSuaraMasukSatu();

    $totalSuaraMasukDuaStat = $this->vote->totalSuaraMasukDuaStat();
    $totalSuaraMasukDua = $this->vote->totalSuaraMasukDua();

    $totalPemilih = $this->vote->totalPemilih();
    $totalSuaraMasuk = $this->vote->totalSuaraMasuk();
    $totalTidakMemilih = $this->vote->totalTidakMemilih();
    $totalSuaraMasukStat = $this->vote->totalSuaraMasukStat();

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

    $html = $this->load->view('laporan', compact('paslonSatu', 'paslonDua', 'totalPemilih', 'totalSuaraMasuk',
     'totalTidakMemilih', 'totalSuaraMasukStat', 'totalSuaraMasukDuaStat', 'totalSuaraMasukDua',
      'totalSuaraMasukSatuStat', 'totalSuaraMasukSatu', 'paslons',
       'totalSuaraMasukSIStat', 'totalTidakMemilihSI', 'totalSuaraMasukSI', 'totalPemilihSI',
        'totalPemilihSK', 'totalSuaraMasukSK', 'totalTidakMemilihSK', 'totalSuaraMasukSKStat',
         'totalPemilihMI', 'totalSuaraMasukMI', 'totalTidakMemilihMI', 'totalSuaraMasukMIStat'), true);

    $pdf = new DOMPDF();
    $pdf->load_html($html);
    $pdf->set_paper('A4', 'landscape');
    $pdf->render();
    $pdf->stream("laporan_admin.pdf");

  }

  public function operator(){
    if($this->session->has_userdata('admin')) redirect('');
    if($this->session->has_userdata('dosen')) redirect('');
    if($this->session->has_userdata('wakil ketua III')) redirect('');
    if($this->session->has_userdata('npm')) redirect('');

    $this->load->model('Vote_model', 'vote', true);

    $jurusan = $this->session->userdata('jurusan');

    $paslonSatu = $this->vote->getPaslonSatu();
    $paslonDua = $this->vote->getPaslonDua();

    $totalSuaraMasukSatuJurusanStat = $this->vote->totalSuaraMasukSatuJurusanStat($jurusan);
    $totalSuaraMasukSatuJurusan = $this->vote->totalSuaraMasukSatuJurusan($jurusan);

    $totalSuaraMasukDuaJurusanStat = $this->vote->totalSuaraMasukDuaJurusanStat($jurusan);
    $totalSuaraMasukDuaJurusan = $this->vote->totalSuaraMasukDuaJurusan($jurusan);

    $html = $this->load->view('laporan-operator', compact('jurusan', 'paslonSatu', 'paslonDua', 'totalSuaraMasukSatuJurusanStat', 'totalSuaraMasukSatuJurusan', 'totalSuaraMasukDuaJurusanStat', 'totalSuaraMasukDuaJurusan'), true);

    $pdf = new DOMPDF();
    $pdf->load_html($html);
    $pdf->set_paper('A4', 'landscape');
    $pdf->render();
    $pdf->stream("laporan_".$this->session->hak_akses.".pdf");
  }

  public function waitlaporan(){
    $this->load->view('waitlaporan');
  }

}
