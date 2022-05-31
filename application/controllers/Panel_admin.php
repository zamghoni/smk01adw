<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_admin extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			$this->load->view('404_content');
		}else {
			$data['user']   	 = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['web_ppdb']	 = $this->db->get_where('tbl_web', "id_web='1'")->row();
			$data['judul_web'] = "Dashboard";

			$thn							 = date('Y');
			$data['v_thn']		 = $thn;
			foreach($this->Model_data->statistik($thn)->result_array() as $row)
			 {
				$data['grafik'][]=(float)$row['Januari'];
				$data['grafik'][]=(float)$row['Februari'];
				$data['grafik'][]=(float)$row['Maret'];
				$data['grafik'][]=(float)$row['April'];
				$data['grafik'][]=(float)$row['Mei'];
				$data['grafik'][]=(float)$row['Juni'];
				$data['grafik'][]=(float)$row['Juli'];
				$data['grafik'][]=(float)$row['Agustus'];
				$data['grafik'][]=(float)$row['September'];
				$data['grafik'][]=(float)$row['Oktober'];
				$data['grafik'][]=(float)$row['Nopember'];
				$data['grafik'][]=(float)$row['Desember'];
			 }

			$this->load->view('admin/header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('admin/footer');

			if (isset($_POST['btnnonaktif'])){
				$data = array(
					'status_ppdb'	=> 'tutup',
					'tgl_diubah'  => $this->Model_data->date('waktu_default')
				);
				$this->db->update('tbl_web', $data, array('id_web' => '1'));
				redirect('panel_admin');
			}
			if (isset($_POST['btnaktif'])){
				$data = array(
					'status_ppdb'	=> 'buka',
					'tgl_diubah'  => $this->Model_data->date('waktu_default')
				);
				$this->db->update('tbl_web', $data, array('id_web' => '1'));
				redirect('panel_admin');
			}

		}
	}

	public function log_in()
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(isset($ceks)) {
			$this->load->view('404_content');
		}else{
			$this->load->view('admin/login/header');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');

				if (isset($_POST['btnlogin'])){
						 $username = $_POST['username'];
						 $pass	   = $_POST['password'];

						 $query  = $this->db->get_where('tbl_user', "username='$username'");
						 $cek    = $query->result();
						 $cekun  = $cek[0]->username;
						 $jumlah = $query->num_rows();

						 if($jumlah == 0) {
								 $this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;&nbsp;</span>
											</button>
											<strong>Username "'.$username.'"</strong> belum terdaftar.
									 </div>'
								 );
								 redirect('panel_admin/log_in');
						 } else {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata('msg',
													 '<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;&nbsp;</span>
															</button>
															<strong>Gagal Login Username atau Password salah, cek kembali Username dan Password Anda !</strong>.
													 </div>'
												);
												redirect('panel_admin/log_in');
										 } else {

																$this->session->set_userdata('mts@negerikotategal', "$cekun");
																$this->session->set_userdata('id_user@negerikotategal', "$row->id_user");

												 			 	redirect('panel_admin');
										 }
						 }
				}
		}
	}


	public function profile()
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web'] 		= "Profile";

					$this->load->view('admin/header', $data);
					$this->load->view('admin/profile', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$username	 		= $this->input->post('username');
						$nama_lengkap	= $this->input->post('nama_lengkap');

									$data = array(
										'username'	   => $username,
										'nama_lengkap' => $nama_lengkap
									);
									$this->db->update('tbl_user', $data, array('username' => $ceks));

									$this->session->has_userdata('mts@negerikotategal');
									$this->session->set_userdata('mts@negerikotategal', "$username");

									$this->session->set_flashdata('msg',
										'
										<div class="alert alert-success alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
											 </button>
											 <strong>Sukses!</strong> Profile berhasil diperbarui.
										</div>'
									);

						redirect('panel_admin/profile');

					}

		}
	}

	public function ubah_pass()
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web'] 		= "Ubah Password";

					$this->load->view('admin/header', $data);
					$this->load->view('admin/ubah_pass', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate2'])) {
						$password_lama 	= $this->input->post('password_lama');
						$password 	= $this->input->post('password');
						$password2 	= $this->input->post('password2');

						if ($data['user']->row()->password != $password_lama) {
							$this->session->set_flashdata('msg2',
								'
								<div class="alert alert-warning alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Gagal!</strong> Password Lama tidak cocok.
								</div>'
							);
						}elseif ($password != $password2) {
								$this->session->set_flashdata('msg2',
									'
									<div class="alert alert-warning alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Gagal!</strong> Password Baru & Ulangi Password Baru tidak cocok.
									</div>'
								);
						}else{
									$data = array(
										'password'	=> $password
									);
									$this->db->update('tbl_user', $data, array('username' => $ceks));

									$this->session->set_flashdata('msg2',
										'
										<div class="alert alert-success alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
											 </button>
											 <strong>Sukses!</strong> Password berhasil diperbarui.
										</div>'
									);
						}
									redirect('panel_admin/ubah_pass');
					}

		}
	}

	public function peringkat($id='')
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web'] 		= "Data Nilai";

			$this->db->select('*');
			$this->db->select_sum('nilai');
	        $this->db->from('tbl_siswa');
	        $this->db->join('tbl_ujian', 'no_pend = no_pendaftaran');
	        $this->db->join('tr_ikut_ujian', 'id_user = nisn');
	        $this->db->group_by("no_pendaftaran");
	        $data['v_siswa'] =  $this->db->get();

			$thn = date('Y');
			$data['v_thn']				= $thn;

					$this->load->view('admin/header', $data);
					$this->load->view('admin/peringkat/peringkat', $data);
					$this->load->view('admin/footer');
		}
	}

	public function verifikasi($aksi='', $id='')
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web'] 		= "Verifikasi";

			if ($aksi == 'cek') {
				$cek_status = $this->db->get_where('tbl_siswa', "no_pendaftaran='$id'")->row();
				if ($cek_status->status_verifikasi == 1) {
					$sv = 0;
				}else {
					$sv = 1;
				}
				$data = array(
					'status_verifikasi'	=> $sv
				);
				$this->db->update('tbl_siswa', $data, array('no_pendaftaran' => "$id"));

				redirect('panel_admin/verifikasi');
			}elseif ($aksi == 'thn') {
				$thn = $id;
			}else {
				$thn = date('Y');
			}
			$this->db->like('tgl_siswa', "$thn", 'after');
			$this->db->order_by('id_siswa', 'DESC');
			$data['v_siswa']  		= $this->db->get('tbl_siswa');
			$data['v_thn']				= $thn;

					$this->load->view('admin/header', $data);
					$this->load->view('admin/verifikasi/verifikasi', $data);
					$this->load->view('admin/footer');
		}
	}

	public function seleksi($aksi='', $id='')
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web'] 		= "Tambah Nilai Ujian";
			$data['web']  			  = $this->db->get_where('tbl_web', "id_web='1'")->row();

			$this->db->order_by('id_ujian', 'DESC');
			$this->db->join('tbl_siswa','tbl_siswa.no_pendaftaran = tbl_ujian.no_pend');
			$this->db->where('tbl_siswa.status_verifikasi',1);
			$this->db->select('tbl_ujian.no_pend, tbl_ujian.id_ujian, tbl_ujian.nilai_pai, tbl_ujian.no_test, tbl_ujian.nama');
			$data['v_siswa']  = $this->db->get('tbl_ujian');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/ujian/ujian', $data);
					$this->load->view('admin/footer');
		}
	}

	public function wawancara_add()
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{

			$id = $this->input->post('id');
			$data = array(
					'nilai_pai'	=> $this->input->post('nilai_pai')
				);
				$this->db->update('tbl_ujian', $data, array('id_ujian' => "$id"));
				$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil menambahkan nilai wawancara.
							</div>'
						);

				redirect('panel_admin/seleksi');
		}
	}

	public function cbt($aksi='', $id='')
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web'] 		= "List Nilai CBT";
			$this->db->select('*');
			$this->db->select_sum('jml_benar');
			$this->db->select_sum('nilai');
	        $this->db->from('tr_ikut_ujian');
	        $this->db->join('m_siswa', 'id_siswa = id_user');
	        $this->db->group_by("id_user");
	        $data['v_siswa'] =  $this->db->get();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/ujian/cbt', $data);
					$this->load->view('admin/footer');
		}
	}

	public function cbt_add()
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{

			$id = $this->input->post('id');
			$data = array(
					'nilai'	=> $this->input->post('nilai')
				);
				$this->db->update('tr_ikut_ujian', $data, array('id' => "$id"));
				$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil update nilai CBT.
							</div>'
						);

				redirect('panel_admin/cbt');
		}
	}


