<?php
	/**
	* 
	*/
	class Dataproyek extends CI_Controller{
		
		function __construct(){
			parent:: __construct();

			$this->load->model('Dataproyek_m');
		}

		public function index(){
			$dataproyek 	= $this->Dataproyek_m->getAll();
			if($dataproyek->num_rows() > 0){
				foreach ($dataproyek->result() as $dataproyek_db) {
					$id_proyek[]	= $dataproyek_db->id_proyek;
					$nama_proyek[] 	= $dataproyek_db->nama_proyek;
					$pic[] 			= $dataproyek_db->pic;
					$tgl_dibuat[]	= $dataproyek_db->tanggal_dibuat;
					$tgl_update[]	= $dataproyek_db->tanggal_update;
				}
			}

			$this->load->view('Header_v');
			$this->load->view('Dataproyek_v', array('id_proyek' => $id_proyek, 'nama_proyek' => $nama_proyek, 'pic' => $pic, 'tgl_dibuat' => $tgl_dibuat, 'tgl_update' => $tgl_update));
			$this->load->view('Footer_v');
		}

		public function cek_idproyek(){
			$id 		= $this->input->post('id_proyek');
			$dataproyek = $this->Dataproyek_m->checkDuplicateData($id);
			$jmldata	= $dataproyek->num_rows();

			echo $jmldata;
		}

		public function tambah(){
			$id 			= $this->input->post('id_proyek');
			$nama_proyek	= $this->input->post('nama_proyek');
			$pic 			= $this->input->post('pic');
			$tanggal_dibuat = $this->Dataproyek_m->getNow();

			$dataproyek 	= array(
										'id_proyek'			=> $id,
										'nama_proyek' 		=> $nama_proyek,
										'pic' 				=> $pic,
										'tanggal_dibuat'	=> $tanggal_dibuat
									);

			$tambah 		= $this->Dataproyek_m->tambah($dataproyek);
			echo $tambah;
		}

		public function ubah(){
			$id 			= $this->input->post('id_proyek_temp');
			$nama_proyek	= $this->input->post('nama_proyek');
			$pic 			= $this->input->post('pic');
			$tanggal_update = $this->Dataproyek_m->getNow();
			
			$dataproyek 	= array(
										'nama_proyek' 		=> $nama_proyek,
										'pic' 				=> $pic,
										'tanggal_update'	=> $tanggal_update
									);

			$this->Dataproyek_m->setId_proyek($id);
			$ubah 			= $this->Dataproyek_m->ubah($dataproyek);
			echo $ubah;
		}

		public function hapus(){
			$id 	= $this->input->post('id');
			$this->Dataproyek_m->setId_proyek($id);

			$hapus 	= $this->Dataproyek_m->hapus();
			echo $hapus;
		}
	}
?>