<?php
	/**
	* 
	*/
	class datasm_headpo_m extends CI_Model{
		
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

		public function setRetensi($retensi){
			$this->retensi = $retensi;
		}

		public function setKebersihan($kebersihan){
			$this->kebersihan = $kebersihan;
		}

		public function setRepair($repair){
			$this->repair = $repair;
		}

		public function setPph($pph){
			$this->pph = $pph;
		}

		public function setTotal_harga($total_harga){
			$this->total_harga = $total_harga;
		}

		public function setTotal_potongan($total_potongan){
			$this->total_potongan = $total_potongan;
		}

		public function setTotal_bersih($total_bersih){
			$this->total_bersih = $total_bersih;
		}

		public function setTanggal_dibuat($tanggal_dibuat){
			$this->tanggal_dibuat = $tanggal_dibuat;
		}

		public function setTanggal_update($tanggal_update){
			$this->tanggal_update = $tanggal_update;
		}

		//getter
		public function getNo_rec(){
			return $this->no_rec;
		}

		public function getId_user(){
			return $this->id_user;
		}

		public function getId_project(){
			return $this->id_project;
		}

		public function getRetensi(){
			return $this->retensi;
		}

		public function getKebersihan(){
			return $this->kebersihan;
		}

		public function gerRepair(){
			return $this->repair;
		}

		public function getPph(){
			return $this->pph;
		}

		public function getTotal_harga(){
			return $this->total_harga;
		}

		public function getTotal_potongan(){
			return $this->total_potongan;
		}

		public function getTotal_bersih(){
			return $this->total_bersih;
		}

		public function getTanggal_dibuat(){
			return $this->tanggal_dibuat;
		}

		public function getTanggal_update(){
			return $this->tanggal_update;
		}

		//method lainnya
		public function getAll(){
			return $this->db->get('datasm_headpo');
		}

		public function getNow(){
		    $sql    = 'SELECT NOW() AS NOW';
		    $query  = $this->db->query($sql);

		    foreach ($query->result() as $time) {
		        $now = $time->NOW;
	        }
	        return $now;
		}

		public function save($data){
			$query	= $this->db->insert('datasm_headpo', $data);

			return $query;
		}
	}
?>