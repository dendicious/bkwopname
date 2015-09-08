		<div class="container page-content">
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<div class="grid">
				<div class="row cells12">
					<div class="cell colspan2"></div>
					<?php if(!empty($data)){ ?>
						<!--<div class="cell colspan8 notify alert">
		                    <span class="notify-title">Login tidak berhasil</span>
		                    <span class="notify-text">Username dan Password yang dimasukan tidak sesuai. Silahkan coba lagi!</span>
		                </div>-->
		                <div data-role="dialog" id="alert_login" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="600px" class="padding20">
							<br/>
							<span class="mif-warning mif-3x" style="color:#FF5500"></span>  Username dan Password yang dimasukan tidak sesuai. Silahkan coba lagi!
							<br/>
							<button class="button rounded success ok_alert_login place-right"><span class="mif-thumbs-up icon"></span> OK</button>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="grid">
				<div class="row cells12">
					<div class="cell colspan2"></div>
					<div class="cell colspan8 panel">
						<div class="heading bg-darkCyan">
							<span class="mif-enter icon"></span>
							<span class="title">Login</span>
						</div>
						<div class="content bg-grayLighter">
							<form method="post" action="<?php echo site_url();?>Login/sign_in">
								<div class="input-control modern text iconic">
								    <input type="text" name="user_username" id="user_username" required>
								    <span class="label">Username</span>
								    <span class="informer">Silahkan masukkan username Anda</span>
								    <span class="placeholder">Masukkan Username</span>
								    <span class="icon mif-user"></span>
								</div>
								<br/>
								<div class="input-control modern password iconic" data-role="input" >
								    <input type="password" name="user_password" id="user_password" required>
								    <span class="label">Password</span>
								    <span class="informer">Silahkan masukkan password Anda</span>
								    <span class="placeholder">Masukkan Kata Sandi</span>
								    <span class="icon mif-lock"></span>
								    <button class="button helper-button reveal"><span class="mif-looks"></span></button>
								</div>

								<div class="place-right">
									<button class="button rounded primary block-shadow-primary btn_login"><span class="mif-enter icon"></span> Login</button>
								</div>
							</form>
								<br/>
								<br/>
								<br/>
								<br/>
						</div>
					</div>
				</div>
			</div>
			<br/>
			<br/>
		</div>
	</body>

	<script>
	    function showDialog(id){
	        var dialog = $(id).data('dialog');
	        dialog.open();
	    }

	    function closeDialog(id){
	    	 var dialog = $(id).data('dialog');
	        dialog.close();
	    }
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			showDialog('#alert_login');

			$(".ok_alert_login").click(function(){
				closeDialog('#alert_login');
			});
		});
	</script>