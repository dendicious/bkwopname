<?php
	/**
	* 
	*/
	class Datase_invoice extends CI_Controller{
		
		function __construct(){
			parent::__construct();

			$this->load->model('Datase_invoice_m');
			$this->load->model('Datase_headinvoice_m');
			$this->load->model('Dataproyek_m');
		}

		public function index(){
			$getData 	= $this->Datase_headinvoice_m->getAll();
			if($getData->num_rows() > 0){
				foreach ($getData->result() as $dataheadinvoice) {
					$id_rec[] 			= $dataheadinvoice->id_rec;
					$id_proyek[]		= $dataheadinvoice->id_proyek;
					$total[] 			= $dataheadinvoice->total;
					$tanggal_dibuat[]	= $dataheadinvoice->tanggal_dibuat;
				}
			}

			$this->load->view('Header_v');
			$this->load->view('Datase_invoice_v', array(
															'id_rec'		=> $id_rec,
															'id_proyek'		=> $id_proyek,
															'total'			=> $total,
															'tanggal_dibuat'=> $tanggal_dibuat	
													));			
			$this->load->view('Footer_v');
		}
	}
?>