// Tambahan Pringkat Update
	public function peringkat_update($id='')
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['tbl_nilai'] 		= $this->Model_data->getData_Global('tbl_nilai')->result();
			$data['judul_web'] 		= "Edit Data Nilai";

			$data['ujian']  		= $this->db->get_where('tbl_ujian', "no_pendaftaran='$id'")->row();
			$data['nilai']  		= $this->db->get_where('tbl_nilai', "no_pendaftaran='$id'")->row();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/peringkat/peringkatupdate', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$nama = $this->input->post('nama');

						$bakat 	= $this->input->post('nilai_bakat');
						$rapot 	= $this->input->post('nilai_rapot');
						$un 	= $this->input->post('nilai_un');
						$pai 	= $this->input->post('nilai_seleksi');
						$registrasi 	= $this->input->post('registered'); //tambahan

						$jumlah = $bakat + $rapot + $un + $pai;
						$rata = $jumlah/4;
						if($rata >= 75){
							$ket = "lulus";
						}else{
							$ket = "tidak lulus";
						}

						$data = array(
							'nama'	=> $nama,
							'nilai_seleksi'	=> $pai

						);
						$this->db->update('tbl_nilai', $data, array('no_pendaftaran' => $id));

						$data2 = array(

							'registered' => $registrasi
						);
						$this->db->update('tbl_nilai', $data2, array('no_pendaftaran' => $id));

						$data3 = array(
							'status_pendaftaran' => $ket
						);
						$this->db->update('tbl_siswa', $data3, array('no_pendaftaran' => $id));

						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Data berhasil diperbarui.
							</div>'
						);
						redirect('panel_admin/peringkat');
					}
		}
	}




