<?php
	/**
	* 
	*/
	class Profil extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Datauser_m');
			$this->load->model('Datajabatan_m');
		}

		public function index(){
			$id_user	= $this->session->userdata('bkwopname_user');
			$this->Datauser_m->setId_user($id_user);
			$data 		= $this->Datauser_m->get_userbyperson();

			if($data->num_rows() > 0){
					foreach ($data->result() as $datauser) {
						$username	= $datauser->username;
						$password	= $datauser->password;
						$nama_user	= $datauser->nama;
						$id_jabatan	= $datauser->id_jabatan;
						$tgl_dibuat	= $datauser->tanggal_dibuat;
						$tgl_update	= $datauser->tanggal_update;
					}

					$this->Datajabatan_m->setId_jabatan($id_jabatan);
					$get_jabatan	= $this->Datajabatan_m->getJabatanById();

					if($get_jabatan->num_rows > 0){
						foreach ($get_jabatan->result() as $jabatandb) {
							$jabatan_user	= $jabatandb->jabatan;
						}
					}
			}

			$user = array(
							'username' 			=> $username,
							'password' 			=> $password,
							'nama'				=> $nama_user,
							'id_jabatan'		=> $id_jabatan,
							'jabatan'			=> $jabatan_user,
							'tanggal_dibuat'	=> $tgl_dibuat,
							'tanggal_update'	=> $tgl_update
							);
			$this->load->view('Header_v');
			$this->load->view('Profil_v', array('datauser' => $user));
			$this->load->view('Footer_v');
		}
	}
?>