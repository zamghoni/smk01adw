<?php

// WWW.MALASNGODING.COM === Author : Diki Alfarabi Hadi
// Model yang terstruktur. agar bisa digunakan berulang kali untuk membuat CRUD.
// Sehingga proses pembuatan CRUD menjadi lebih cepat dan efisien.

class M_Global extends CI_Model{

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function get_data($table){
		return $this->db->get($table);
	}

	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function cek_jadwal($table,$where){
		return $this->db->get_where($table,$where);
	}
	public function addPhoto($data){
		$sql = $this->db->insert('tbl_foto',$data);
		if($sql){
			return true;
		} else{
			return false;
		}
	}

	public function update_ket($id)
	{
		$params = [
			'status_pendaftaran' => $this->uri->segment(4),
		];
		$this->db->where('no_pendaftaran', $id);
		$this->db->update('tbl_siswa', $params);
	}
}
?>