// batas ================= */
	public function per_tdklulus($id='')
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web'] 		= "Ujian Seleksi";


			$data['v_siswa']  		= $this->db->query("select * from tbl_nilai WHERE keterangan='tidak lulus' ORDER BY rata_rata DESC");
			$data['siswa']  		= $this->db->get('tbl_siswa');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/peringkat/tidaklulus', $data);
					$this->load->view('admin/footer');
		}
	}
	public function ujian_update($id='')
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['tbl_ruang_ujian'] 		= $this->Model_data->getData_Global('tbl_ruang_ujian')->result();
			$data['judul_web'] 		= "Tambah Nilai Ujian";

			$data['ujian']  		= $this->db->get_where('tbl_ujian', "no_pendaftaran='$id'")->row();
			$data['nilai']  		= $this->db->get_where('tbl_nilai', "no_pendaftaran='$id'")->row();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/ujian/ujian_update', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$ruangan = $this->input->post('ruang_ujian');

						$bakat 	= $this->input->post('nilai_bakat');
						$rapot 	= $this->input->post('nilai_rapot');
						$un 	= $this->input->post('nilai_un');
						$pai 	= $this->input->post('nilai_pai');

						$jumlah = $bakat + $rapot + $un + $pai;
						$rata = $jumlah/4;
						if($rata >= 75){
							$ket = "lulus";
						}else{
							$ket = "tidak lulus";
						}

						$data = array(
							'ruang_ujian'	=> $ruangan,
							'nilai_pai'	=> $pai
						);
						$this->db->update('tbl_ujian', $data, array('no_pendaftaran' => $id));

						$data2 = array(
							'rata_rata'		=> $rata,
							'total_nilai'	=> $jumlah,
							'nilai_seleksi'	=> $pai,
							'keterangan' => $ket
						);
						$this->db->update('tbl_nilai', $data2, array('no_pendaftaran' => $id));

						$data3 = array(
							'status_pendaftaran' => $ket
						);
						$this->db->update('tbl_siswa', $data3, array('no_pendaftaran' => $id));

						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Data berhasil diperbarui.
							</div>'
						);
						redirect('panel_admin/seleksi');
					}
		}
	}

	public function edit_materi($aksi='', $id='')
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web'] 		= "Edit Materi & Jadwal Ujian";

			$data['v_materi']  		= $this->db->get_where('tbl_verifikasi', "id_verifikasi='1'")->row();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/verifikasi/verifikasi_edit_materi&jadwal', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$data = array(
							'isi'	=> $this->input->post('isi')
						);
						$this->db->update('tbl_verifikasi', $data, array('id_verifikasi' => "1"));

						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Meteri & Jadwal Ujian berhasil diperbarui.
							</div>'
						);
						redirect('panel_admin/verifikasi');
					}
		}
	}

	public function verifikasi_cetak($id='') {
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}
		$data['user'] 			= $this->db->get_where('tbl_siswa', "no_pendaftaran='$id'")->row();
		$data['judul_web'] 	= "Cetak HASIL VERIFIKASI PENDAFTARAN PSB ".ucwords($data['user']->nama_lengkap);
		//// tambahan supaya tabel bakat ke input //////////
		$data['bakat']  			= $this->db->get_where('tbl_bakat', "no_pendaftaran='$id'")->row();
		$data['foto']  			= $this->db->get_where('tbl_foto', "no_pendaftaran='$id'")->row();
		///////////////////////////////////////////

		$data['thn_ppdb'] 	= date('Y', strtotime($data['user']->tgl_siswa));

		$this->db->select_sum('rata_rata_nilai');
		$data['nilai_rapor'] 	= $this->db->get_where('tbl_rapor', "no_pendaftaran='$id'")->row()->rata_rata_nilai / 4;

		//$this->db->select_sum('nilai_usbn');
		//$data['nilai_usbn'] 	= $this->db->get_where('tbl_nilai_usbn', "no_pendaftaran='$id'")->row()->nilai_usbn / 7;

		//$this->db->select_sum('nilai_unbk');
		//$data['nilai_unbk'] 	= $this->db->get_where('tbl_nilai_unbk', "no_pendaftaran='$id'")->row()->nilai_unbk / 4;

		$data['v_materi']  		= $this->db->get_where('tbl_verifikasi', "id_verifikasi='1'")->row();

		$this->load->view('admin/verifikasi/cetak', $data);
	}

	public function daftar_ulang_cetak($id='') {
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}
		$data['user'] 			= $this->db->get_where('tbl_siswa', "no_pendaftaran='$id'")->row();
		$data['judul_web'] 	= "Daftar Ulang ".ucwords($data['user']->nama_lengkap);
		//// tambahan supaya tabel bakat ke input //////////
		$data['bakat']  			= $this->db->get_where('tbl_nilai', "no_pendaftaran='$id'")->row();
		$data['besaran']  			= $this->db->get_where('tbl_nominal', "id='1'")->row();
		///////////////////////////////////////////

		$data['thn_ppdb'] 	= date('Y', strtotime($data['user']->tgl_siswa));

		$this->load->view('admin/daftar_ulang/cetak', $data);
	}

	public function ujian_cetak($id='') {
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}
		$data['ujian'] 			= $this->db->get_where('tbl_ujian', "no_pendaftaran='$id'")->row();
		$data['user'] 			= $this->db->get_where('tbl_siswa', "no_pendaftaran='$id'")->row();
		$data['judul_web'] 	= "CETAK HASIL UJIAN SELEKSI PSB ";
		$data['thn_ppdb'] 	= date('Y', strtotime($data['user']->tgl_siswa));
		$data['bakat'] 	= $this->db->get_where('tbl_bakat', "no_pendaftaran='$id'")->row();
		$data['rapor'] 	= $this->db->get_where('tbl_rapor', "no_pendaftaran='$id'")->row();

		//$this->db->select_sum('nilai_usbn');
		//$data['nilai_usbn'] 	= $this->db->get_where('tbl_nilai_usbn', "no_pendaftaran='$id'")->row()->nilai_usbn / 7;

		//$this->db->select_sum('nilai_unbk');
		//$data['nilai_unbk'] 	= $this->db->get_where('tbl_nilai_unbk', "no_pendaftaran='$id'")->row()->nilai_unbk / 4;

		$this->load->view('admin/ujian/cetak', $data);
	}

	public function peringkat_cetak() {
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}
		$data['user'] 		= $this->db->get('tbl_siswa')->row();
		$data['judul_web'] 	= "Data Nilai Peringkat ";
		$data['thn_ppdb'] 	= date('Y', strtotime($data['user']->tgl_siswa));
		$data['v_siswa'] 	= $this->db->query("select * from tbl_nilai WHERE keterangan='lulus' ORDER BY rata_rata DESC");

		$this->load->view('admin/peringkat/cetak', $data);
	}

