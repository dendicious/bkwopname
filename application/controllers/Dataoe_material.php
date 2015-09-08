<?php
	/**
	* 
	*/
	class Dataoe_material extends CI_Controller
	{
		function __construct(){
			parent::__construct();

			$this->load->model('Dataoe_material_m');
			$this->load->model('Dataproyek_m');

			$this->load->helper('url');
	        $this->load->helper('form');
	        $this->load->helper('file');
		}

		public function index(){
			$this->load->view('Dataoe_material_v');	
		}

		function do_upload(){
			$config['upload_path'] = './temp_upload/';
			$config['allowed_types'] = 'xls';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload()){
				$data = array('error' => $this->upload->display_errors());
			}
			else{
	            $data = array('error' => false);
				$upload_data = $this->upload->data();

	            $this->load->library('excel_reader');
				$this->excel_reader->setOutputEncoding('CP1251');

				$file =  $upload_data['full_path'];
				$this->excel_reader->read($file);
				error_reporting(E_ALL ^ E_NOTICE);

				// Sheet 1
				$data = $this->excel_reader->sheets[0] ;
	                        $dataexcel = Array();
				for ($i = 2; $i <= $data['numRows'] ; $i++) {
	                //kalo di baris ga ada data langsung keluar dari looping
	                if($data['cells'][$i][1] == '') break;
	                //binding data excel ke array
	                $dataexcel[$i-2]['id_proyek'] = $data['cells'][$i][1];
	                $dataexcel[$i-2]['nama_proyek'] = $data['cells'][$i][2];
	                $dataexcel[$i-2]['pic'] = $data['cells'][$i][3];
	                $dataexcel[$i-2]['id_produk'] = $data['cells'][$i][4];
	                $dataexcel[$i-2]['volume'] = $data['cells'][$i][5];
	                $dataexcel[$i-2]['harga_satuan'] = $data['cells'][$i][6];
	                $dataexcel[$i-2]['total'] = $data['cells'][$i][7];
	                $dataexcel[$i-2]['id_user'] = 1;
	                $dataexcel[$i-2]['tanggal_dibuat'] = $this->Dataoe_material_m->getNow();
	               	
				}
				
	            delete_files($upload_data['file_path']);
	            
	            $this->Dataproyek_m->insertData($dataexcel);
	            $this->Dataoe_material_m->insertData($dataexcel);
	            //$data['user'] = $this->User_model->getuser();
			}
			echo "insert sukses";
	        //$this->load->view('hasil', $data);
		}

		public function Dataoe_material_se(){
			$getDataoe	= $this->Dataoe_material_m->getAll();
			if($getDataoe->num_rows() > 0){
				foreach ($getDataoe->result() as $dataoedb) {
					$no_rec[] 		= $dataoedb->no_rec;
					$id_proyek[] 	= $dataoedb->id_project;
					$id_produk[]	= $dataoedb->id_produk;
					$volume[]		= $dataoedb->volume;
				}

				for($i=0; $i<count($id_proyek); $i++){
					$this->Dataproyek_m->setId_proyek($id_proyek[$i]);
					$dataproyek 	= $this->Dataproyek_m->getById();
					foreach ($dataproyek->result() as $dataproyekdb) {
						$nama_proyek[]	= $dataproyekdb->nama_proyek;
						$pic[] 			= $dataproyekdb->pic;
					}
				}
			}

			$getDataProyek	= $this->Dataproyek_m->getAll();
			if($getDataProyek->num_rows() > 0){
				foreach ($getDataProyek->result() as $datadbproyek) {
					$id_proyek_distinct[]	= $datadbproyek->id_proyek;
				}
			}

			$this->load->view('Header_v');
			$this->load->view('Dataoe_material_se_v', array('id_proyek' => $id_proyek, 'id_produk' => $id_produk, 'volume' => $volume, 'nama_proyek' => $nama_proyek, 'pic' => $pic, 'no_rec' => $no_rec, 'id_proyekdistinct' => $id_proyek_distinct));
			$this->load->view('Footer_v');
		}
	}
?>