<?php
	/**
	* 
	*/
	class Datauser extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Datauser_m');
			$this->load->model('Datajabatan_m');

			$this->load->helper('date');
		}

		public function index(){
			$datauser = $this->Datauser_m->getAllUser();
			if($datauser->num_rows() > 0){
				foreach ($datauser->result() as $userdb) {
					$id_user[]		= $userdb->id_user;
					$username[]		= $userdb->username;
					$password[]		= $userdb->password;
					$nama[]			= $userdb->nama;
					$id_jabatan[]	= $userdb->id_jabatan;
					$tgl_dibuat[]	= $userdb->tanggal_dibuat;
					$tgl_update[]	= $userdb->tanggal_update;
				}
			}

			for($i=0; $i<count($id_jabatan); $i++){
				$this->Datajabatan_m->setId_jabatan($id_jabatan[$i]);
				$datajabatan = $this->Datajabatan_m->getJabatanById();

				foreach ($datajabatan->result() as $jabatandb) {
					$jabatan[] = $jabatandb->jabatan;
				}
			}

			$get_jabatan = $this->Datajabatan_m->getAllJabatan();

			$this->load->view('Header_v');
			$this->load->view('Datauser_admin_v', array('id_user'=>$id_user, 'username'=>$username, 'password'=>$password, 'nama'=>$nama, 'id_jabatan'=>$id_jabatan, 'tgl_dibuat'=>$tgl_dibuat, 'tgl_update'=>$tgl_update, 'jabatan'=>$jabatan, 'dtajabatan'=>$get_jabatan));
			$this->load->view('Footer_v');
		}

		public function tambah(){
			$nama	= $this->input->post('nama');
			$idjbtn = $this->input->post('jabatan');
			$uname 	= $this->input->post('username');
			$passwd = $this->input->post('password');
			$id 	= $this->Datauser_m->getMaxId();
			$now 	= $this->Datauser_m->getNow();

			$datauser 	= array(
									'id_user'			=> $id,
									'username'			=> $uname,
									'password'			=> md5($passwd),
									'nama' 				=> $nama,
									'tanggal_dibuat'	=> $now,
									'id_jabatan'		=> $idjbtn
								);

			$tambah		= $this->Datauser_m->tambah($datauser);
			echo $tambah;
		}

		public function cek_username(){
			$uname 		= $this->input->post('uname');
			$this->Datauser_m->setUsername($uname);
			$cek_uname 	= $this->Datauser_m->cek_username();
			$jml_akun 	= $cek_uname->num_rows();

			echo $jml_akun;
		}

		public function cek_akun(){
			$id 		= $this->input->post('id');
			$uname 		= $this->input->post('uname');
			$this->Datauser_m->setId_user($id);
			$this->Datauser_m->setUsername($uname);
			$cek_akun	= $this->Datauser_m->cek_akun();
			$jml_akun 	= $cek_akun->num_rows();

			echo $jml_akun;
		}

		public function ubah(){
			$id 	= $this->input->post('id_user');
			$nama	= $this->input->post('nama');
			$idjbtn = $this->input->post('jabatan');
			$uname 	= $this->input->post('username');
			$passwd = $this->input->post('password');
			$now 	= $this->Datauser_m->getNow();
			$this->Datauser_m->setId_user($id);

			if($passwd == ''){
				$datauser 	= array(
										'id_user'			=> $id,
										'username'			=> $uname,
										'nama' 				=> $nama,
										'tanggal_update'	=> $now,
										'id_jabatan'		=> $idjbtn
									);
			}
			else{
				$datauser 	= array(
										'id_user'			=> $id,
										'username'			=> $uname,
										'password'			=> md5($passwd),
										'nama' 				=> $nama,
										'tanggal_update'	=> $now,
										'id_jabatan'		=> $idjbtn
									);
			}

			$ubah	= $this->Datauser_m->ubah($datauser);

			echo $ubah;
		}

		public function hapus(){
			$id 	= $this->input->post('id');
			$this->Datauser_m->setId_user($id);
			$hapus 	= $this->Datauser_m->hapus();

			echo $hapus;
		}
	}
?>