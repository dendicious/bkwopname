<?php
	/**
	* 
	*/
	class Datasm_material_temp_m extends CI_Model{
		
		function __construct(){
			parent:: __construct();
			$this->load->database();
		}

		private $no_rec;
		private $id_user;
		private $id_project;
		private $id_produk;
		private $volume;
		private $harga_satuan;
		private $total_harga;
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

		public function setId_produk($id_produk){
			$this->id_produk = $id_produk;
		}

		public function setVolume($volume){
			$this->volume = $volume;
		}

		public function setHarga_satuan($harga_satuan){
			$this->harga_satuan = $harga_satuan;
		}

		public function setTotal_harga($total_harga){
			$this->total_harga = $total_harga;
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

		public function getId_produk(){
			return $this->id_produk;
		}

		public function getVolume(){
			return $this->volume;
		}

		public function getHarga_satuan(){
			return $this->harga_satuan;
		}

		public function getTotal_harga(){
			return $this->total_harga;
		}

		public function getTanggal_dibuat(){
			return $this->tanggal_dibuat;
		}

		public function getTanggal_update(){
			return $this->tanggal_update;
		}

		//method lainnya
		public function getAll(){
			$query	= $this->db->get('datasm_material_temp');

			return $query;
		}

		public function getByIdProject(){
			$this->db->where('id_project', $this->getId_project());
			$query 	= $this->db->get('datasm_material_temp');

			return $query;
		}

		public function insertData($dataarray){

      		for($i=0;$i<count($dataarray);$i++){
      			$id = $this->getMaxId();
		        $data = array(
		        	'no_rec'=>$id,
		            'id_user'=>$dataarray[$i]['id_user'],
		            'id_project'=>$dataarray[$i]['id_proyek'],
		            'id_produk'=>$dataarray[$i]['id_produk'],
		            'volume'=>$dataarray[$i]['volume'],
		            'harga_satuan'=>$dataarray[$i]['harga_satuan'],
		            'total_harga'=>$dataarray[$i]['total'],
		            'tanggal_dibuat'=>$dataarray[$i]['tanggal_dibuat']
		            );
		            
		    $this->db->insert('datasm_material_temp', $data);
		    }
     	}

     	public function hapus(){
     		$this->db->where('no_rec', $this->getNo_rec());
     		$this->db->where('id_project', $this->getId_project());
     		$query 	= $this->db->delete('datasm_material_temp');

     		return $query;
     	}

		public function insertSingleData($dataarray){
		    $query	= $this->db->insert('datasm_material_temp', $dataarray);
		    
		    return $query;
     	}

     	public function hapusAlltempById(){
     		$this->db->where('id_project', $this->getId_project());
     		$query 	= $this->db->delete('datasm_material_temp');

     		return $query;
     	}
	}
?>