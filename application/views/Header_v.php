<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SISTEM OPNAME MATERIAL</title>

		<link href="<?php echo base_url();?>assets/css/metro.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/metro-icons.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/select2.min.css" rel="stylesheet">
		<script src="<?php echo base_url();?>assets/js/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery/jquery.dataTables.js"></script>
		<script src="<?php echo base_url();?>assets/js/metro.js"></script>
		<script src="<?php echo base_url();?>assets/js/select2.min.js"></script>

		<link rel="icon" type="image/png" href="<?php base_url(); ?>assets/img/logo.png" width="5">
	</head>
	<body>
		<div>
			<header class="app-bar fixed-top bg-darkCyan clearfix" data-role="appbar">
				<div class="container">
					<div style="margin-left:0; margin-top:2%; margin-right:6%">
						<span>
							<img src="<?php echo base_url();?>assets/img/logo.png" width="15%">
						</span>
					</div>

					<div style="margin-left:0; margin-top:2%; margin-right:7%">
					<a class="app-bar-element" href="<?php echo base_url();?>"><span class="mif-home icon"></span> Home</a>

					<?php
						if($this->session->userdata('bkwopname_idjabatan') == 1){
					?>
						<a class="app-bar-element" href="<?php echo site_url();?>Datauser">Data User</a>
					<?php		
						}
						else if($this->session->userdata('bkwopname_idjabatan') == 2){
					?>
						<a class="app-bar-element" href="<?php echo site_url();?>Dataproyek">Data Proyek</a>
						<a class="app-bar-element" href="<?php echo site_url();?>Dataoe_material">Data Material</a>
					<?php
						}
						else if($this->session->userdata('bkwopname_idjabatan') == 3){
					?>
						<a class="app-bar-element" href="<?php echo site_url();?>Dataoe_material/Dataoe_material_se">Data Material OE</a>
						<a class="app-bar-element" href="<?php echo site_url();?>Datase_material">Data Material SE</a>
						<a class="app-bar-element" href="<?php echo site_url();?>Datase_invoice">Data Invoice</a>
					<?php
						}
						else if($this->session->userdata('bkwopname_idjabatan') == 4){
					?>
						<a class="app-bar-element" href="<?php echo site_url();?>Datape_material">Data Material SE</a>
					<?php
						}
						else if($this->session->userdata('bkwopname_idjabatan') == 5){
					?>
						<a class="app-bar-element" href="<?php echo site_url();?>Datasm_material">Data Material PE</a>
						<a class="app-bar-element" href="<?php echo site_url();?>Datasm_headpo/Dataproyeksm">Headpo</a>
					<?php
						}
					?>

					<ul class="app-bar-menu place-right" data-flexdirection="reverse">
						<?php
							if($this->session->userdata('bkwopname_uname') != ''){
						?>
						<li data-flexorderorigin="1" data-flexorder="2">
							<a href="<?php echo site_url();?>Profil">
								<span class="mif-user icon"></span>
								<?php echo $this->session->userdata('bkwopname_uname'); ?>
							</a>
						</li>
						<?php
							}
						?>
						<li data-flexorderorigin="2" data-flexorder="3">
							<?php
                            	if($this->session->userdata('bkwopname_uname') == ''){
                        	?>
								<a href="<?php echo site_url(); ?>Login">
									<span class="mif-enter icon"></span> Login
								</a>
							<?php
								}
								else{
							?>
								<a href="<?php echo site_url();?>Logout">
									<span class="mif-exit icon"></span> Logout
								</a>
							<?php
								}
							?>
						</li>
					</ul>
					</div>
				</div>
			</header>
		</div>