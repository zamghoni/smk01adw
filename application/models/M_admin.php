<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get($id = null)
  {
    $this->db->from('tbl_user');
    if ($id != null) {
      $this->db->where('id_user',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  function cek_username($code, $id = null)
  {
    $this->db->from('tbl_user');
    $this->db->where('username', $code);
    if($id != null){
      $this->db->where('id_user !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'username' => $post['username'],
      'password' => $post['password'],
      // 'password' => password_hash($post['password'], PASSWORD_BCRYPT),
      'nama_lengkap' => $post['nama_lengkap'],
      'level' => 'admin',
      'tgl_daftar' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('tbl_user', $params);
  }

  public function edit($post)
  {
    $params = [
      'username' => $post['username'],
      'password' => $post['password'],
      // 'password' => password_hash($post['password'], PASSWORD_BCRYPT),
      'nama_lengkap' => $post['nama_lengkap'],
      'level' => 'admin',
      'tgl_daftar' => date('Y-m-d H:i:s')
      ];
      $this->db->where('id_user', $post['id_user']);
      $this->db->update('tbl_user', $params);
    }
    
    public function del($id)
    {
      $this->db->where('id_user', $id);
      $this->db->delete('tbl_user');
    }

  }
