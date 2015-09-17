<?php
	/**
	* 
	*/
	class Datasm_material extends CI_Controller{
		
		function __construct(){
			parent:: __construct();

			$this->load->model('Datasm_material_m');
			$this->load->model('Dataproyek_m');
			$this->load->model('Datape_material_m');
		}

		public function index(){
			$getDatape	= $this->Datape_material_m->getAll();
			if($getDatape->num_rows() > 0){
				foreach ($getDatape->result() as $datapedb) {
					$no_rec[] 		= $datapedb->no_rec;
					$id_proyek[] 	= $datapedb->id_project;
					$id_produk[]	= $datapedb->id_produk;
					$volume[]		= $datapedb->volume;
					$harga_satuan[] = $datapedb->harga_satuan;
					$total_harga[]  = $datapedb->total_harga;
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

			$getDatasm	= $this->Datasm_material_m->getAll();
			if($getDatasm->num_rows() > 0){
				foreach ($getDatasm->result() as $datasmdb) {
					$no_rec_sm[] 		= $datasmdb->no_rec;
					$id_proyek_sm[] 	= $datasmdb->id_project;
					$id_produk_sm[]		= $datasmdb->id_produk;
					$volume_sm[]		= $datasmdb->volume;
				}

				for($i=0; $i<count($id_proyek_sm); $i++){
					$this->Dataproyek_m->setId_proyek($id_proyek_sm[$i]);
					$dataproyek_sm 	= $this->Dataproyek_m->getById();
					foreach ($dataproyek_sm->result() as $dataproyek_smdb) {
						$nama_proyek_sm[]	= $dataproyek_smdb->nama_proyek;
						$pic_sm[] 			= $dataproyek_smdb->pic;
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
			$this->load->view('Datape_material_sm_v', array('id_proyek' 		=> $id_proyek, 
															'id_produk'	 		=> $id_produk, 
															'volume' 			=> $volume, 
															'nama_proyek' 		=> $nama_proyek, 
															'pic' 				=> $pic, 
															'no_rec' 			=> $no_rec, 
															'harga_satuan' 		=> $harga_satuan,
															'total_harga' 		=> $total_harga,
															'id_proyek_sm' 		=> $id_proyek_sm,
															'id_produk_sm' 		=> $id_produk_sm, 
															'volume_sm' 		=> $volume_sm, 
															'nama_proyek_sm' 	=> $nama_proyek_sm, 
															'pic_sm' 			=> $pic_sm, 
															'no_rec_sm' 		=> $no_rec_sm, 
															'id_proyekdistinct' => $id_proyek_distinct,
															'notif'				=> 0,
														 	'id'				=> ''
															)
							);
			$this->load->view('Footer_v');
		}

		public function GetJsonDatasm_material(){
			$resultJson= '';
			$getDatasm	= $this->Datasm_material_m->getAll();
			if($getDatasm->num_rows() > 0){
				$resultJson = json_encode($getDatasm->result());
			}
			else{
				$resultJson =  '{"err":"Tidak dapat menemukan data pada database"}';
			}
			echo $resultJson;
		}

		public function insertDatasmMaterial(){
			$no_rec 		= $this->input->post('no_rec');
			$id_user		= $this->session->userdata('bkwopname_user');
			$id_proyek 		= $this->input->post('id_proyek');
			$id_produk 		= $this->input->post('id_produk');
			$volume 		= $this->input->post('volume');
			$harga_satuan	= $this->input->post('harga_satuan');
			$total_harga	= $this->input->post('total_harga');
			$tanggal_dibuat = $this->Datasm_material_m->getNow();

			$datasm_material= array(
										'no_rec' 			=> $no_rec,
										'id_user'			=> $id_user,
										'id_proyek'			=> $id_proyek,
										'id_produk'			=> $id_produk,
										'volume'			=> $volume,
										'harga_satuan'		=> $harga_satuan,
										'total_harga'		=> $total_harga,
										'tanggal_dibuat'	=> $tanggal_dibuat
									);

			$this->Datasm_material_m->insertSingleData($datasm_material);
			echo '{"result":true}';

		}

		public function deleteDatasmMaterial(){
			$no_rec = $this->input->get('no_rec');
			$this->Datasm_material_m->setNo_rec($no_rec);
			$this->Datasm_material_m->hapus();

			echo '{"result":true}';
		}

		public function DatasmById(){
			$id 		= $this->uri->segment(3);
			$this->Datasm_material_m->setId_project($id);
			$jmlData	= $this->Datasm_material_m->cekIdProject();
			
			if($jmlData > 0){
				$getDatase	= $this->Datasm_material_m->getByIdProject();
				if($getDatape->num_rows() > 0){
				foreach ($getDatape->result() as $datapedb) {
					$no_rec[] 		= $datapedb->no_rec;
					$id_proyek[] 	= $datapedb->id_project;
					$id_produk[]	= $datapedb->id_produk;
					$volume[]		= $datapedb->volume;
					$harga_satuan[] = $datapedb->harga_satuan;
					$total_harga[]  = $datapedb->total_harga;
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

			$getDatasm	= $this->Datasm_material_m->getAll();
			if($getDatasm->num_rows() > 0){
				foreach ($getDatasm->result() as $datasmdb) {
					$no_rec_sm[] 		= $datasmdb->no_rec;
					$id_proyek_sm[] 	= $datasmdb->id_project;
					$id_produk_sm[]		= $datasmdb->id_produk;
					$volume_sm[]		= $datasmdb->volume;
				}

				for($i=0; $i<count($id_proyek_sm); $i++){
					$this->Dataproyek_m->setId_proyek($id_proyek_sm[$i]);
					$dataproyek_sm 	= $this->Dataproyek_m->getById();
					foreach ($dataproyek_sm->result() as $dataproyek_smdb) {
						$nama_proyek_sm[]	= $dataproyek_smdb->nama_proyek;
						$pic_sm[] 			= $dataproyek_smdb->pic;
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
			$this->load->view('Datape_material_sm_v', array('id_proyek' 		=> $id_proyek, 
															'id_produk'	 		=> $id_produk, 
															'volume' 			=> $volume, 
															'nama_proyek' 		=> $nama_proyek, 
															'pic' 				=> $pic, 
															'no_rec' 			=> $no_rec, 
															'harga_satuan' 		=> $harga_satuan,
															'total_harga' 		=> $total_harga,
															'id_proyek_sm' 		=> $id_proyek_sm,
															'id_produk_sm' 		=> $id_produk_sm, 
															'volume_sm' 		=> $volume_sm, 
															'nama_proyek_sm' 	=> $nama_proyek_sm, 
															'pic_sm' 			=> $pic_sm, 
															'no_rec_sm' 		=> $no_rec_sm, 
															'id_proyekdistinct' => $id_proyek_distinct,
															'notif'				=> 0,
														 	'id'				=> $id
															)
							);
			$this->load->view('Footer_v');
		}
		else{
			$getDatape	= $this->Datape_material_m->getAll();
			if($getDatape->num_rows() > 0){
				foreach ($getDatape->result() as $datapedb) {
					$no_rec[] 		= $datapedb->no_rec;
					$id_proyek[] 	= $datapedb->id_project;
					$id_produk[]	= $datapedb->id_produk;
					$volume[]		= $datapedb->volume;
					$harga_satuan[] = $datapedb->harga_satuan;
					$total_harga[]  = $datapedb->total_harga;
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

			$getDatasm	= $this->Datasm_material_m->getAll();
			if($getDatasm->num_rows() > 0){
				foreach ($getDatasm->result() as $datasmdb) {
					$no_rec_sm[] 		= $datasmdb->no_rec;
					$id_proyek_sm[] 	= $datasmdb->id_project;
					$id_produk_sm[]		= $datasmdb->id_produk;
					$volume_sm[]		= $datasmdb->volume;
				}

				for($i=0; $i<count($id_proyek_sm); $i++){
					$this->Dataproyek_m->setId_proyek($id_proyek_sm[$i]);
					$dataproyek_sm 	= $this->Dataproyek_m->getById();
					foreach ($dataproyek_sm->result() as $dataproyek_smdb) {
						$nama_proyek_sm[]	= $dataproyek_smdb->nama_proyek;
						$pic_sm[] 			= $dataproyek_smdb->pic;
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
			$this->load->view('Datape_material_sm_v', array('id_proyek' 		=> $id_proyek, 
															'id_produk'	 		=> $id_produk, 
															'volume' 			=> $volume, 
															'nama_proyek' 		=> $nama_proyek, 
															'pic' 				=> $pic, 
															'no_rec' 			=> $no_rec, 
															'harga_satuan' 		=> $harga_satuan,
															'total_harga' 		=> $total_harga,
															'id_proyek_sm' 		=> $id_proyek_sm,
															'id_produk_sm' 		=> $id_produk_sm, 
															'volume_sm' 		=> $volume_sm, 
															'nama_proyek_sm' 	=> $nama_proyek_sm, 
															'pic_sm' 			=> $pic_sm, 
															'no_rec_sm' 		=> $no_rec_sm, 
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