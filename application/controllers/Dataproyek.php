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
	}
?>