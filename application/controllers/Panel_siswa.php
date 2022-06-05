<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_siswa extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('no_pendaftaran');

		if(!isset($ceks)) {
			redirect('');
		}else{
			$data['user']   	 = $this->db->get_where('tbl_siswa', "no_pendaftaran='$ceks'");
			$data['foto']  			= $this->db->get_where('tbl_foto', "no_pendaftaran='$ceks'");
			$data['judul_web'] = "Dashboard";

			$this->load->view('siswa/header', $data);
			$this->load->view('siswa/dashboard', $data);
			$this->load->view('siswa/footer');
		}
	}

	public function pengumuman()
	{
		$ceks = $this->session->userdata('no_pendaftaran');
		if(!isset($ceks)) {
			redirect('');
		}else{
			$data['user']   	 = $this->db->get_where('tbl_siswa', "no_pendaftaran='$ceks'");
			$data['judul_web'] = "Pengumuman";
			$data['foto']  			= $this->db->get_where('tbl_foto', "no_pendaftaran='$ceks'");

			$data['ujian']	  		= $this->db->get('tbl_ujian')->row();

			$this->load->view('siswa/header', $data);
			$this->load->view('siswa/pengumuman', $data);
			$this->load->view('siswa/footer');
		}
	}

	public function pembayaran()
	{
		$ceks = $this->session->userdata('no_pendaftaran');
		if(!isset($ceks)) {
			redirect('');
		}else{
			$data['user']   	 = $this->db->get_where('tbl_siswa', "no_pendaftaran='$ceks'");
			$data['judul_web'] = "Pembayaran";
			$data['bakat']  			= $this->db->get_where('tbl_bakat', "no_pendaftaran='$ceks'");
			$data['ujian']  			= $this->db->get_where('tbl_ujian', "no_pend='$ceks'");
			$data['foto']  			= $this->db->get_where('tbl_foto', "no_pendaftaran='$ceks'");

			$this->db->select('*');
	        $this->db->from('tbl_pembayaran');
	        $this->db->where('pendaftaran', $ceks);
	        $this->db->join('tbl_siswa', 'no_pendaftaran = pendaftaran');
	        $data['bayar'] =  $this->db->get();

	        $this->db->select_sum('jumlah');
	        $data['ttl'] = $this->db->query("SELECT sum(jumlah) as jumlah FROM tbl_pembayaran where pendaftaran = '$ceks' AND status = 1");

	        $this->db->select_sum('nominal');
	        $data['asa'] = $this->db->query("SELECT sum(nominal) as nominal FROM tbl_nominal");

			$this->load->view('siswa/header', $data);
			$this->load->view('siswa/pembayaran', $data);
			$this->load->view('siswa/footer');
		}
	}

	public function pembayaran_act()
	{
		$ceks = $this->session->userdata('no_pendaftaran');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{

			$config['upload_path']          = './files/bukti_pembayaran';
			$config['allowed_types']        = 'jpg|png';
			$config['encrypt_name']			= TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('bukti'))
			{
					$error = array('error' => $this->upload->display_errors());
					redirect('panel_siswa/pembayaran',$error);
			}
			else
			{
				$data['bukti'] = $this->upload->data("file_name");
				$data['pendaftaran'] = $ceks;
				$data['status'] = 2;
				$data['jenis_pembayaran'] = $this->input->post('jenis_pembayaran');
				$data['jumlah'] = $this->input->post('jumlah');
				$this->db->insert('tbl_pembayaran',$data);
				$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> upload bukti pembayaran, Silahkan tunggu konfirmasi.
							</div>'
						);
				redirect('panel_siswa/pembayaran');
			}
		}
	}

	public function biodata()
	{
		$ceks = $this->session->userdata('no_pendaftaran');
		if(!isset($ceks)) {
			redirect('logcs');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_siswa', "no_pendaftaran='$ceks'");
			$data['bakat']  			= $this->db->get_where('tbl_bakat', "no_pendaftaran='$ceks'");
			$data['ujian']  			= $this->db->get_where('tbl_ujian', "no_pend='$ceks'");
			$data['foto']  			= $this->db->get_where('tbl_foto', "no_pendaftaran='$ceks'");
			$data['web']  			= $this->db->get_where('tbl_web', "id_web='1'");
 			$data['judul_web'] 		= "Biodata ".ucwords($data['user']->row()->nama_lengkap);

					$this->load->view('siswa/header', $data);
					$this->load->view('siswa/biodata', $data);
					$this->load->view('siswa/footer');
		}
	}

	public function update_photo(){
		$id = $this->input->post('id');
		$no_pendaftaran = $this->input->post('no_pendaftaran');
		$foto = $_FILES['foto']['name'];

			$config['upload_path']		=	'./img/siswa';
			$config['allowed_types']	=	'jpg|png|jpeg';
			$this->load->library('upload',$config);

		if($this->upload->do_upload('foto')){
			$foto = $this->upload->data('file_name');
			$data = array(
				'nama_foto' => $foto
			);
			$where = array(
				'no_pendaftaran' => $no_pendaftaran
			);

		$this->M_Global->update_data($where,$data,'tbl_foto');
		redirect('panel_siswa/biodata');
	}else{
		echo "Upload gagal Harap Cek Gambar"; die();
	}
}

	public function cetak() {
		$ceks = $this->session->userdata('no_pendaftaran');
		if(!isset($ceks)) {
			redirect('logcs');
		}
		$data['user'] 			= $this->db->get_where('tbl_siswa', "no_pendaftaran='$ceks'")->row();
		$data['ujian'] 			= $this->db->get_where('tbl_ujian', "no_pend='$ceks'")->row();
				//// tambahan supaya tabel bakat ke input //////////
		$data['bakat']  			= $this->db->get_where('tbl_bakat', "no_pendaftaran='$ceks'")->row();
		///////////////////////////////////////////


		$data['foto'] 			= $this->db->get_where('tbl_foto', "no_pendaftaran='$ceks'")->row();
		$data['judul_web'] 	= "Cetak Bukti Pendaftaran ".ucwords($data['user']->nama_lengkap);
		$data['web']  			= $this->db->get_where('tbl_web', "id_web='1'")->row();
		$data['thn_ppdb'] 	= date('Y', strtotime($data['user']->tgl_siswa));

		$this->db->select_sum('rata_rata_nilai');
		$data['nilai_rapor'] 	= $this->db->get_where('tbl_rapor', "no_pendaftaran='$ceks'")->row()->rata_rata_nilai / 4;


		$this->load->view('siswa/cetak', $data);
	}


	public function rekap_nilai() {
		$ceks = $this->session->userdata('no_pendaftaran');
		if(!isset($ceks)) {
			redirect('logcs');
		}
		$data['user'] 			= $this->db->get_where('tbl_siswa', "no_pendaftaran='$ceks'")->row();
		$data['foto']  			= $this->db->get_where('tbl_foto', "no_pendaftaran='$ceks'");
		$data['judul_web'] 	= "Cetak Rekap Nilai ".ucwords($data['user']->nama_lengkap);

		$data['thn_ppdb'] 	= date('Y', strtotime($data['user']->tgl_siswa));

		$this->db->select_sum('rata_rata_nilai');
		$data['nilai_rapor'] 	= $this->db->get_where('tbl_rapor', "no_pendaftaran='$ceks'")->row()->rata_rata_nilai;


		$this->load->view('siswa/rekap_nilai', $data);
	}

	public function cetak_lulus() {
		$ceks = $this->session->userdata('no_pendaftaran');
		if(!isset($ceks)) {
			redirect('logcs');
		}
		$this->db->like('tgl_siswa', date('Y'), 'after');
		$data['user'] 			= $this->db->get_where('tbl_siswa', "no_pendaftaran='$ceks'")->row();
		$data['judul_web'] 	= "Cetak Bukti Lulus ".ucwords($data['user']->nama_lengkap);

		if ($data['user']->status_pendaftaran != 'Lulus') {
			redirect('404');
		}

		$data['thn_ppdb'] 	= date('Y', strtotime($data['user']->tgl_siswa));
		$data['v_ket'] 			= $this->db->get_where('tbl_pengumuman', "id_pengumuman='1'")->row();

		$this->load->view('siswa/cetak_lulus', $data);
	}
	public function cetak_nilai() {
		$ceks = $this->session->userdata('no_pendaftaran');
		$nisn = $this->session->userdata('nisn');
		if(!isset($ceks)) {
			redirect('logcs');
		}
		$this->db->like('tgl_siswa', date('Y'), 'after');
		$data['user'] 			= $this->db->get_where('tbl_siswa', "no_pendaftaran='$ceks'")->row();
		$data['judul_web'] 	= "Cetak Bukti Lulus ".ucwords($data['user']->nama_lengkap);

		if ($data['user']->status_pendaftaran != 'Lulus') {
			redirect('404');
		}

		$data['thn_ppdb'] 	= date('Y', strtotime($data['user']->tgl_siswa));
		$data['bakat'] 	= $this->db->get_where('tbl_bakat', "no_pendaftaran='$ceks'")->row();
		$data['un'] 	= $this->db->get_where('tbl_siswa', "no_pendaftaran='$ceks'")->row();
		$data['rapor'] 	= $this->db->get_where('tbl_rapor', "no_pendaftaran='$ceks'")->row();
		$data['pai'] 	= $this->db->get_where('tbl_ujian', "no_pend='$ceks'")->row();
		$data['nilai'] 	= $this->db->get_where('tbl_nilai', "no_pendaftaran='$ceks'")->row();
		$data['cbt'] 	= $this->db->get_where('tr_ikut_ujian', "id_user= '$nisn'")->row();

		$this->load->view('siswa/rekap_akhir', $data);
	}

	public function logout() {
		if ($this->session->userdata('no_pendaftaran') != '') {
			$this->session->sess_destroy();
		}
		 redirect('');
	}

}
