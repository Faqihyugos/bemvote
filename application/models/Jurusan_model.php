<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class jurusan_model extends CI_Model{

    // Mendapatkan semua data Jurusan
    public function allJurusan(){
      return $this->db->get('jurusan')->result();
    }

    public function totalJurusan(){
      return $this->db->get('jurusan')->num_rows();
    }

    // Nilai bawaan form Jurusan
    public function jurusanDefaultValues(){
      return [
        'nama_jurusan' => ''
      ];
    }

    // Mendapatkan suatu Jurusan
    public function getJurusan($id){
      return $this->db->where('id_jurusan', $id)->get('jurusan')->row();
    }

    // Edit Jurusan
    public function updateJurusan($id, $data){
      return $this->db->where('id_jurusan', $id)->update('jurusan', $data);
    }

    // Hapus Jurusan
    public function deleteJurusan($id){
      return $this->db->where('id_jurusan', $id)->delete('jurusan');
    }

    // Validasi form jurusan
    public function validationjurusan(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'nama_jurusan',
          'label' => 'Nama Jurusan',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    // Menambahkan Jurusan
    public function insertJurusan($data){
      return $this->db->insert('Jurusan', $data);
    }

  }
