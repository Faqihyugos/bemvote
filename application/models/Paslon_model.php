<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Paslon_model extends CI_Model{

    // Mendapatkan data suatu paslon
    public function getPaslon($id){
      return $this->db->select('*')->from('paslon')->join('detailcapres','paslon.id_paslon = detailcapres.id_paslon')->join('detailcawapres', 'paslon.id_paslon = detailcawapres.id_paslon')->where('paslon.id_paslon', $id)->get()->row();
    }

    // Mendapatkan semua data paslon
    public function allPaslon(){
      return $this->db->get('paslon')->result();
    }

    public function allCapres(){
      return $this->db->get('detailcapres')->result();
    }

    public function allCawapres(){
      return $this->db->get('detailcawapres')->result();
    }

    // Mendapatkan data suatu paslon berdasarkan nama paslon
    public function getPaslonByName($name){
      return $this->db->where('nama_paslon', $name)->get('paslon')->row();
    }

    // Nilai bawaan form paslon
    public function paslonDefaultValues(){
      return [
        'nama_paslon' => '',
        'nama_koalisi' => '',
        'jurusan_koalisi' => '',
        'nomor_urut' => '',
        'visimisi' => '',
        'nama_capres' => '',
        'nama_cawapres' => '',
        'jurusan_capres' => '',
        'jurusan_cawapres' => '',
        'angkatan_capres' => '',
        'angkatan_cawapres' => '',
      ];
    }

    // Edit Paslon
    public function updatePaslon($id, $data){
      return $this->db->where('id_paslon', $id)->update('paslon', $data);
    }

    // Edit Capres
    public function updateCapres($id, $data){
      return $this->db->where('id_paslon', $id)->update('detailcapres', $data);
    }

    // Edit Cawapres
    public function updateCawapres($id, $data){
      return $this->db->where('id_paslon', $id)->update('detailcawapres', $data);
    }

    // Hapus Paslon
    public function deletePaslon($id){
      return $this->db->where('id_paslon', $id)->delete('paslon');
    }

    // Validasi Form Paslon
    public function validationPaslon(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'nama_paslon',
          'label' => 'Nama Paslon',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'nama_koalisi',
          'label' => 'Nama Koalisi',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'nomor_urut',
          'label' => 'Nomor Urut',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'visimisi',
          'label' => 'Visi & Misi',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'nama_capres',
          'label' => 'Nama Capres',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'nama_cawapres',
          'label' => 'Nama Cawapres',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'jurusan_capres',
          'label' => 'Jurusan Capres',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'jurusan_cawapres',
          'label' => 'Jurusan Cawapres',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'angkatan_capres',
          'label' => 'Angkatan Capres',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'angkatan_cawapres',
          'label' => 'Angkatan Cawapres',
          'rules' => 'trim|required'
        ],
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    // Tambah Paslon
    public function insertPaslon($data){
      return $this->db->insert('paslon', $data);
    }

    // Tambah Capres
    public function insertCapres($data){
      return $this->db->insert('detailcapres', $data);
    }

    // Tambah Cawapres
    public function insertCawapres($data){
      return $this->db->insert('detailcawapres', $data);
    }

  }
