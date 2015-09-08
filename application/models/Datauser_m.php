<?php
	/**
	* 
	*/
	class Datauser_m extends CI_Model
	{
		private $id_user;
		private $username;
		private $password;
		private $nama;
		private $id_jabatan;
		private $tanggal_dibuat;
		private $tanggal_update;

		//setter
		public function setId_user($id_user){
			$this->id_user = $id_user;
		}

		public function setUsername($username){
			$this->username = $username;
		}
		
		public function setPassword($password){
			$this->password = $password;
		}

		public function setNama($nama){
			$this->nama = $nama;
		}

		public function setId_jabatan($jabatan){
			$this->id_jabatan = $jabatan;
		}

		public function setTanggal_dibuat($tanggal_dibuat){
			$this->tanggal_dibuat = $tanggal_dibuat;
		}

		public function setTanggal_update($tanggal_update){
			$this->tanggal_update = $tanggal_update;
		}

		//getter
		public function getId_user(){
			return $this->id_user;
		}

		public function getUsername(){
			return $this->username;
		}

		public function getPassword(){
			return $this->password;
		}

		public function getNama(){
			return $this->nama;
		}

		public function getId_jabatan(){
			return $this->id_jabatan;
		}

		public function getTanggal_dibuat(){
			return $this->tanggal_dibuat;
		}

		public function getTanggal_update(){
			return $this->tanggal_update;
		}

		//method lainnya
		public function get_user(){
			$this->db->where('username', $this->getUsername());
			$this->db->where('password', md5($this->getPassword()));
			$query = $this->db->get('datauser');

			return $query;
		}

		public function get_userbyperson(){
			$this->db->where('id_user', $this->getId_user());
			$query = $this->db->get('datauser');

			return $query;
		}

		public function getAllUser(){
			$query = $this->db->get('datauser');

			return $query;
		}

		public function getMaxId(){
			$this->db->select_max('id_user');
			$query = $this->db->get('datauser');

			if($query->num_rows() > 0){
				foreach ($query->result() as $max_iddb) {
					$max_id = $max_iddb->id_user;
				}
			}

			$temp_id		= substr($max_id,1);
			$templastid		= $temp_id + 1;
			$tempfirstid	= substr($max_id,0,1);

			if($templastid > 9){
				$last_id	= $tempfirstid."0".$templastid;
			}
			else if($templastid > 99){
				$last_id	= $tempfirstid.$templastid;
			}
			else{
				$last_id	= $tempfirstid."00".$templastid;
			}

			return $last_id;
		}

		public function tambah($datauser){
			return $this->db->insert('datauser',$datauser);
		}

		public function getNow(){
			$sql	= 'SELECT NOW() AS NOW';
			$query	= $this->db->query($sql);

			foreach ($query->result() as $time) {
				$now = $time->NOW;
			}

			return $now;
		}

		public function cek_username(){
			$this->db->where('username', $this->getUsername());
			$query	= $this->db->get('datauser');

			return $query;
		}

		public function cek_akun(){
			$this->db->where('id_user', $this->getId_user());
			$this->db->where('username', $this->getUsername());
			$query = $this->db->get('datauser');

			return $query;
		}

		public function ubah($datauser){
			$this->db->where('id_user', $this->getId_user());
			$query 	= $this->db->update('datauser', $datauser);

			return $query;
		}

		public function hapus(){
			$this->db->where('id_user', $this->getId_user());
			$query	= $this->db->delete('datauser');

			return $query;
		}
	}
?>