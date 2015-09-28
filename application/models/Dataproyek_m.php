<?php
	/**
	* 
	*/
	class dataproyek_m extends CI_Model
	{
		function __construct(){
	        parent::__construct();
	        $this->load->database();
    	}

		private $id_proyek;
		private $nama_proyek;
		private $pic;
		private $tanggal_dibuat;
		private $tanggal_update;

		//setter
		public function setId_proyek($id_proyek){
			$this->id_proyek = $id_proyek;
		}

		public function setNama_proyek($nama_proyek){
			$this->nama_proyek = $nama_proyek;
		}

		public function setPic($pic){
			$this->pic = $pic;
		}

		public function setTanggal_dibuat($tanggal_dibuat){
			$this->tanggal_dibuat = $tanggal_dibuat;
		}

		public function setTanggal_update($tanggal_update){
			$this->tanggal_update = $tanggal_update;
		}

		//getter
		public function getId_proyek(){
			return $this->id_proyek;
		}

		public function getNama_proyek(){
			return $this->nama_proyek;
		}

		public function getPic(){
			return $this->pic;
		}

		public function getTanggal_dibuat(){
			return $this->tanggal_dibuat;
		}

		public function getTanggal_update(){
			return $this->tanggal_update;
		}

		//method lainnya
		public function getAll(){
			$query	= $this->db->get('dataproyek');

			return $query;
		}

		public function getById(){
			$this->db->where('id_proyek', $this->getId_proyek());
			$query	= $this->db->get('dataproyek');

			return $query;
		}

		public function insertData($dataarray){
            for($i=0;$i<count($dataarray);$i++){
	            $data = array(
	                'id_proyek'=>$dataarray[$i]['id_proyek'],
	                'nama_proyek'=>$dataarray[$i]['nama_proyek'],
	                'pic'=>$dataarray[$i]['pic'],
	                'tanggal_dibuat'=>$dataarray[$i]['tanggal_dibuat']
	            );
            
	            //jika id_projek udah ada maka inputan di skip
	            $count_data = $this->checkDuplicateData($dataarray[$i]['id_proyek']);
	            if ($count_data->num_rows > 0) {
	                continue;
	            }
	            //end jika id_projek udah ada maka inputan di skip

	            $this->db->insert('dataproyek', $data);
	        }


	        //return $this->db->insert('dataproyek',$data);
	    }

	    public function getNow(){
	        $sql    = 'SELECT NOW() AS NOW';
	        $query  = $this->db->query($sql);

	        foreach ($query->result() as $time) {
	            $now = $time->NOW;
	        }

	        return $now;
	    }
    
	    public function checkDuplicateData($id){
	        $this->db->where('id_proyek', $id);
	        $query  = $this->db->get('dataproyek');

	        return $query;

	    }

	    public function tambah($dataproyek){
	    	$query 	= $this->db->insert('dataproyek', $dataproyek);
	    	$value 	= $query->num_rows();

	    	return $value;
	    }

	    public function ubah($dataproyek){
	    	$this->db->where('id_proyek', $this->getId_proyek());
	    	$query	= $this->db->update('dataproyek', $dataproyek);

	    	return $query;
	    }

	    public function hapus(){
	    	$this->db->where('id_proyek', $this->getId_proyek());
	    	$query 	= $this->db->delete('dataproyek');

	    	return $query;
	    }

	    public function getProjectById(){
	    	$this->db->where('id_proyek', $this->getId_proyek());
	    	$query	= $this->db->get('dataproyek');

	    	return $query;
	    }
	}
?>