//tambahan cetak data nilai
	public function cetak_data_nilai() {
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}
		$data['user'] 		= $this->db->get('tbl_siswa')->row();
		$data['judul_web'] 	= "Data Nilai Peringkat ";
		$data['thn_ppdb'] 	= date('Y', strtotime($data['user']->tgl_siswa));
		$data['v_siswa'] 	= $this->db->query("select * from tbl_nilai WHERE keterangan='lulus' ORDER BY rata_rata DESC");

		$this->load->view('admin/peringkat/cetakdata_nilai', $data);
	}




//batas
	public function peringkat_cetak_tidaklulus() {
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}
		$data['user'] 		= $this->db->get('tbl_siswa')->row();
		$data['judul_web'] 	= "Cetak HASIL VERIFIKASI PENDAFTARAN PPDB ";
		$data['thn_ppdb'] 	= date('Y', strtotime($data['user']->tgl_siswa));
		$data['v_siswa'] 	= $this->db->query("select * from tbl_nilai WHERE keterangan='tidak lulus' ORDER BY rata_rata DESC");

		$this->load->view('admin/peringkat/cetak_tdklulus', $data);
	}

	public function export($aksi='', $id='')
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web'] 		= "EXPORT KE EXEL HASIL FORMULIR PENDAFTARAN SISWA";

			if ($aksi == 'thn') {
				$thn = $id;
			}else {
				$thn = date('Y');
			}
			$this->db->like('tgl_siswa', "$thn", 'after');
			$this->db->order_by('id_siswa', 'DESC');
			$data['v_siswa']  		= $this->db->get('tbl_siswa');
			$data['v_thn']				= $thn;

					$this->load->view('admin/export', $data);
		}
	}


	public function set_pengumuman($aksi='', $id='')
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web'] 		= "Setting Pengumuman";

			if ($aksi == 'lulus') {
				$data = array(
					'status_pendaftaran'	=> 'lulus'
				);
				$this->db->update('tbl_siswa', $data, array('no_pendaftaran' => "$id"));
				redirect('panel_admin/set_pengumuman');
			}elseif ($aksi == 'tdk_lulus') {
				$data = array(
					'status_pendaftaran'	=> 'tidak lulus'
				);
				$this->db->update('tbl_siswa', $data, array('no_pendaftaran' => "$id"));
				redirect('panel_admin/set_pengumuman');
			}elseif ($aksi == 'batal') {
				$data = array(
					'status_pendaftaran'	=> null
				);
				$this->db->update('tbl_siswa', $data, array('no_pendaftaran' => "$id"));
				redirect('panel_admin/set_pengumuman');
			}elseif ($aksi == 'thn') {
				$thn = $id;
			}else {
				$thn = date('Y');
			}
			$this->db->like('tgl_siswa', "$thn", 'after');
			$this->db->order_by('id_siswa', 'DESC');
			$data['v_siswa']  		= $this->db->get('tbl_siswa');
			$data['v_thn']				= $thn;

					$this->load->view('admin/header', $data);
					$this->load->view('admin/set_pengumuman/set_pengumuman', $data);
					$this->load->view('admin/footer');
		}
	}

	public function daftar_ulang($aksi='', $id='')
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web'] 		= "Pembayaran";

			if ($aksi == 'yes') {
				$data = array(
					'status'	=> '1'
				);
				$this->db->update('tbl_pembayaran', $data, array('id_pembayaran' => "$id"));
				redirect('panel_admin/daftar_ulang');
			}elseif ($aksi == 'batal') {
				$data = array(
					'status'	=> '2'
				);
				$this->db->update('tbl_pembayaran', $data, array('id_pembayaran' => "$id"));
				redirect('panel_admin/daftar_ulang');
			}

			$this->db->order_by('pendaftaran', 'DESC');
			$data['v_siswa']  		= $this->db->get('tbl_pembayaran');

					$this->load->view('admin/header', $data);
					$this->load->view('admin/daftar_ulang/index', $data);
					$this->load->view('admin/footer');
		}
	}

	public function edit_ket($aksi='', $id='')
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web'] 		= "Edit Keterangan Lulus";

			$data['v_ket']	  		= $this->db->get_where('tbl_pengumuman', "id_pengumuman='1'")->row();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/set_pengumuman/set_keterangan', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$data = array(
							'ket_pengumuman'	=> $this->input->post('ket_pengumuman')
						);
						$this->db->update('tbl_pengumuman', $data, array('id_pengumuman' => "1"));

						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Keterangan Pengumuman berhasil diperbarui.
							</div>'
						);
						redirect('panel_admin/set_pengumuman');
					}
		}
	}

	public function edit_nominal($aksi='', $id='')
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web'] 		= "Edit Nominal";

			$data['ket']	  		= $this->db->get_where('tbl_nominal', "id='1'")->row();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/daftar_ulang/set_nominal', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$data = array(
							'nominal'	=> $this->input->post('nominal'),
							'pendaftaran'	=> $this->input->post('pendaftaran')
						);
						$this->db->update('tbl_nominal', $data, array('id' => "1"));

						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Nominal berhasil diperbarui.
							</div>'
						);

						redirect('panel_admin/edit_nominal');
					}
		}
	}
	public function edit_tanggal_ujian()
	{
		$ceks = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['web']  			  = $this->db->get_where('tbl_web', "id_web='1'")->row();
			$data['judul_web'] 		= "Edit Tanggal Ujian";

			$data['ujian']	  		= $this->db->get('tbl_ujian')->row();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/ujian/set_tanggal', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$tgl =  $this->input->post('tanggal');

						$data = array(
							'tgl_ujian'	=> $tgl
						);
						$this->db->update('tbl_web', $data, array('id_web' => "1"));

						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Tanggal Ujian Seleksi berhasil diperbarui.
							</div>'
						);
						redirect('panel_admin/seleksi');
					}
		}
	}

	public function statistik($aksi='',$id='') {
		$ceks 	 = $this->session->userdata('mts@negerikotategal');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			    = $this->db->get_where('tbl_user', "username='$ceks'");
			$data['judul_web']			= "Statistik Pendaftaran Siswa";

			if ($aksi == 'thn') {
				$thn = $id;
			}else {
				$thn = date('Y');
			}
			$data['v_thn']				= $thn;

			foreach($this->Model_data->statistik($thn)->result_array() as $row)
		   {
		    $data['grafik'][]=(float)$row['Januari'];
		    $data['grafik'][]=(float)$row['Februari'];
		    $data['grafik'][]=(float)$row['Maret'];
		    $data['grafik'][]=(float)$row['April'];
		    $data['grafik'][]=(float)$row['Mei'];
		    $data['grafik'][]=(float)$row['Juni'];
		    $data['grafik'][]=(float)$row['Juli'];
		    $data['grafik'][]=(float)$row['Agustus'];
		    $data['grafik'][]=(float)$row['September'];
		    $data['grafik'][]=(float)$row['Oktober'];
		    $data['grafik'][]=(float)$row['Nopember'];
		    $data['grafik'][]=(float)$row['Desember'];
		   }

			 foreach($this->Model_data->statistik($thn, 'diverifikasi')->result_array() as $row)
 		   {
 		    $data['grafik2'][]=(float)$row['Januari'];
 		    $data['grafik2'][]=(float)$row['Februari'];
 		    $data['grafik2'][]=(float)$row['Maret'];
 		    $data['grafik2'][]=(float)$row['April'];
 		    $data['grafik2'][]=(float)$row['Mei'];
 		    $data['grafik2'][]=(float)$row['Juni'];
 		    $data['grafik2'][]=(float)$row['Juli'];
 		    $data['grafik2'][]=(float)$row['Agustus'];
 		    $data['grafik2'][]=(float)$row['September'];
 		    $data['grafik2'][]=(float)$row['Oktober'];
 		    $data['grafik2'][]=(float)$row['Nopember'];
 		    $data['grafik2'][]=(float)$row['Desember'];
 		   }

			 foreach($this->Model_data->statistik($thn, 'diterima')->result_array() as $row)
 		   {
 		    $data['grafik3'][]=(float)$row['Januari'];
 		    $data['grafik3'][]=(float)$row['Februari'];
 		    $data['grafik3'][]=(float)$row['Maret'];
 		    $data['grafik3'][]=(float)$row['April'];
 		    $data['grafik3'][]=(float)$row['Mei'];
 		    $data['grafik3'][]=(float)$row['Juni'];
 		    $data['grafik3'][]=(float)$row['Juli'];
 		    $data['grafik3'][]=(float)$row['Agustus'];
 		    $data['grafik3'][]=(float)$row['September'];
 		    $data['grafik3'][]=(float)$row['Oktober'];
 		    $data['grafik3'][]=(float)$row['Nopember'];
 		    $data['grafik3'][]=(float)$row['Desember'];
 		   }

			 foreach($this->Model_data->statistik($thn, 'tidak diterima')->result_array() as $row)
 		   {
 		    $data['grafik4'][]=(float)$row['Januari'];
 		    $data['grafik4'][]=(float)$row['Februari'];
 		    $data['grafik4'][]=(float)$row['Maret'];
 		    $data['grafik4'][]=(float)$row['April'];
 		    $data['grafik4'][]=(float)$row['Mei'];
 		    $data['grafik4'][]=(float)$row['Juni'];
 		    $data['grafik4'][]=(float)$row['Juli'];
 		    $data['grafik4'][]=(float)$row['Agustus'];
 		    $data['grafik4'][]=(float)$row['September'];
 		    $data['grafik4'][]=(float)$row['Oktober'];
 		    $data['grafik4'][]=(float)$row['Nopember'];
 		    $data['grafik4'][]=(float)$row['Desember'];
 		   }

			 																 $this->db->like('tgl_siswa', "$thn", 'after');
			 $data['total_pendaftar'] 		 = $this->db->get("tbl_siswa")->num_rows();

			 																 $this->db->like('tgl_siswa', "$thn", 'after');
			 $data['total_diverifikasi'] 	 = $this->db->get_where("tbl_siswa", "status_verifikasi='1'")->num_rows();

			 																 $this->db->like('tgl_siswa', "$thn", 'after');
			 $data['total_diterima'] 			 = $this->db->get_where("tbl_siswa", "status_pendaftaran='lulus'")->num_rows();

			 																 $this->db->like('tgl_siswa', "$thn", 'after');
			 $data['total_tidak_diterima'] = $this->db->get_where("tbl_siswa", "status_pendaftaran='tidak lulus'")->num_rows();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/statistik/index', $data);
					$this->load->view('admin/footer');
		}
	}


	public function logout() {
     if ($this->session->has_userdata('mts@negerikotategal') != '' AND $this->session->has_userdata('id_user@negerikotategal') != '') {
         $this->session->sess_destroy();
     }
		 redirect('panel_admin/log_in');
  }

}
