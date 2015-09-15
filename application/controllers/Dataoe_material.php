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
			$this->load->model('Datase_material_m');
			

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
			$this->load->view('Dataoe_material_v', array('id_proyek' 				=> $id_proyek,
														 'id_produk' 				=> $id_produk, 
														 'volume' 					=> $volume, 
														 'nama_proyek' 				=> $nama_proyek, 
														 'pic' 						=> $pic, 
														 'no_rec' 					=> $no_rec, 
														 'harga_satuan' 			=> $harga_satuan, 
														 'total_harga' 				=> $total_harga, 
														 'idproyek_dataproyek' 		=> $idproyek_dataproyek, 
														 'namaproyek_dataproyek'	=> $namaproyek_dataproyek)
														);
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
					$harga_satuan[] = $dataoedb->harga_satuan;
					$total_harga[]  = $dataoedb->total_harga;
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

			$getDatase	= $this->Datase_material_m->getAll();
			if($getDatase->num_rows() > 0){
				foreach ($getDatase->result() as $datasedb) {
					$no_rec_se[] 		= $datasedb->no_rec;
					$id_proyek_se[] 	= $datasedb->id_project;
					$id_produk_se[]		= $datasedb->id_produk;
					$volume_se[]		= $datasedb->volume;
					// $harga_satuan_se[]	= $datasedb->harga_satuan;
					// $total_harga_se[] 	= $datasedb->total_harga;
				}

				for($i=0; $i<count($id_proyek_se); $i++){
					$this->Dataproyek_m->setId_proyek($id_proyek_se[$i]);
					$dataproyek_se 	= $this->Dataproyek_m->getById();
					foreach ($dataproyek_se->result() as $dataproyek_sedb) {
						$nama_proyek_se[]	= $dataproyek_sedb->nama_proyek;
						$pic_se[] 			= $dataproyek_sedb->pic;
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
			$this->load->view('Dataoe_material_se_v', array('id_proyek' 		=> $id_proyek, 
															'id_produk'	 		=> $id_produk, 
															'volume' 			=> $volume, 
															'nama_proyek' 		=> $nama_proyek, 
															'pic' 				=> $pic, 
															'no_rec' 			=> $no_rec, 
															'harga_satuan' 		=> $harga_satuan,
															'total_harga' 		=> $total_harga,
															'id_proyek_se' 		=> $id_proyek_se,
															'id_produk_se' 		=> $id_produk_se, 
															'volume_se' 		=> $volume_se, 
															'nama_proyek_se' 	=> $nama_proyek_se, 
															'pic_se' 			=> $pic_se, 
															'no_rec_se' 		=> $no_rec_se, 
															'id_proyekdistinct' => $id_proyek_distinct,
															'notif'				=> 0,
														 	'id'				=> ''
															)
							);
			$this->load->view('Footer_v');
		}

		public function GetJsonDatase_material(){
			$resultJson= '';
			$getDatase	= $this->Datase_material_m->getAll();
			if($getDatase->num_rows() > 0){
				$resultJson = json_encode($getDatase->result());
			}
			else{
				$resultJson =  '{"err":"Tidak dapat menemukan data pada database"}';
			}
			echo $resultJson;
		}

		public function insertDataseMaterial(){
			$no_rec 		= $this->input->post('no_rec');
			$id_user		= $this->session->userdata('bkwopname_user');
			$id_proyek 		= $this->input->post('id_proyek');
			$id_produk 		= $this->input->post('id_produk');
			$volume 		= $this->input->post('volume');
			$harga_satuan	= $this->input->post('harga_satuan');
			$total_harga	= $this->input->post('total_harga');
			$tanggal_dibuat = $this->Datase_material_m->getNow();

			$datase_material= array(
										'no_rec' 			=> $no_rec,
										'id_user'			=> $id_user,
										'id_proyek'			=> $id_proyek,
										'id_produk'			=> $id_produk,
										'volume'			=> $volume,
										'harga_satuan'		=> $harga_satuan,
										'total_harga'		=> $total_harga,
										'tanggal_dibuat'	=> $tanggal_dibuat
									);

			$this->Datase_material_m->insertSingleData($datase_material);
			echo '{"result":true}';

		}

		public function deleteDataSeMaterial(){
			$no_rec = $this->input->get('no_rec');
			$this->Datase_material_m->setNo_rec($no_rec);
			$this->Datase_material_m->hapus();

			echo '{"result":true}';
		}
		
		public function DataoeById(){
			$id 		= $this->uri->segment(3);
			$this->Dataoe_material_m->setId_project($id);
			$jmlData	= $this->Dataoe_material_m->cekIdProject();
			
			if($jmlData > 0){
				$getDataoe 	= $this->Dataoe_material_m->getByIdProject();

				if($getDataoe->num_rows() > 0){
					foreach ($getDataoe->result() as $dataoedb) {
						$no_rec[] 		= $dataoedb->no_rec;
						$id_proyek[] 	= $dataoedb->id_project;
						$id_produk[]	= $dataoedb->id_produk;
						$volume[]		= $dataoedb->volume;
						$harga_satuan[] = $dataoedb->harga_satuan;
						$total_harga[]  = $dataoedb->total_harga;
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

				$getDatase	= $this->Datase_material_m->getAll();
				if($getDatase->num_rows() > 0){
					foreach ($getDatase->result() as $datasedb) {
						$no_rec_se[] 		= $datasedb->no_rec;
						$id_proyek_se[] 	= $datasedb->id_project;
						$id_produk_se[]		= $datasedb->id_produk;
						$volume_se[]		= $datasedb->volume;
						// $harga_satuan_se[]	= $datasedb->harga_satuan;
						// $total_harga_se[] 	= $datasedb->total_harga;
					}

					for($i=0; $i<count($id_proyek_se); $i++){
						$this->Dataproyek_m->setId_proyek($id_proyek_se[$i]);
						$dataproyek_se 	= $this->Dataproyek_m->getById();
						foreach ($dataproyek_se->result() as $dataproyek_sedb) {
							$nama_proyek_se[]	= $dataproyek_sedb->nama_proyek;
							$pic_se[] 			= $dataproyek_sedb->pic;
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
				$this->load->view('Dataoe_material_se_v', array('id_proyek' 		=> $id_proyek, 
																'id_produk'	 		=> $id_produk, 
																'volume' 			=> $volume, 
																'nama_proyek' 		=> $nama_proyek, 
																'pic' 				=> $pic, 
																'no_rec' 			=> $no_rec, 
																'harga_satuan' 		=> $harga_satuan,
																'total_harga' 		=> $total_harga,
																'id_proyek_se' 		=> $id_proyek_se,
																'id_produk_se' 		=> $id_produk_se, 
																'volume_se' 		=> $volume_se, 
																'nama_proyek_se' 	=> $nama_proyek_se, 
																'pic_se' 			=> $pic_se, 
																'no_rec_se' 		=> $no_rec_se, 
																'id_proyekdistinct' => $id_proyek_distinct,
																'id'				=> $id,
																'notif'				=> 0
																)
								);
				$this->load->view('Footer_v');
		}
		else{
			$getDataoe	= $this->Dataoe_material_m->getAll();
			if($getDataoe->num_rows() > 0){
				foreach ($getDataoe->result() as $dataoedb) {
					$no_rec[] 		= $dataoedb->no_rec;
					$id_proyek[] 	= $dataoedb->id_project;
					$id_produk[]	= $dataoedb->id_produk;
					$volume[]		= $dataoedb->volume;
					$harga_satuan[] = $dataoedb->harga_satuan;
					$total_harga[]  = $dataoedb->total_harga;
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

			$getDatase	= $this->Datase_material_m->getAll();
			if($getDatase->num_rows() > 0){
				foreach ($getDatase->result() as $datasedb) {
					$no_rec_se[] 		= $datasedb->no_rec;
					$id_proyek_se[] 	= $datasedb->id_project;
					$id_produk_se[]		= $datasedb->id_produk;
					$volume_se[]		= $datasedb->volume;
					// $harga_satuan_se[]	= $datasedb->harga_satuan;
					// $total_harga_se[] 	= $datasedb->total_harga;
				}

				for($i=0; $i<count($id_proyek_se); $i++){
					$this->Dataproyek_m->setId_proyek($id_proyek_se[$i]);
					$dataproyek_se 	= $this->Dataproyek_m->getById();
					foreach ($dataproyek_se->result() as $dataproyek_sedb) {
						$nama_proyek_se[]	= $dataproyek_sedb->nama_proyek;
						$pic_se[] 			= $dataproyek_sedb->pic;
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
			$this->load->view('Dataoe_material_se_v', array('id_proyek' 		=> $id_proyek, 
															'id_produk'	 		=> $id_produk, 
															'volume' 			=> $volume, 
															'nama_proyek' 		=> $nama_proyek, 
															'pic' 				=> $pic, 
															'no_rec' 			=> $no_rec, 
															'harga_satuan' 		=> $harga_satuan,
															'total_harga' 		=> $total_harga,
															'id_proyek_se' 		=> $id_proyek_se,
															'id_produk_se' 		=> $id_produk_se, 
															'volume_se' 		=> $volume_se, 
															'nama_proyek_se' 	=> $nama_proyek_se, 
															'pic_se' 			=> $pic_se, 
															'no_rec_se' 		=> $no_rec_se, 
															'id_proyekdistinct' => $id_proyek_distinct,
															'notif'				=> 1,
														 	'id'				=> ''
															)
							);
			$this->load->view('Footer_v');
		}
	}
}
?>