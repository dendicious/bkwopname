<?php
	/**
	* 
	*/
	class Datasm_headpo_m extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		private $no_rec;
		private $id_user;
		private $id_project;
		private $retensi;
		private $kebersihan;
		private $repair;
		private $pph;
		private $total_harga;
		private $total_potongan;
		private $total_bersih;
		private $tanggal_dibuat;
		private $tanggal_update;

		//setter
		public function setNo_rec($no_rec){
			$this->no_rec = $no_rec;
		}

		public function setId_user($id_user){
			$this->id_user = $id_user;
		}

		public function setId_project($id_project){
			$this->id_project = $id_project;
		}
	}
?>