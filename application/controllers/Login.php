<?php
	class Login extends CI_Controller{
		function __construct(){
			parent::__construct();

			$this->load->model('Datauser_m');
		}

		public function index(){
			$this->load->view('Header_v');
			$this->load->view('Login_v');
			$this->load->view('Footer_v');
		}

		public function sign_in(){
			$uname	= $this->input->post('user_username');
			$passwd	= $this->input->post('user_password');

			$this->Datauser_m->setUsername($uname);
			$this->Datauser_m->setPassword($passwd);

			$cek_user	= $this->Datauser_m->get_user();
			if($cek_user->num_rows() > 0){
				foreach($cek_user->result() as $user){
					$id_user 	= $user->id_user;
					$username 	= $user->username;
					$id_jabatan	= $user->id_jabatan;
				}

				$this->session->set_userdata('bkwopname_user', $id_user);
				$this->session->set_userdata('bkwopname_uname', $username);
				$this->session->set_userdata('bkwopname_idjabatan', $id_jabatan);

				redirect('Beranda');
			}
			else{
				$data = array(
								'status_uname' => 'error_uname', 
								'status_password' => 'error_password'
								);

				$this->load->view('Header_v');
				$this->load->view('Login_v', array('data' => $data));
				$this->load->view('Footer_v');
			}
		}

		public function cek_user(){
			$uname 	= $this->input->post('uname');
			$passwd = $this->input->post('passwd');

			$this->Datauser_m->setUsername($uname);
			$this->Datauser_m->setPassword($passwd);

			$cek_user	= $this->Datauser_m->get_user();
			echo $cek_user->num_rows();
		}
	}
?>