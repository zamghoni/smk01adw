<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('M_admin'));
  }

  function index()
  {
    $ceks = $this->session->userdata('mts@negerikotategal');
    if(!isset($ceks)) {
      redirect('panel_admin/log_in');
    }else{
      $data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
      $data['judul_web'] 		= "Data Admin";

      $this->db->select('*');
      $this->db->from('tbl_user');
      $data['v_user'] =  $this->db->get();

      $this->load->view('admin/header', $data);
      $this->load->view('admin/admin/data', $data);
      $this->load->view('admin/footer');
    }
  }

  public function add()
  {
    $ceks = $this->session->userdata('mts@negerikotategal');
    if(!isset($ceks)) {
      redirect('panel_admin/log_in');
    }else{
      $user = new stdClass();
      $user->id_user = null;
      $user->username = null;
      $user->password = null;
      $user->nama_lengkap = null;
      $user->level = null;

      $data = array(
        'judul_web' => 'Tambah Admin',
        'subpage' =>'Tambah',
        'row' => $user,
        'user' => $this->db->get_where('tbl_user', "username='$ceks'"),
      );
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('admin/header', $data);
        $this->load->view('admin/admin/form', $data);
        $this->load->view('admin/footer');
      }
    }
  }

  public function edit($id)
  {
    $ceks = $this->session->userdata('mts@negerikotategal');
    if(!isset($ceks)) {
      redirect('panel_admin/log_in');
    }else{
      $query=$this->M_admin->get($id);
      if ($query->num_rows() > 0){
        $user = $query->row();
        $data = array(
        'judul_web' => 'Edit Admin',
        'subpage' =>'Edit',
        'row' => $user,
        'user' => $this->db->get_where('tbl_user', "username='$ceks'"),
        );
        if ($this->form_validation->run() == FALSE) {
          $this->load->view('admin/header', $data);
          $this->load->view('admin/admin/form', $data);
          $this->load->view('admin/footer');
        }else{
          $this->session->set_flashdata('msg',
          '
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
            </button>
            <strong>Perhatian!</strong> Data tidak ditemukan.
          </div>'
          );
          redirect('admin','refresh');
        }
      }
    }
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['Tambah'])) {
      if($this->M_admin->cek_username($post['username'])->num_rows() > 0){
        $this->session->set_flashdata('msg',
        '
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
          </button>
          <strong>Perhatian!</strong> Username <b>'.$post['username'].'</b> sudah dipakai user lain, silahkan ganti dengan yang berbeda
        </div>'
        );
        redirect('admin/add');
      } else {
        $this->M_admin->add($post);
      }
    }else if (isset($_POST['Edit'])) {
      $this->M_admin->edit($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('msg',
      '
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
        </button>
        <strong>Berhasil!</strong> Data Berhasil disimpan.
      </div>'
      );
    }
    redirect('admin');
  }

  public function del($id)
  {
    $this->M_admin->del($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('msg',
      '
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
        </button>
        <strong>Berhasil!</strong> Data Berhasil dihapus.
      </div>'
      );
    }
    redirect('admin');
  }

}
