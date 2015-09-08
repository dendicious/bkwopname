<?php
	class Beranda extends CI_Controller{
		function __construct(){
			parent::__construct();
		}
		
		public function index(){
			$this->load->view('Header_v');
			$this->load->view('Beranda_v');
			$this->load->view('Footer_v');
		}
	}
?>