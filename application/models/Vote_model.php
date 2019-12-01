<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Vote_model extends CI_Model{

    // Mendapatkan data suatu paslon
    public function allPaslon(){
      return $this->db->select('*')->from('paslon')->join('detailcapres','paslon.id_paslon = detailcapres.id_paslon')->join('detailcawapres', 'paslon.id_paslon = detailcawapres.id_paslon')->get()->result();
    }

    // Data Semua Suara Masuk
    public function suaraMasuk(){
      return $this->db->select('*')->from('pemilihan')->join('pemilih','pemilihan.id_pemilih = pemilih.id_pemilih')->join('jurusan', 'pemilih.id_jurusan = jurusan.id_jurusan')->get()->result();
    }

    // Hapus Suara Masuk
    public function deleteSuaraMasuk($id){
      return $this->db->where('id_pemilihan', $id)->delete('pemilihan');
    }

    // Set Kembali Pemilih
    public function setKembaliPemilih($id){
      $sql = "update pemilih set telah_memilih = 'tidak' where id_pemilih = '$id'";
      return $this->db->query($sql);
    }

    // Data Paslon Satu
    public function getPaslonSatu(){
      return $this->db->select('*')->from('paslon')->where('id_paslon', '3')->get()->row();
    }

    // Data Paslon Dua
    public function getPaslonDua(){
      return $this->db->select('*')->from('paslon')->where('id_paslon', '4')->get()->row();
    }

    // Data Suatu Pemilih
    public function pemilih($id){
      return $this->db->where('id_pemilih', $id)->get('pemilih')->row();
    }

    // Fitur Coblos Paslon
    public function coblosPaslon($data){
      return $this->db->insert('pemilihan', $data);
    }

    // Fitur Set Telah Memilih
    public function setTelahMemilih($id){
      $sql = "update pemilih set telah_memilih = 'ya' where id_pemilih = '$id'";
      return $this->db->query($sql);
    }

    // Query Aggregat

    // Paslon Satu
    // Statistik Total Suara Masuk Paslon Satu
    public function totalSuaraMasukSatuStat(){
      $totalSuaraMasuk = $this->totalSuaraMasukSatu();
      $totalPemilih = $this->totalSuaraMasuk();
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Suara Masuk Paslon Satu
    public function totalSuaraMasukSatu(){
      return $this->db->select('*')->from('pemilihan')->join('pemilih', 'pemilihan.id_pemilih = pemilih.id_pemilih')->where('pemilihan.id_paslon', '3')->get()->num_rows();
    }

    // Paslon Dua
    // Statistik Total Suara Masuk Paslon Dua
    public function totalSuaraMasukDuaStat(){
      $totalSuaraMasuk = $this->totalSuaraMasukDua();
      $totalPemilih = $this->totalSuaraMasuk();
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Suara Masuk Paslon Dua
    public function totalSuaraMasukDua(){
      return $this->db->select('*')->from('pemilihan')->join('pemilih', 'pemilihan.id_pemilih = pemilih.id_pemilih')->where('pemilihan.id_paslon', '4')->get()->num_rows();
    }

    // Statistik Total Suara Masuk Semua jurusan
    public function totalSuaraMasukStat(){
      $totalSuaraMasuk = $this->totalSuaraMasuk();
      $totalPemilih = $this->totalPemilih();
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Pemilih
    public function totalPemilih(){
      return $this->db->select('*')->from('pemilih')->get()->num_rows();
    }

    // Total Suara Masuk
    public function totalSuaraMasuk(){
      return $this->db->select('*')->from('pemilihan')->get()->num_rows();
    }

    // Total Pemilih Belum Memilih
    public function totalTidakMemilih(){
      return $this->db->select('*')->from('pemilih')->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }

    // Berbasis Satu jurusan

    public function totalSuaraMasukJurusanStat($jurusan){
      $totalSuaraMasuk = $this->totalSuaraMasukJurusan($jurusan);
      $totalPemilih = $this->totalPemilihJurusan($jurusan);
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    public function totalPemilihJurusan($jurusan){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('jurusan.nama_jurusan', $jurusan)->get()->num_rows();
    }

    public function totalSuaraMasukJurusan($jurusan){
      return $this->db->select('*')->from('pemilih')->join('pemilihan','pemilih.id_pemilih = pemilihan.id_pemilih')->join('jurusan', 'pemilih.id_jurusan = jurusan.id_jurusan')->join('paslon', 'pemilihan.id_paslon = paslon.id_paslon')->where('jurusan.nama_jurusan', $jurusan)->get()->num_rows();
    }

    public function totalTidakMemilihJurusan($jurusan){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('jurusan.nama_jurusan', $jurusan)->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }

    // Paslon Satu
    // Statistik Total Suara Masuk Paslon Satu
    public function totalSuaraMasukSatuJurusanStat($jurusan){
      $totalSuaraMasuk = $this->totalSuaraMasukSatuJurusan($jurusan);
      $totalPemilih = $this->totalSuaraMasukJurusan($jurusan);
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Suara Masuk Paslon Satu
    public function totalSuaraMasukSatuJurusan($jurusan){
      return $this->db->select('*')->from('pemilihan')->join('pemilih', 'pemilihan.id_pemilih = pemilih.id_pemilih')->join('jurusan', 'pemilih.id_jurusan = jurusan.id_jurusan')->where('pemilihan.id_paslon', '3')->where('nama_jurusan', $jurusan)->get()->num_rows();
    }

    // Paslon Dua
    // Statistik Total Suara Masuk Paslon Dua jurusan
    public function totalSuaraMasukDuaJurusanStat($jurusan){
      $totalSuaraMasuk = $this->totalSuaraMasukDuaJurusan($jurusan);
      $totalPemilih = $this->totalSuaraMasukJurusan($jurusan);
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Suara Masuk Paslon Dua jurusan
    public function totalSuaraMasukDuaJurusan($jurusan){
      return $this->db->select('*')->from('pemilihan')->join('pemilih', 'pemilihan.id_pemilih = pemilih.id_pemilih')->join('jurusan', 'pemilih.id_jurusan = jurusan.id_jurusan')->where('pemilihan.id_paslon', '4')->where('nama_jurusan', $jurusan)->get()->num_rows();
    }

    // Semua jurusan

    // Sistem informasi
    // Total Statistik Suara Masuk Jurusan sistem informasi
    public function totalSuaraMasukSIStat(){
      $totalSuaraMasuk = $this->totalSuaraMasukSI();
      $totalPemilih = $this->totalPemilihSI();
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Pemilih jurusan SI
    public function totalPemilihSI(){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('jurusan.nama_jurusan', 'Sistem Informasi')->get()->num_rows();
    }

    // Total Suara Masuk jurusan SI
    public function totalSuaraMasukSI(){
      return $this->db->select('*')->from('pemilih')->join('pemilihan','pemilih.id_pemilih = pemilihan.id_pemilih')->join('jurusan', 'pemilih.id_jurusan = jurusan.id_jurusan')->join('paslon', 'pemilihan.id_paslon = paslon.id_paslon')->where('jurusan.nama_jurusan', 'Sistem Informasi')->get()->num_rows();
    }

    // Total Tidak Memilih jurusan SI
    public function totalTidakMemilihSI(){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('jurusan.nama_jurusan', 'Sistem Informasi')->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }

    //Sistem Komputer
    // Total Statistik Suara Masuk jurusan Sistem Komputer
    public function totalSuaraMasukSKStat(){
      $totalSuaraMasuk = $this->totalSuaraMasukSK();
      $totalPemilih = $this->totalPemilihSK();
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Pemilih jurusan Sistem Komputer
    public function totalPemilihSK(){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('jurusan.nama_jurusan', 'Sistem Komputer')->get()->num_rows();
    }

    // Total Suara Masuk jurusan Sistem Komputer
    public function totalSuaraMasukSK(){
      return $this->db->select('*')->from('pemilih')->join('pemilihan','pemilih.id_pemilih = pemilihan.id_pemilih')->join('jurusan', 'pemilih.id_jurusan = jurusan.id_jurusan')->join('paslon', 'pemilihan.id_paslon = paslon.id_paslon')->where('jurusan.nama_jurusan', 'Sistem Komputer')->get()->num_rows();
    }

    // Total Tidak Memilih jurusan Sistem Komputer
    public function totalTidakMemilihSK(){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('jurusan.nama_jurusan', 'Sistem Komputer')->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }

    //MI
    // Total Statistik Suara Masuk jurusan MI
    public function totalSuaraMasukMIStat(){
      $totalSuaraMasuk = $this->totalSuaraMasukMI();
      $totalPemilih = $this->totalPemilihMI();
      return round($totalSuaraMasuk / $totalPemilih * 100);
    }

    // Total Pemilih jurusan MI
    public function totalPemilihMI(){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('jurusan.nama_jurusan', 'Manajemen Informasi')->get()->num_rows();
    }

    // Total Suara Masuk jurusan MI
    public function totalSuaraMasukMI(){
      return $this->db->select('*')->from('pemilih')->join('pemilihan','pemilih.id_pemilih = pemilihan.id_pemilih')->join('jurusan', 'pemilih.id_jurusan = jurusan.id_jurusan')->join('paslon', 'pemilihan.id_paslon = paslon.id_paslon')->where('jurusan.nama_jurusan', 'Manajemen Informasi')->get()->num_rows();
    }

    // Total Tidak Memilih jurusan MI
    public function totalTidakMemilihMI(){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('jurusan.nama_jurusan', 'Manajemen Informasi')->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }


  }
