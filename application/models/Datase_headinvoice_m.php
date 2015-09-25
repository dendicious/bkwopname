<?php
	/**
	* 
	*/
	class Datase_headinvoice_m extends CI_Model{
		
		function __construct(){
			parent:: __construct();
			$this->load->database();
		}

		private $id_rec;
		private $id_proyek;
		private $total;
		private $tanggal_dibuat;
		private $tanggal_update;

		//setter
		public function setId_rec($id_rec){
			$this->id_rec = $id_rec;
		}

		public function setId_proyek($id_proyek){
			$this->id_proyek = $id_proyek;
		}

		public function setTotal($total){
			$this->total = $total;
		}

		public function setTanggal_dibuat($tanggal_dibuat){
			$this->tanggal_dibuat = $tanggal_dibuat;
		}

		public function setTanggal_update($tanggal_update){
			$this->tanggal_update = $tanggal_update;
		}

		//getter
		public function getId_rec(){
			return $this->id_rec;
		}

		public function getId_proyek(){
			return $this->id_proyek;
		}

		public function getTotal(){
			return $this->total;
		}

		public function getTanggal_dibuat(){
			return $this->tanggal_dibuat;
		}

		public function getTanggal_update(){
			return $this->tanggal_update;
		}

		//method lainnya
		public function getAll(){
			$query	= $this->db->get('datase_headinvoice');

			return $query;
		}

		public function insertSingleData($data){  
		    $query 	= $this->db->insert('datase_headinvoice', $data);
		    return $query;
     	}
	}
?>