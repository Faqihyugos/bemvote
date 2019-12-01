<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Admin_model extends CI_Model{

    // Mendapatkan semua data Admin
    public function allAdmin(){
      return $this->db->get('admin')->result();
    }

    public function totalAdmin(){
      return $this->db->get('admin')->num_rows();
    }

    // Nilai bawaan form admin
    public function adminDefaultValues(){
      return [
        'nama_admin' => '',
        'username_admin' => '',
        'password_admin' => ''
      ];
    }

    // Hapus Admin
    public function deleteAdmin($id){
      return $this->db->where('id_admin', $id)->delete('admin');
    }

    // Validasi Form untuk Admin
    public function validationAdmin(){
      $this->load->library('form_validation');
      $rules = [
        [
          'field' => 'nama_admin',
          'label' => 'Nama Admin',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'username_admin',
          'label' => 'Username Admin',
          'rules' => 'trim|required'
        ],
        [
          'field' => 'password_admin',
          'label' => 'Password Admin',
          'rules' => 'trim|required'
        ]
      ];
      $this->form_validation->set_rules($rules);
      $this->form_validation->set_error_delimiters('<div class="text-center mb-3" style="color:red; border:1px solid red; padding:5px">', '</div>');
      return $this->form_validation->run();
    }

    // Tambah Admin
    public function insertAdmin($data){
      return $this->db->insert('admin', $data);
    }

  }
