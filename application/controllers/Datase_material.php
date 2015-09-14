<?php
	/**
	* 
	*/
	class Datase_material extends CI_Controller{
		
		function __construct(){
			parent::__construct();

			$this->load->model('Datase_material_m');
			$this->load->model('Dataproyek_m');
		}

		public function index(){
			$datase 	= $this->Datase_material_m->getAll();
			if($datase->num_rows() > 0){
				foreach ($datase->result() as $datase_db) {
					$no_rec[] 		= $datase_db->no_rec;
					$id_proyek[] 	= $datase_db->id_project;
					$id_produk[]	= $datase_db->id_produk;
					$volume[]		= $datase_db->volume;
					$harga_satuan[]	= $datase_db->harga_satuan;
					$total_harga[] 	= $datase_db->total_harga;
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
			$this->load->view('Datase_material_v', array('id_proyek' => $id_proyek,
														 'id_produk' => $id_produk, 
														 'volume' => $volume, 
														 'nama_proyek' => $nama_proyek, 
														 'pic' => $pic, 
														 'no_rec' => $no_rec, 
														 'harga_satuan' => $harga_satuan, 
														 'total_harga' => $total_harga, 
														 'idproyek_dataproyek' => $idproyek_dataproyek, 
														 'namaproyek_dataproyek' => $namaproyek_dataproyek)
														);
			$this->load->view('Footer_v');
		}

		public function ubah(){
			$no_rec 		= $this->input->post('no_rec');
			$id_proyek 		= $this->input->post('proyek');
			$volume 		= $this->input->post('volume');
			$harga_satuan	= $this->input->post('harga_satuan');
			$total_harga	= $this->input->post('total_harga');
			$tanggal_update = $this->Datase_material_m->getNow();

			$this->Datase_material_m->setNo_rec($no_rec);

			$datase_material= array(
										'id_project' 		=> $id_proyek,
										'volume'			=> $volume,
										'harga_satuan'		=> $harga_satuan,
										'total_harga'		=> $total_harga,
										'tanggal_update'	=> $tanggal_update
									);

			$ubah	= $this->Datase_material_m->ubah($datase_material);
			echo $ubah;
		}

		public function hapus(){
			$id 	= $this->input->post('id');
			$this->Datase_material_m->setNo_rec($id);

			$hapus	= $this->Datase_material_m->hapus();
			echo $hapus;
		}
	}
?>