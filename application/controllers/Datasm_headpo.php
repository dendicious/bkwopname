<?php
	/**
	* 
	*/
	class Datasm_headpo extends CI_Controller{
		
		function __construct(){
			parent:: __construct();

			$this->load->model('Datasm_headpo_m');
			$this->load->model('Datasm_material_m');
			$this->load->model('Datasm_material_temp_m');
			$this->load->model('Dataproyek_m');
			$this->load->model('Datase_invoice_m');
			$this->load->model('Datase_headinvoice_m');
		}

		public function index(){
			$datasm_material 	= $this->Datasm_material_m->getAll();
			if($datasm_material->num_rows() > 0){
				foreach ($datasm_material->result() as $datasmdb) {
					$no_rec[] 			= $datasmdb->no_rec;
					$id_proyek[] 		= $datasmdb->id_project;
					$id_produk[]		= $datasmdb->id_produk;
					$volume[]			= $datasmdb->volume;
					$harga_satuan[] 	= $datasmdb->harga_satuan;
					$total_harga[]  	= $datasmdb->total_harga;
					$tanggal_dibuat[]	= $datasmdb->tanggal_dibuat;
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
			$this->load->view('Datasm_headpo_v', array(
															'id_proyek' 		=> $id_proyek, 
															'id_produk'	 		=> $id_produk, 
															'volume' 			=> $volume, 
															'nama_proyek' 		=> $nama_proyek, 
															'pic' 				=> $pic, 
															'no_rec' 			=> $no_rec, 
															'harga_satuan' 		=> $harga_satuan,
															'total_harga' 		=> $total_harga,
															'tanggal_dibuat'	=> $tanggal_dibuat,
															'id_proyekdistinct' => $id_proyek_distinct,
															'notif'				=> 0,
														 	'id'				=> ''
														)
								);
			$this->load->view('Footer_v');
		}

		public function DatasmById(){
			$id 		= $this->uri->segment(3);
			$this->Datasm_material_m->setId_project($id);
			$jmlData 	=$this->Datasm_material_m->cekIdProject();

			if($jmlData > 0){
				$datasm_material 	= $this->Datasm_material_m->getByIdProject();
				if($datasm_material->num_rows() > 0){
					foreach ($datasm_material->result() as $datasmdb) {
						$no_rec[] 			= $datasmdb->no_rec;
						$id_proyek[] 		= $datasmdb->id_project;
						$id_produk[]		= $datasmdb->id_produk;
						$volume[]			= $datasmdb->volume;
						$harga_satuan[] 	= $datasmdb->harga_satuan;
						$total_harga[]  	= $datasmdb->total_harga;
						$tanggal_dibuat[]	= $datasmdb->tanggal_dibuat;
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
				$this->load->view('Datasm_headpo_v', array(
																'id_proyek' 		=> $id_proyek, 
																'id_produk'	 		=> $id_produk, 
																'volume' 			=> $volume, 
																'nama_proyek' 		=> $nama_proyek, 
																'pic' 				=> $pic, 
																'no_rec' 			=> $no_rec, 
																'harga_satuan' 		=> $harga_satuan,
																'total_harga' 		=> $total_harga,
																'tanggal_dibuat'	=> $tanggal_dibuat,
																'id_proyekdistinct' => $id_proyek_distinct,
																'notif'				=> 0,
															 	'id'				=> $id
															)
									);
				$this->load->view('Footer_v');
			}
			else{
				$datasm_material 	= $this->Datasm_material_m->getAll();
				if($datasm_material->num_rows() > 0){
					foreach ($datasm_material->result() as $datasmdb) {
						$no_rec[] 			= $datasmdb->no_rec;
						$id_proyek[] 		= $datasmdb->id_project;
						$id_produk[]		= $datasmdb->id_produk;
						$volume[]			= $datasmdb->volume;
						$harga_satuan[] 	= $datasmdb->harga_satuan;
						$total_harga[]  	= $datasmdb->total_harga;
						$tanggal_dibuat[]	= $datasmdb->tanggal_dibuat;
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
				$this->load->view('Datasm_headpo_v', array(
																'id_proyek' 		=> $id_proyek, 
																'id_produk'	 		=> $id_produk, 
																'volume' 			=> $volume, 
																'nama_proyek' 		=> $nama_proyek, 
																'pic' 				=> $pic, 
																'no_rec' 			=> $no_rec, 
																'harga_satuan' 		=> $harga_satuan,
																'total_harga' 		=> $total_harga,
																'tanggal_dibuat'	=> $tanggal_dibuat,
																'id_proyekdistinct' => $id_proyek_distinct,
																'notif'				=> 1,
															 	'id'				=> ''
															)
									);
				$this->load->view('Footer_v');
			}
		}

		public function Dataproyeksm(){
			$getData 	= $this->Datasm_material_m->getProjectsm();
			if($getData->num_rows() > 0){
				foreach ($getData->result() as $projeksmdb) {
					$id_project[] 	= $projeksmdb->id_project;
				}

				for($i=0; $i<count($id_project); $i++){
					$this->Dataproyek_m->setId_proyek($id_project[$i]);
					$dataproyek 	= $this->Dataproyek_m->getById();
					foreach ($dataproyek->result() as $dataproyekdb) {
						$nama_proyek[]		= $dataproyekdb->nama_proyek;
						$pic[] 				= $dataproyekdb->pic;
						$tanggal_dibuat[]	= $dataproyekdb->tanggal_dibuat;
					}
				}				
			}

			$this->load->view('Header_v');
			$this->load->view('Dataproyeksm_v', array(
														'id_project'	=> $id_project,
														'id_proyek'		=> $id_project,
														'nama_proyek'	=> $nama_proyek,
														'pic'			=> $pic,
														'tanggal_dibuat'=> $tanggal_dibuat,
														'id'			=> ''
														)
							);
			$this->load->view('Footer_v');
		}

		public function DataproyeksmById(){
			$id 	= $this->uri->segment(3);
			$this->Dataproyek_m->setId_proyek($id);

			$getData 	= $this->Dataproyek_m->getProjectById();
			if($getData->num_rows() > 0){
				foreach ($getData->result() as $projeksmdb) {
					$id_proyek[] 		= $projeksmdb->id_proyek;
					$nama_proyek[]		= $projeksmdb->nama_proyek;
					$pic[] 				= $projeksmdb->pic;
					$tanggal_dibuat[]	= $projeksmdb->tanggal_dibuat;
				}				
			}

			$getDataProyek 	= $this->Datasm_material_m->getProjectsm();
			if($getDataProyek->num_rows() > 0){
				foreach ($getDataProyek->result() as $projeksm) {
					$id_project[] 	= $projeksm->id_project;
				}
			}

			$this->load->view('Header_v');
			$this->load->view('Dataproyeksm_v', array(
														'id_project'	=> $id_project,
														'id_proyek'		=> $id_proyek,
														'nama_proyek'	=> $nama_proyek,
														'pic'			=> $pic,
														'tanggal_dibuat'=> $tanggal_dibuat,
														'id'			=> $id
														)
							);
			$this->load->view('Footer_v');
		}

		public function DatasmByDate(){
			$idproject 		= $this->uri->segment(3);
			$datemin 		= $this->uri->segment(4);
			$datemax 		= $this->uri->segment(5);

			$this->Datasm_material_m->setId_project($idproject);

			if($datemax == '' || $datemax == 0){
				$datemax = $this->Datasm_material_m->getNow();
			}
			else if($datemin == '' || $datemin == 0){
				$datemin = $this->Datasm_material_m->getNow();
			}

			$thn_max	= substr($datemax,0,4);
			$bln_max	= substr($datemax,5,2);
			$tgl_max	= substr($datemax,8,2)+1;
			if($tgl_max < 9){
				$tgl_max	= "0" . $tgl_max;
			}
			$datemax	= $thn_max . "-" . $bln_max . "-" . $tgl_max;
			
			$datasm_material 	=$this->Datasm_material_m->DatasmByDate($datemin, $datemax);

			if($datasm_material->num_rows() > 0){
				if($datasm_material->num_rows() > 0){
					foreach ($datasm_material->result() as $datasmdb) {
						$no_rec[] 			= $datasmdb->no_rec;
						$id_proyek[] 		= $datasmdb->id_project;
						$id_produk[]		= $datasmdb->id_produk;
						$volume[]			= $datasmdb->volume;
						$harga_satuan[] 	= $datasmdb->harga_satuan;
						$total_harga[]  	= $datasmdb->total_harga;
						$tanggal_dibuat[]	= $datasmdb->tanggal_dibuat;
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
				$this->load->view('Datasm_headpo_v', array(
																'id_proyek' 		=> $id_proyek, 
																'id_produk'	 		=> $id_produk, 
																'volume' 			=> $volume, 
																'nama_proyek' 		=> $nama_proyek, 
																'pic' 				=> $pic, 
																'no_rec' 			=> $no_rec, 
																'harga_satuan' 		=> $harga_satuan,
																'total_harga' 		=> $total_harga,
																'tanggal_dibuat'	=> $tanggal_dibuat,
																'id_proyekdistinct' => $id_proyek_distinct,
																'notif'				=> 0,
															 	'id'				=> $idproject
															)
									);
				$this->load->view('Footer_v');
			}
			else{
				$datasm_material 	= $this->Datasm_material_m->getAll();
				if($datasm_material->num_rows() > 0){
					foreach ($datasm_material->result() as $datasmdb) {
						$no_rec[] 			= $datasmdb->no_rec;
						$id_proyek[] 		= $datasmdb->id_project;
						$id_produk[]		= $datasmdb->id_produk;
						$volume[]			= $datasmdb->volume;
						$harga_satuan[] 	= $datasmdb->harga_satuan;
						$total_harga[]  	= $datasmdb->total_harga;
						$tanggal_dibuat[]	= $datasmdb->tanggal_dibuat;
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
				$this->load->view('Datasm_headpo_v', array(
																'id_proyek' 		=> $id_proyek, 
																'id_produk'	 		=> $id_produk, 
																'volume' 			=> $volume, 
																'nama_proyek' 		=> $nama_proyek, 
																'pic' 				=> $pic, 
																'no_rec' 			=> $no_rec, 
																'harga_satuan' 		=> $harga_satuan,
																'total_harga' 		=> $total_harga,
																'tanggal_dibuat'	=> $tanggal_dibuat,
																'id_proyekdistinct' => $id_proyek_distinct,
																'notif'				=> 1,
															 	'id'				=> ''
															)
									);
				$this->load->view('Footer_v');
			}
		}

		public function GetJsonDatasm_material_temp(){
			$id 		= $this->uri->segment(3);
			$this->Datasm_material_temp_m->setId_project($id);
			$resultJson	= '';
			$getDatasm	= $this->Datasm_material_temp_m->getByIdProject();
			if($getDatasm->num_rows() > 0){
				$resultJson = json_encode($getDatasm->result());
			}
			else{
				$resultJson =  '{"err":"Tidak dapat menemukan data pada database"}';
			}
			echo $resultJson;
		}

		public function insertDatasmtemp(){
			$no_rec 		= $this->input->post('no_rec');
			$id_user		= $this->session->userdata('bkwopname_user');
			$id_proyek 		= $this->input->post('id_proyek');
			$id_produk 		= $this->input->post('id_produk');
			$volume 		= $this->input->post('volume');
			$harga_satuan	= $this->input->post('harga_satuan');
			$total_harga	= $this->input->post('total_harga');
			$tanggal_dibuat = $this->input->post('tanggal_dibuat');

			$datasm_material= array(
										'no_rec' 			=> $no_rec,
										'id_user'			=> $id_user,
										'id_project'		=> $id_proyek,
										'id_produk'			=> $id_produk,
										'volume'			=> $volume,
										'harga_satuan'		=> $harga_satuan,
										'total_harga'		=> $total_harga,
										'tanggal_dibuat'	=> $tanggal_dibuat
									);

			$this->Datasm_material_temp_m->insertSingleData($datasm_material);
			echo '{"result":true}';
		}

		public function GetJsonDatase_invoice(){
			$id 		= $this->uri->segment(3);
			$this->Datase_invoice_m->setId_project($id);
			$resultJson	= '';
			$getDatase	= $this->Datase_invoice_m->getByIdProject();
			if($getDatase->num_rows() > 0){
				$resultJson = json_encode($getDatase->result());
			}
			else{
				$resultJson =  '{"err":"Tidak dapat menemukan data pada database"}';
			}
			echo $resultJson;
		}

		public function deleteDatatemp(){
			$no_rec 	= $this->input->post('no_rec');
			$idproject 	= $this->input->post('idproject');
			$this->Datasm_material_temp_m->setNo_rec($no_rec);
			$this->Datasm_material_temp_m->setId_project($idproject);
			$this->Datasm_material_temp_m->hapus();

			echo '{"result":true}';
		}

		public function tambahDataseInvoice(){
			$id_user		= $this->session->userdata('bkwopname_user');
			$id_proyek 		= $this->input->post('id_proyek');
			$this->Datase_invoice_m->setId_project($id_proyek);
			$this->Datasm_material_temp_m->setId_project($id_proyek);
			$no_invoice 	= $this->Datase_invoice_m->getMaxId();

			$data = Array();

			$datatemp 		= $this->Datasm_material_temp_m->getByIdProject();
			if($datatemp->num_rows() > 0){
				foreach ($datatemp->result() as $tempdb) {
					$no_rec[] 			= $tempdb->no_rec;
					$id_produk[] 		= $tempdb->id_produk;
					$volume[]			= $tempdb->volume;
					$harga_satuan[]		= $tempdb->harga_satuan;
					$total_harga[]		= $tempdb->total_harga;
					$tanggal_dibuat[]	= $tempdb->tanggal_dibuat;
				}

				for ($i = 0; $i < count($id_produk) ; $i++) {
					$data[$i]['no_rec']				= $no_rec[$i];
					$data[$i]['no_invoice']			= $no_invoice;
					$data[$i]['id_user']			= $id_user;
					$data[$i]['id_project']			= $id_proyek;
					$data[$i]['id_produk']			= $id_produk[$i];
					$data[$i]['volume']				= $volume[$i];
					$data[$i]['harga_satuan']		= $harga_satuan[$i];
					$data[$i]['total_harga']		= $total_harga[$i];
					$data[$i]['tanggal_dibuat']		= $tanggal_dibuat[$i];
				}

				$this->Datase_invoice_m->insertData($data);
				$this->Datasm_material_temp_m->hapusAlltempById();

				echo $no_invoice;
			}
		}

		public function sm_invoice(){
			$id_project = $this->uri->segment(3);
			$no_invoice	= $this->uri->segment(4);
			$this->Datase_invoice_m->setId_project($id_project);
			$this->Datase_invoice_m->setNo_invoice($no_invoice);

			$getData 	= $this->Datase_invoice_m->getByIdAndInvoice();
			if($getData->num_rows() > 0){
				foreach ($getData->result() as $dataInvoicedb) {
					$no_rec[] 			= $dataInvoicedb->no_rec;
					$no_invoicedb[]		= $dataInvoicedb->no_invoice;
					$id_projectdb[]		= $dataInvoicedb->id_project;
					$id_produk[]		= $dataInvoicedb->id_produk;
					$volume[]			= $dataInvoicedb->volume;
					$harga_satuan[]		= $dataInvoicedb->harga_satuan;
					$total_harga[]		= $dataInvoicedb->total_harga;
					$tanggal_dibuat[]	= $dataInvoicedb->tanggal_dibuat;
				}

				for($i=0; $i<count($id_projectdb); $i++){
					$this->Dataproyek_m->setId_proyek($id_projectdb[$i]);
					$dataproyek 	= $this->Dataproyek_m->getById();
					foreach ($dataproyek->result() as $dataproyekdb) {
						$nama_proyek[]	= $dataproyekdb->nama_proyek;
						$pic[] 			= $dataproyekdb->pic;
					}
				}
			}

			$this->load->view('Header_v');
			$this->load->view('datasm_headpo_invoice_v', array(
																'no_rec'			=> $no_rec,
																'no_invoice'		=> $no_invoicedb ,
																'id_project'		=> $id_projectdb,
																'nama_proyek'		=> $nama_proyek,
																'pic'				=> $pic,
																'id_produk'			=> $id_produk,
																'volume'			=> $volume,
																'harga_satuan'		=> $harga_satuan,
																'total_harga'		=> $total_harga,
																'tanggal_dibuat'	=> $tanggal_dibuat
							));
			$this->load->view('Footer_v');
		}

		public function save(){
			$no_invoice 	= $this->input->post('no_invoice');
			$id_user 		= $this->session->userdata('bkwopname_user');
			$id_project 	= $this->input->post('idproject');
			$retensi 		= $this->input->post('retensi');
			$kebersihan 	= $this->input->post('kebersihan');
			$repair 		= $this->input->post('repair');
			$pph 			= $this->input->post('pph');
			$totalharga 	= $this->input->post('totalharga');
			$totalpotongan 	= $this->input->post('totalpotongan');
			$totalbersih 	= $this->input->post('totalbersih');
			$tanggal_dibuat = $this->Datasm_headpo_m->getNow();

			$dataheadinvoice= array(
										'id_rec' 			=> $no_invoice,
										'id_proyek'			=> $id_project,
										'total' 			=> $totalharga,
										'tanggal_dibuat'	=> $tanggal_dibuat
									);
			$this->Datase_headinvoice_m->insertSingleData($dataheadinvoice);

			$data = array(
							'no_invoice'		=> $no_invoice,
							'id_user'			=> $id_user,
							'id_project'		=> $id_project,
							'retensi'			=> $retensi/100,
							'kebersihan'		=> $kebersihan/100,
							'repair'			=> $repair/100,
							'pph' 				=> $pph/100,
							'total_harga'		=> $totalharga,
							'total_potongan' 	=> $totalpotongan,
							'total_bersih'		=> $totalbersih,
							'tanggal_dibuat'	=> $tanggal_dibuat
							);

			$tambah = $this->Datasm_headpo_m->save($data);
			echo $tambah;
		}
	}
?>