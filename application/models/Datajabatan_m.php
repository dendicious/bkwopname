<?php
	/**
	* 
	*/
	class datajabatan_m extends CI_Model
	{
		private $id_jabatan;
		private $jabatan;

		//setter
		public function setId_jabatan($id_jabatan){
			$this->id_jabatan = $id_jabatan;
		}

		public function setJabatan($jabatan){
			$this->jabatan = $jabatan;
		}

		//getter
		public function getId_jabatan(){
			return $this->id_jabatan;
		}

		public function getJabatan(){
			return $this->jabatan;
		}

		//method lainnya
		public function getJabatanById(){
			$this->db->where('id_jabatan', $this->getId_jabatan());
			$query = $this->db->get('datajabatan');

			return $query;
		}

		public function getAllJabatan(){
			$query = $this->db->get('datajabatan');

			return $query;
		}
	}
?>