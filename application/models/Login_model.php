<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Login_model extends CI_Model{

    // Pengecekan npm & tgl lahir
    public function checkPemilih($npm, $tgllahir){
      return $this->db->where('npm_pemilih', $npm)->where('tgl_lahir', $tgllahir)->get('pemilih')->row();
    }

    // Pengecekan username & password admin
    public function checkAdmin($username, $password){
      return $this->db->where('user_admin', $username)->where('password_admin', $password)->get('admin')->row();
    }

    // Nilai bawaan form login
    public function loginDefaultValues(){
      return [
        'npm' => '',
        'tgl_lahir' => '',
        'username' => '',
        'password' => ''
      ];
    }

    // Set Login terakhir pemilih
    public function loginTerakhirPemilih($npm){
      $sql = "update pemilih set terakhir_login = NOW() where npm_pemilih = '$npm'";
      return $this->db->query($sql);
    }

    // Set login terakhir admin
    public function loginTerakhirAdmin($id){
      $sql = "update admin set login_terakhir = NOW() where id_admin = '$id'";
      return $this->db->query($sql);
    }

  }
