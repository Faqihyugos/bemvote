<?php

class Laporan extends CI_Controller{
  public function __construct(){
    parent::__construct();

    require_once(APPPATH . 'third_party/dompdf/dompdf_config.inc.php');

  }

  public function index(){

    if($this->session->has_userdata('operator')) redirect('');
    if($this->session->has_userdata('dekan')) redirect('');
    if($this->session->has_userdata('rektor')) redirect('');
    if($this->session->has_userdata('nim')) redirect('');

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

    $totalPemilihTeknik = $this->vote->totalPemilihTeknik();
    $totalSuaraMasukTeknik = $this->vote->totalSuaraMasukTeknik();
    $totalTidakMemilihTeknik = $this->vote->totalTidakMemilihTeknik();
    $totalSuaraMasukTeknikStat = $this->vote->totalSuaraMasukTeknikStat();

    $totalPemilihFIP = $this->vote->totalPemilihFIP();
    $totalSuaraMasukFIP = $this->vote->totalSuaraMasukFIP();
    $totalTidakMemilihFIP = $this->vote->totalTidakMemilihFIP();
    $totalSuaraMasukFIPStat = $this->vote->totalSuaraMasukFIPStat();

    $totalPemilihMIPA = $this->vote->totalPemilihMIPA();
    $totalSuaraMasukMIPA = $this->vote->totalSuaraMasukMIPA();
    $totalTidakMemilihMIPA = $this->vote->totalTidakMemilihMIPA();
    $totalSuaraMasukMIPAStat = $this->vote->totalSuaraMasukMIPAStat();

    $totalPemilihEkonomi = $this->vote->totalPemilihEkonomi();
    $totalSuaraMasukEkonomi = $this->vote->totalSuaraMasukEkonomi();
    $totalTidakMemilihEkonomi = $this->vote->totalTidakMemilihEkonomi();
    $totalSuaraMasukEkonomiStat = $this->vote->totalSuaraMasukEkonomiStat();

    $totalPemilihFOK = $this->vote->totalPemilihFOK();
    $totalSuaraMasukFOK = $this->vote->totalSuaraMasukFOK();
    $totalTidakMemilihFOK = $this->vote->totalTidakMemilihFOK();
    $totalSuaraMasukFOKStat = $this->vote->totalSuaraMasukFOKStat();

    $totalPemilihFIS = $this->vote->totalPemilihFIS();
    $totalSuaraMasukFIS = $this->vote->totalSuaraMasukFIS();
    $totalTidakMemilihFIS = $this->vote->totalTidakMemilihFIS();
    $totalSuaraMasukFISStat = $this->vote->totalSuaraMasukFISStat();

    $totalPemilihFIK = $this->vote->totalPemilihFIK();
    $totalSuaraMasukFIK = $this->vote->totalSuaraMasukFIK();
    $totalTidakMemilihFIK = $this->vote->totalTidakMemilihFIK();
    $totalSuaraMasukFIKStat = $this->vote->totalSuaraMasukFIKStat();

    $totalPemilihFaperta = $this->vote->totalPemilihFaperta();
    $totalSuaraMasukFaperta = $this->vote->totalSuaraMasukFaperta();
    $totalTidakMemilihFaperta = $this->vote->totalTidakMemilihFaperta();
    $totalSuaraMasukFapertaStat = $this->vote->totalSuaraMasukFapertaStat();

    $totalPemilihHukum = $this->vote->totalPemilihHukum();
    $totalSuaraMasukHukum = $this->vote->totalSuaraMasukHukum();
    $totalTidakMemilihHukum = $this->vote->totalTidakMemilihHukum();
    $totalSuaraMasukHukumStat = $this->vote->totalSuaraMasukHukumStat();

    $totalPemilihFSB = $this->vote->totalPemilihFSB();
    $totalSuaraMasukFSB = $this->vote->totalSuaraMasukFSB();
    $totalTidakMemilihFSB = $this->vote->totalTidakMemilihFSB();
    $totalSuaraMasukFSBStat = $this->vote->totalSuaraMasukFSBStat();

    $html = $this->load->view('laporan', compact('paslonSatu', 'paslonDua', 'totalPemilih', 'totalSuaraMasuk', 'totalTidakMemilih', 'totalSuaraMasukStat', 'totalSuaraMasukDuaStat', 'totalSuaraMasukDua', 'totalSuaraMasukSatuStat', 'totalSuaraMasukSatu', 'paslons', 'totalSuaraMasukFSBStat', 'totalTidakMemilihFSB', 'totalSuaraMasukFSB', 'totalPemilihFSB', 'totalPemilihHukum', 'totalSuaraMasukHukum', 'totalTidakMemilihHukum', 'totalSuaraMasukHukumStat', 'totalPemilihFaperta', 'totalSuaraMasukFaperta', 'totalTidakMemilihFaperta', 'totalSuaraMasukFapertaStat', 'totalPemilihFIK', 'totalSuaraMasukFIK', 'totalTidakMemilihFIK', 'totalSuaraMasukFIKStat', 'totalPemilihFIS', 'totalSuaraMasukFIS', 'totalTidakMemilihFIS', 'totalSuaraMasukFISStat', 'totalPemilihFOK', 'totalSuaraMasukFOK', 'totalTidakMemilihFOK', 'totalSuaraMasukFOKStat', 'totalPemilihEkonomi', 'totalSuaraMasukEkonomi', 'totalTidakMemilihEkonomi', 'totalSuaraMasukEkonomiStat', 'totalPemilihMIPA', 'totalSuaraMasukMIPA', 'totalTidakMemilihMIPA', 'totalSuaraMasukMIPAStat', 'totalPemilihFIP', 'totalSuaraMasukFIP', 'totalTidakMemilihFIP', 'totalSuaraMasukFIPStat', 'totalPemilihTeknik', 'totalSuaraMasukTeknik', 'totalTidakMemilihTeknik', 'totalSuaraMasukTeknikStat'), true);

    $pdf = new DOMPDF();
    $pdf->load_html($html);
    $pdf->set_paper('A4', 'landscape');
    $pdf->render();
    $pdf->stream("laporan_admin.pdf");

  }

  public function operator(){
    if($this->session->has_userdata('admin')) redirect('');
    if($this->session->has_userdata('dekan')) redirect('');
    if($this->session->has_userdata('rektor')) redirect('');
    if($this->session->has_userdata('nim')) redirect('');

    $this->load->model('Vote_model', 'vote', true);

    $fakultas = $this->session->userdata('fakultas');

    $paslonSatu = $this->vote->getPaslonSatu();
    $paslonDua = $this->vote->getPaslonDua();

    $totalSuaraMasukSatuFakultasStat = $this->vote->totalSuaraMasukSatuFakultasStat($fakultas);
    $totalSuaraMasukSatuFakultas = $this->vote->totalSuaraMasukSatuFakultas($fakultas);

    $totalSuaraMasukDuaFakultasStat = $this->vote->totalSuaraMasukDuaFakultasStat($fakultas);
    $totalSuaraMasukDuaFakultas = $this->vote->totalSuaraMasukDuaFakultas($fakultas);

    $html = $this->load->view('laporan-operator', compact('fakultas', 'paslonSatu', 'paslonDua', 'totalSuaraMasukSatuFakultasStat', 'totalSuaraMasukSatuFakultas', 'totalSuaraMasukDuaFakultasStat', 'totalSuaraMasukDuaFakultas'), true);

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
