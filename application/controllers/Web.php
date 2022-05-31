<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{

	public function index()
	{
		$data['web_ppdb']	 = $this->db->query("SELECT * FROM tbl_web WHERE id_web = '1'")->row();
		$this->load->view('web/index', $data);
	}

	public function pendaftaran()
	{
		$data['web_ppdb']	 = $this->db->get_where('tbl_web', "id_web='1'")->row();
		if ($data['web_ppdb']->status_ppdb == 'tutup') {
			redirect('404');
		}

		$this->db->order_by('id_pdd', 'ASC');
		$data['v_pdd'] = $this->db->get('tbl_pdd')->result();

		$this->db->order_by('id_penghasilan', 'ASC');
		$data['v_penghasilan'] = $this->db->get('tbl_penghasilan')->result();

		$this->db->where('ket_pekerjaan', 'ayah');
		$this->db->order_by('id_pekerjaan', 'ASC');
		$data['v_pekerjaan_ayah'] = $this->db->get('tbl_pekerjaan')->result();

		$this->db->where('ket_pekerjaan', 'ibu');
		$this->db->order_by('id_pekerjaan', 'ASC');
		$data['v_pekerjaan_ibu'] = $this->db->get('tbl_pekerjaan')->result();

		$this->db->order_by('id_pekerjaan', 'ASC');
		$this->db->group_by('nama_pekerjaan');
		$data['v_pekerjaan_wali'] = $this->db->get('tbl_pekerjaan')->result();

		$this->load->view('web/pendaftaran', $data);

		if (isset($_POST['btndaftar'])) {
			$this->db->order_by('id_siswa', 'DESC');
			$sql 		= $this->db->get('tbl_siswa');
			if ($sql->num_rows() == 0) {
				$no_pendaftaran   = "001-PSB-" . date('Y'); //pake tahun otomatis
				//  $no_pendaftaran   = "001-PSB-2019";
			} else {
				$noUrut 	 	= substr($sql->row()->no_pendaftaran, 1, 2);
				$noUrut++;
				$no_pendaftaran	  = sprintf("%03s", $noUrut) . "-PSB-" . date('Y');
				//  $no_pendaftaran	  = sprintf("%03s", $noUrut)."-PSB-2019"; //pake tahun manual
			}

			$nisn							= $this->input->post('nisn');
			$nama_lengkap					= $this->input->post('nama_lengkap');
			$jk								= $this->input->post('jk');
			$tempat_lahir					= $this->input->post('tempat_lahir');
			$tgl_lahir						= $this->input->post('tgl_lahir') . "-" . $this->input->post('bln_lahir') . "-" . $this->input->post('thn_lahir');
			$agama							= $this->input->post('agama');
			$anak_ke						= $this->input->post('anak_ke');
			$jml_saudara_kandung			= $this->input->post('jml_saudara_kandung');
			$jml_saudara_tiri				= $this->input->post('jml_saudara_tiri');
			$alamat_siswa					= $this->input->post('alamat_siswa');
			$telp_siswa					= $this->input->post('telp_siswa');
			$jurusan					= $this->input->post('jurusan');
			$nama_ayah						= $this->input->post('nama_ayah');
			$pdd_ayah						= $this->input->post('pdd_ayah');
			$pekerjaan_ayah					= $this->input->post('pekerjaan_ayah');
			$penghasilan_ayah				= $this->input->post('penghasilan_ayah');
			$no_hp_ayah						= $this->input->post('no_hp_ayah');
			$nama_ibu						= $this->input->post('nama_ibu');
			$pdd_ibu						= $this->input->post('pdd_ibu');
			$pekerjaan_ibu					= $this->input->post('pekerjaan_ibu');
			$penghasilan_ibu				= $this->input->post('penghasilan_ibu');
			$no_hp_ibu						= $this->input->post('no_hp_ibu');
			$nama_wali						= $this->input->post('nama_wali');
			$pdd_wali						= $this->input->post('pdd_wali');
			$pekerjaan_wali					= $this->input->post('pekerjaan_wali');
			$penghasilan_wali				= $this->input->post('penghasilan_wali');
			$no_hp_wali						= $this->input->post('no_hp_wali');
			$no_piagam						= $this->input->post('no_piagam');
			$nama_prestasi					= $this->input->post('nama_prestasi');
			$juara_ke						= $this->input->post('juara_ke');
			$tingkat						= $this->input->post('tingkat');
			$tahun_prestasi					= $this->input->post('tahun_prestasi');
			//		$nilai_bakat					= $this->input->post('nilai_bakat');
			$nomor_ijazah					= $this->input->post('nomor_ijazah');
			$asal_sekolah					= $this->input->post('asal_sekolah');
			$alamat_sekolah					= $this->input->post('alamat_sekolah');
			$tahun_lulus					= $this->input->post('tahun_lulus');
			$mtk						= $this->input->post('mtk');
			$ind				= $this->input->post('ind');
			$ipa							= $this->input->post('ipa');
			$total					= $this->input->post('jml');
			$tgl_siswa						= $this->Model_data->date('waktu_default');

			$data = array(
				'no_pendaftaran'		=> $no_pendaftaran,
				'password'				=> $nisn,
				'nisn'				    => $nisn,
				'nama_lengkap'			=> $nama_lengkap,
				'jk'				  	=> $jk,
				'tempat_lahir'			=> $tempat_lahir,
				'tgl_lahir'				=> $tgl_lahir,
				'agama'				  	=> $agama,
				'anak_ke'		=> $anak_ke,
				'jml_saudara_kandung'		=> $jml_saudara_kandung,
				'jml_saudara_tiri'		=> $jml_saudara_tiri,
				'alamat_siswa'			=> $alamat_siswa,
				'telp_siswa'			=> $telp_siswa,
				'pil_jurusan'			=> $jurusan,
				'nama_ayah'				=> $nama_ayah,
				'pdd_ayah'				=> $pdd_ayah,
				'pekerjaan_ayah'		=> $pekerjaan_ayah,
				'penghasilan_ayah'	    => $penghasilan_ayah,
				'no_hp_ayah'			=> $no_hp_ayah,
				'nama_ibu'				=> $nama_ibu,
				'pdd_ibu'				=> $pdd_ibu,
				'pekerjaan_ibu'			=> $pekerjaan_ibu,
				'penghasilan_ibu'		=> $penghasilan_ibu,
				'no_hp_ibu'				=> $no_hp_ibu,
				'nama_wali'				=> $nama_wali,
				'pdd_wali'				=> $pdd_wali,
				'pekerjaan_wali'		=> $pekerjaan_wali,
				'penghasilan_wali'	    => $penghasilan_wali,
				'no_hp_wali'			=> $no_hp_wali,
				'nomor_ijazah'			=> $nomor_ijazah,
				'asal_sekolah'	    	=> $asal_sekolah,
				'alamat_sekolah'		=> $alamat_sekolah,
				'tahun_lulus'			=> $tahun_lulus,
				'matematika'			=> $mtk,
				'bahasa_indonesia'		=> $ind,
				'ipa'	    			=> $ipa,
				'jml_nilai_un'			=> $total,
				//	'npsn_sekolah'  	    => $npsn,
				'tgl_siswa'				=> $tgl_siswa,

			);
			$this->db->insert('tbl_siswa', $data);

			$datazz = array(
				'id_siswa' => $nisn,
				'nama'			=> $nama_lengkap,
				'nim'		=> $no_pendaftaran,
				'jurusan'			=> $jurusan

			);
			$this->db->insert('m_siswa', $datazz);


			$datazzz = array(
				'username'			=> $no_pendaftaran,
				'password'		=> md5($nisn),
				'level'			=> 'siswa',
				'kon_id' => $nisn

			);
			$this->db->insert('m_admin', $datazzz);

			$data_foto = array(
				'no_pendaftaran' => $no_pendaftaran,
				'nama_foto'		=> 'default.jpg'
			);
			$this->db->insert('tbl_foto', $data_foto);

			$data_bakat = array(
				'no_pendaftaran'		=> $no_pendaftaran,
				'nama_prestasi'			=> $nama_prestasi,
				'juara_ke'				=> $juara_ke,
				'tingkat'				=> $tingkat,
				'tahun_prestasi'	    => $tahun_prestasi,
				//			'nilai_bakat'			=> $nilai_bakat,
			);
			$this->db->insert('tbl_bakat', $data_bakat);


			if (isset($_POST['btndaftar'])) {
				$this->db->order_by('id_ujian', 'DESC');
				$sql 		= $this->db->get('tbl_ujian');
				if ($sql->num_rows() == 0) {
					$no_test   = "001-TEST-" . date('Y'); //pake tahun otomatis
					//  $no_test   = "001-TES-2019";
				} else {
					$noUrut 	 	= substr($sql->row()->no_test, 1, 2);
					$noUrut++;
					$no_test	  = sprintf("%03s", $noUrut) . "-TES-" . date('Y'); //pake tahun otomatis
					//	  $no_test	  = sprintf("%03s", $noUrut)."-TES-2019";
				}

				$data_ujian = array(
					'nama'				=> $nama_lengkap,
					'no_pend'		=> $no_pendaftaran,
					'no_test'			=> $no_test,
					//	'ruang_ujian'		=> $ruang_ujian,
				);
				$this->db->insert('tbl_ujian', $data_ujian);
			}
			for ($i = 1; $i <= 4; $i++) {
				if ($i == 1) {
					$mapel = 'Ilmu Pengetahuan Alam (IPA)';
					$smstr = 'ipa';
					//}elseif ($i == 2) {
					//	$mapel = 'Ilmu Pengetahuan Sosial (IPS)';
					//	$smstr = 'ips';
				} elseif ($i == 2) {
					$mapel = 'Matematika';
					$smstr = 'mtk';
				} elseif ($i == 3) {
					$mapel = 'Bahasa Indonesia';
					$smstr = 'ind';
				} elseif ($i == 4) {
					$mapel = 'Bahasa Inggris';
					$smstr = 'ing';
				}
				$rata = $this->input->post("nilai_" . $smstr);
				$data2 = array(
					'mapel'				 	=> $mapel,
					'semester1'		 		=> $this->input->post($smstr . "1"),
					'semester2'				=> $this->input->post($smstr . "2"),
					'semester3'				=> $this->input->post($smstr . "3"),
					'semester4'				=> $this->input->post($smstr . "4"),
					'semester5'				=> $this->input->post($smstr . "5"),
					'rata_rata_nilai'	=> $rata,
					'no_pendaftaran'	=> $no_pendaftaran
				);
				$this->db->insert('tbl_rapor', $data2);
			}
			$data_nilai = array(
				'no_pendaftaran'		=> $no_pendaftaran,
				'nama'					=> $nama_lengkap,
				//		'nilai_bakat'				=> $nilai_bakat,
				'nilai_rapot'				=> $rata,
				'nilai_un'	    => $total,
			);
			$this->db->insert('tbl_nilai', $data_nilai);

			$this->session->set_userdata('no_pendaftaran', "$no_pendaftaran");
			redirect('panel_siswa');
		}
	}


	public function logcs()
	{
		$data['web_ppdb']	 = $this->db->get_where('tbl_web', "id_web='1'")->row();
		if ($data['web_ppdb']->status_ppdb == 'tutup') {
			redirect('404');
		}
		$ceks = $this->session->userdata('no_pendaftaran');
		if (isset($ceks)) {
			redirect('panel_siswa');
		} else {
			$this->load->view('web/index', $data);

			if (isset($_POST['btnlogin'])) {
				$username = $_POST['username'];
				$pass	   = $_POST['password'];

				$this->db->like('tgl_siswa', '2022', "after");
				// $this->db->like('tgl_siswa', date('Y'), "after"); otomatis
				$query  = $this->db->get_where('tbl_siswa', "no_pendaftaran='$username'");
				$cek    = $query->result();
				$cekun  = $cek[0]->no_pendaftaran;
				$nisnx  = $cek[0]->nisn;
				$jumlah = $query->num_rows();

				if ($jumlah == 0) {
					$this->session->set_flashdata(
						'msg',
						'
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;&nbsp;</span>
											</button>
											<strong>No. Pendaftaran "' . $username . '"</strong> belum terdaftar.
									 </div>'
					);
					redirect('logcs');
				} else {
					$row = $query->row();
					$cekpass = $row->password;
					if ($cekpass <> $pass) {
						$this->session->set_flashdata(
							'msg',
							'<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;&nbsp;</span>
															</button>
															<strong>No. Pendaftaran atau NISN Salah!</strong>.
													 </div>'
						);
						redirect('logcs');
					} else {

						$this->session->set_userdata('no_pendaftaran', "$cekun");
						$this->session->set_userdata('nisn', "$nisnx");

						redirect('panel_siswa');
					}
				}
			}
		}
	}

	public function logcs_sso()
	{
		$data['web_ppdb']	 = $this->db->get_where('tbl_web', "id_web='1'")->row();
		if ($data['web_ppdb']->status_ppdb == 'tutup') {
			redirect('404');
		}

		$username = $_GET['username'];
		$pass	   = $_GET['pw'];

		$this->db->like('tgl_siswa', '2022', "after");
		// $this->db->like('tgl_siswa', date('Y'), "after"); otomatis
		$query  = $this->db->get_where('tbl_siswa', "no_pendaftaran='$username'");
		$cek    = $query->result();
		$cekun  = $cek[0]->no_pendaftaran;
		$nisnx  = $cek[0]->nisn;
		$jumlah = $query->num_rows();

		if ($jumlah == 0) {
			$this->session->set_flashdata(
				'msg',
				'
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;&nbsp;</span>
											</button>
											<strong>No. Pendaftaran "' . $username . '"</strong> belum terdaftar.
									 </div>'
			);
			redirect('logcs');
		} else {
			$row = $query->row();
			$cekpass = $row->password;
			if ($cekpass <> $pass) {
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;&nbsp;</span>
															</button>
															<strong>No. Pendaftaran atau NISN Salah!</strong>.
													 </div>'
				);
				redirect('logcs');
			} else {

				$this->session->set_userdata('no_pendaftaran', "$cekun");
				$this->session->set_userdata('nisn', "$nisnx");

				redirect('panel_siswa');
			}
		}
	}


	function error_not_found()
	{
		$this->load->view('404_content');
	}
}
