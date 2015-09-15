<?php
	/**
	* 
	*/
	class Datape_material extends CI_Controller{
		
		function __construct(){
			parent:: __construct();

			$this->load->model('Datape_material_m');
			$this->load->model('Datase_material_m');
			$this->load->model('Dataproyek_m');
		}

		public function index(){
			$getDatase	= $this->Datase_material_m->getAll();
			if($getDatase->num_rows() > 0){
				foreach ($getDatase->result() as $datasedb) {
					$no_rec[] 		= $datasedb->no_rec;
					$id_proyek[] 	= $datasedb->id_project;
					$id_produk[]	= $datasedb->id_produk;
					$volume[]		= $datasedb->volume;
					$harga_satuan[] = $datasedb->harga_satuan;
					$total_harga[]  = $datasedb->total_harga;
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

			$getDatape	= $this->Datape_material_m->getAll();
			if($getDatape->num_rows() > 0){
				foreach ($getDatape->result() as $datapedb) {
					$no_rec_pe[] 		= $datapedb->no_rec;
					$id_proyek_pe[] 	= $datapedb->id_project;
					$id_produk_pe[]		= $datapedb->id_produk;
					$volume_pe[]		= $datapedb->volume;
				}

				for($i=0; $i<count($id_proyek_pe); $i++){
					$this->Dataproyek_m->setId_proyek($id_proyek_pe[$i]);
					$dataproyek_pe 	= $this->Dataproyek_m->getById();
					foreach ($dataproyek_pe->result() as $dataproyek_pedb) {
						$nama_proyek_pe[]	= $dataproyek_pedb->nama_proyek;
						$pic_pe[] 			= $dataproyek_pedb->pic;
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
			$this->load->view('Datase_material_pe_v', array('id_proyek' 		=> $id_proyek, 
															'id_produk'	 		=> $id_produk, 
															'volume' 			=> $volume, 
															'nama_proyek' 		=> $nama_proyek, 
															'pic' 				=> $pic, 
															'no_rec' 			=> $no_rec, 
															'harga_satuan' 		=> $harga_satuan,
															'total_harga' 		=> $total_harga,
															'id_proyek_pe' 		=> $id_proyek_pe,
															'id_produk_pe' 		=> $id_produk_pe, 
															'volume_pe' 		=> $volume_pe, 
															'nama_proyek_pe' 	=> $nama_proyek_pe, 
															'pic_pe' 			=> $pic_pe, 
															'no_rec_pe' 		=> $no_rec_pe, 
															'id_proyekdistinct' => $id_proyek_distinct,
															'notif'				=> 0,
														 	'id'				=> ''
															)
							);
			$this->load->view('Footer_v');
		}

		public function GetJsonDatape_material(){
			$resultJson= '';
			$getDatape	= $this->Datape_material_m->getAll();
			if($getDatape->num_rows() > 0){
				$resultJson = json_encode($getDatape->result());
			}
			else{
				$resultJson =  '{"err":"Tidak dapat menemukan data pada database"}';
			}
			echo $resultJson;
		}

		public function insertDatapeMaterial(){
			$no_rec 		= $this->input->post('no_rec');
			$id_user		= $this->session->userdata('bkwopname_user');
			$id_proyek 		= $this->input->post('id_proyek');
			$id_produk 		= $this->input->post('id_produk');
			$volume 		= $this->input->post('volume');
			$harga_satuan	= $this->input->post('harga_satuan');
			$total_harga	= $this->input->post('total_harga');
			$tanggal_dibuat = $this->Datape_material_m->getNow();

			$datape_material= array(
										'no_rec' 			=> $no_rec,
										'id_user'			=> $id_user,
										'id_proyek'			=> $id_proyek,
										'id_produk'			=> $id_produk,
										'volume'			=> $volume,
										'harga_satuan'		=> $harga_satuan,
										'total_harga'		=> $total_harga,
										'tanggal_dibuat'	=> $tanggal_dibuat
									);

			$this->Datape_material_m->insertSingleData($datape_material);
			echo '{"result":true}';

		}

		public function deleteDataPeMaterial(){
			$no_rec = $this->input->get('no_rec');
			$this->Datape_material_m->setNo_rec($no_rec);
			$this->Datape_material_m->hapus();

			echo '{"result":true}';
		}

		public function DatapeById(){
			$id 		= $this->uri->segment(3);
			$this->Datape_material_m->setId_project($id);
			$jmlData	= $this->Datape_material_m->cekIdProject();
			
			if($jmlData > 0){
				$getDatase	= $this->Datape_material_m->getByIdProject();

				if($getDatase->num_rows() > 0){
					foreach ($getDatase->result() as $datasedb) {
						$no_rec[] 		= $datasedb->no_rec;
						$id_proyek[] 	= $datasedb->id_project;
						$id_produk[]	= $datasedb->id_produk;
						$volume[]		= $datasedb->volume;
						$harga_satuan[] = $datasedb->harga_satuan;
						$total_harga[]  = $datasedb->total_harga;
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

				$getDatape	= $this->Datape_material_m->getAll();
				if($getDatape->num_rows() > 0){
					foreach ($getDatape->result() as $datapedb) {
						$no_rec_pe[] 		= $datapedb->no_rec;
						$id_proyek_pe[] 	= $datapedb->id_project;
						$id_produk_pe[]		= $datapedb->id_produk;
						$volume_pe[]		= $datapedb->volume;
					}

					for($i=0; $i<count($id_proyek_pe); $i++){
						$this->Dataproyek_m->setId_proyek($id_proyek_pe[$i]);
						$dataproyek_pe 	= $this->Dataproyek_m->getById();
						foreach ($dataproyek_pe->result() as $dataproyek_pedb) {
							$nama_proyek_pe[]	= $dataproyek_pedb->nama_proyek;
							$pic_pe[] 			= $dataproyek_pedb->pic;
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
				$this->load->view('Datase_material_pe_v', array('id_proyek' 		=> $id_proyek, 
																'id_produk'	 		=> $id_produk, 
																'volume' 			=> $volume, 
																'nama_proyek' 		=> $nama_proyek, 
																'pic' 				=> $pic, 
																'no_rec' 			=> $no_rec, 
																'harga_satuan' 		=> $harga_satuan,
																'total_harga' 		=> $total_harga,
																'id_proyek_pe' 		=> $id_proyek_pe,
																'id_produk_pe' 		=> $id_produk_pe, 
																'volume_pe' 		=> $volume_pe, 
																'nama_proyek_pe' 	=> $nama_proyek_pe, 
																'pic_pe' 			=> $pic_pe, 
																'no_rec_pe' 		=> $no_rec_pe, 
																'id_proyekdistinct' => $id_proyek_distinct,
																'notif'				=> 0,
															 	'id'				=> $id
																)
								);
				$this->load->view('Footer_v');
		}
		else{
			$getDatase	= $this->Datase_material_m->getAll();
			if($getDatase->num_rows() > 0){
				foreach ($getDatase->result() as $datasedb) {
					$no_rec[] 		= $datasedb->no_rec;
					$id_proyek[] 	= $datasedb->id_project;
					$id_produk[]	= $datasedb->id_produk;
					$volume[]		= $datasedb->volume;
					$harga_satuan[] = $datasedb->harga_satuan;
					$total_harga[]  = $datasedb->total_harga;
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

			$getDatape	= $this->Datape_material_m->getAll();
			if($getDatape->num_rows() > 0){
				foreach ($getDatape->result() as $datapedb) {
					$no_rec_pe[] 		= $datapedb->no_rec;
					$id_proyek_pe[] 	= $datapedb->id_project;
					$id_produk_pe[]		= $datapedb->id_produk;
					$volume_pe[]		= $datapedb->volume;
				}

				for($i=0; $i<count($id_proyek_pe); $i++){
					$this->Dataproyek_m->setId_proyek($id_proyek_pe[$i]);
					$dataproyek_pe 	= $this->Dataproyek_m->getById();
					foreach ($dataproyek_pe->result() as $dataproyek_pedb) {
						$nama_proyek_pe[]	= $dataproyek_pedb->nama_proyek;
						$pic_pe[] 			= $dataproyek_pedb->pic;
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
			$this->load->view('Datase_material_pe_v', array('id_proyek' 		=> $id_proyek, 
															'id_produk'	 		=> $id_produk, 
															'volume' 			=> $volume, 
															'nama_proyek' 		=> $nama_proyek, 
															'pic' 				=> $pic, 
															'no_rec' 			=> $no_rec, 
															'harga_satuan' 		=> $harga_satuan,
															'total_harga' 		=> $total_harga,
															'id_proyek_pe' 		=> $id_proyek_pe,
															'id_produk_pe' 		=> $id_produk_pe, 
															'volume_pe' 		=> $volume_pe, 
															'nama_proyek_pe' 	=> $nama_proyek_pe, 
															'pic_pe' 			=> $pic_pe, 
															'no_rec_pe' 		=> $no_rec_pe, 
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