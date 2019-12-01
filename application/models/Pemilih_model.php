<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Pemilih_model extends CI_Model{

    // Semua data pemilih
    public function allPemilih($jurusan, $perPage = 10, $offset = 0){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('nama_jurusan', $jurusan)->limit($perPage, $offset)->order_by('npm_pemilih', 'ASC')->get()->result();
    }

    // Total pemilih
    public function jumlahPemilih($jurusan){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('nama_jurusan', $jurusan)->order_by('npm_pemilih', 'ASC')->get()->num_rows();
    }

    public function jumlahBelumPemilih($jurusan){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('pemilih.telah_memilih', 'tidak')->where('nama_jurusan', $jurusan)->get()->num_rows();
    }

    // Semua data pemilih yang belum memilih
    public function allPemilihBelumMemilih($jurusan, $perPage = 10, $offset = 0){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('pemilih.telah_memilih', 'tidak')->where('nama_jurusan', $jurusan)->limit($perPage, $offset)->get()->result();
    }

    // Semua data pemilih yg bisa diakses admin, dekan, rektor
    public function allPemilihAdmin($perPage = 10, $offset = 0){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->limit($perPage, $offset)->order_by('npm_pemilih', 'ASC')->get()->result();
    }

    public function totalPemilihAdmin(){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->order_by('npm_pemilih', 'ASC')->get()->num_rows();
    }

    // Semua data pemilih yang belum memilih
    public function allPemilihBelumMemilihAdmin($perPage = 10, $offset = 0){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('pemilih.telah_memilih', 'tidak')->limit($perPage, $offset)->get()->result();
    }

    public function totalPemilihBelumMemilihAdmin(){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('pemilih.telah_memilih', 'tidak')->get()->num_rows();
    }

    // Data Semua jurusan
    public function allJurusan(){
      return $this->db->get('jurusan')->result();
    }

    // Nilai bawaan form pemilih
    public function pemilihDefaultValues(){
      return [
        'nama_pemilih' => '',
        'npm_pemilih' => '',
        'tgl_lahir' => ''
      ];
    }

    // Mendapatkan Data suatu pemilih
    public function getPemilih($id){
      return $this->db->where('id_pemilih', $id)->get('pemilih')->row();
    }

    // Hapus Pemilih
    public function deletePemilih($id){
      return $this->db->where('id_pemilih', $id)->delete('pemilih');
    }

    // Validasi form pemilih
    public function validationPemilih(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'nama_pemilih',
          'label' => 'Nama Pemilih',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'npm_pemilih',
          'label' => 'NPM Pemilih',
          'rules' => 'trim|required'
        ],        [
          'field' => 'tgl_lahir',
          'label' => 'tgl_lahir',
          'rules' => 'trim|required'
        ],
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    // Tambah Pemilih
    public function insertPemilih($data){
      return $this->db->insert('pemilih', $data);
    }

    // Data Semua pemilih Berdasarkan jurusan
    public function pemilihJurusan($id){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('pemilih.id_jurusan', $id)->get()->result();
    }

    // // Menggenerate Token Pemilih\
    // public function generateToken($id, $data){
    //   $sql = "update pemilih set token_pemilih = '$data' where id_pemilih = $id";
    //   return $this->db->query($sql);
    // }

    // mencari pemilih berdasarkan npm, nama, dan jurusan
    public function searchPemilih($npm, $nama, $jurusan){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('nama_jurusan', $jurusan)->like('npm_pemilih', $npm)->like('nama_pemilih', $nama)->order_by('npm_pemilih', 'ASC')->get()->result();
    }

    public function jumlahSearchPemilih($npm, $nama, $jurusan){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->where('nama_jurusan', $jurusan)->like('npm_pemilih', $npm)->like('nama_pemilih', $nama)->order_by('npm_pemilih', 'ASC')->get()->num_rows();
    }

    // mencari pemilih berdasarkan npm dan nama
    public function searchPemilihByAdmin($npm, $nama){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->like('npm_pemilih', $npm)->like('nama_pemilih', $nama)->order_by('npm_pemilih', 'ASC')->get()->result();
    }

    public function jumlahsearchPemilihByAdmin($npm, $nama){
      return $this->db->select('*')->from('pemilih')->join('jurusan','pemilih.id_jurusan = jurusan.id_jurusan')->like('npm_pemilih', $npm)->like('nama_pemilih', $nama)->order_by('npm_pemilih', 'ASC')->get()->num_rows();
    }

  }
