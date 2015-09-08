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
			$getDataoe	= $this->Dataoe_material_m->getAll();
			if($getDataoe->num_rows() > 0){
				foreach ($getDataoe->result() as $dataoedb) {
					$no_rec[] 		= $dataoedb->no_rec;
					$id_proyek[] 	= $dataoedb->id_project;
					$id_produk[]	= $dataoedb->id_produk;
					$volume[]		= $dataoedb->volume;
					$harga_satuan[]	= $dataoedb->harga_satuan;
					$total_harga[] 	= $dataoedb->total_harga;
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
				foreach ($getDataProyek->result() as $dtproyek) {
					$idproyek_dataproyek[]		= $dtproyek->id_proyek;
					$namaproyek_dataproyek[]	= $dtproyek->nama_proyek;
				}
			}

			$this->load->view('Header_v');
			$this->load->view('Dataoe_material_v', array('id_proyek' => $id_proyek, 'id_produk' => $id_produk, 'volume' => $volume, 'nama_proyek' => $nama_proyek, 'pic' => $pic, 'no_rec' => $no_rec, 'harga_satuan' => $harga_satuan, 'total_harga' => $total_harga, 'idproyek_dataproyek' => $idproyek_dataproyek, 'namaproyek_dataproyek' => $namaproyek_dataproyek));
			$this->load->view('Footer_v');
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
	                $dataexcel[$i-2]['id_proyek'] 		= $data['cells'][$i][1];
	                $dataexcel[$i-2]['nama_proyek'] 	= $data['cells'][$i][2];
	                $dataexcel[$i-2]['pic'] 			= $data['cells'][$i][3];
	                $dataexcel[$i-2]['id_produk'] 		= $data['cells'][$i][4];
	                $dataexcel[$i-2]['volume'] 			= $data['cells'][$i][5];
	                $dataexcel[$i-2]['harga_satuan'] 	= $data['cells'][$i][6];
	                $dataexcel[$i-2]['total'] 			= $data['cells'][$i][7];
	                $dataexcel[$i-2]['id_user'] 		= $this->session->userdata('bkwopname_user');
	                $dataexcel[$i-2]['tanggal_dibuat'] 	= $this->Dataoe_material_m->getNow();
	               	
				}
				
	            delete_files($upload_data['file_path']);
	            
	            $this->Dataproyek_m->insertData($dataexcel);
	            $this->Dataoe_material_m->insertData($dataexcel);
	            //$data['user'] = $this->User_model->getuser();
			}
			redirect('Dataoe_material');
		}

		public function ubah(){
			$no_rec 		= $this->input->post('no_rec');
			$id_proyek 		= $this->input->post('proyek');
			$volume 		= $this->input->post('volume');
			$harga_satuan	= $this->input->post('harga_satuan');
			$total_harga	= $this->input->post('total_harga');
			$tanggal_update = $this->Dataoe_material_m->getNow();

			$this->Dataoe_material_m->setNo_rec($no_rec);

			$dataoe_material= array(
										'id_project' 		=> $id_proyek,
										'volume'			=> $volume,
										'harga_satuan'		=> $harga_satuan,
										'total_harga'		=> $total_harga,
										'tanggal_update'	=> $tanggal_update
									);

			$ubah	= $this->Dataoe_material_m->ubah($dataoe_material);
			echo $ubah;
		}

		public function hapus(){
			$id 	= $this->input->post('id');
			$this->Dataoe_material_m->setNo_rec($id);

			$hapus	= $this->Dataoe_material_m->hapus();
			echo $hapus;
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