		<?php
			if($this->session->userdata('bkwopname_uname') != ''){
		?>
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
			<h3>Selamat Datang <?php echo $this->session->userdata('bkwopname_uname');?>!</h3>
			<table class="table bordered">
				<tbody>
					<tr>
						<td><h2><small>Profil Anda</small></h2></td>
					</tr>
					<tr></tr>
				</tbody>
			</table>
			<br/>
			<table class="table">
				<tbody>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><input type="text" id="nama_user" value="<?php echo $datauser['nama']; ?>" style="border:none;" /></td>
					</tr>
					<tr>
						<td>Jabatan</td>
						<td>:</td>
						<td><input type="text" id="jabatan_user" value="<?php echo $datauser['jabatan']; ?>" style="border:none;" /></td>
					</tr>
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><input type="text" id="username" value="<?php echo $datauser['username']; ?>" style="border:none" /></td>
					</tr>
					<tr id="tr_password">
						<td id="td_password">Password</td>
						<td id="td_titiduapaswword">:</td>
						<td id="td_contentpassword"><input type="password" id="password" value="<?php echo $datauser['password']; ?>" style="border:none" /></td>
					</tr>
					<tr>
						<td>Tanggal Dibuat</td>
						<td>:</td>
						<td><input type="text" id="tgl_dibuat" value="<?php echo $datauser['tanggal_dibuat']; ?>" style="border:none" /></td>
					</tr>
					<tr>
						<td>Tanggal Update</td>
						<td>:</td>
						<td>
							<?php 
								if($datauser['tanggal_update'] == ''){
									$tglubah = "-";
								} 
								else{
									$tglubah = $datauser['tanggal_update'];
								}
							?>
							<input type="text" id="tgl_update" value="<?php echo $tglubah ?>" style="border:none" />
						</td>
					</tr>
				</tbody>
			</table>
			<br/>
			<br/>
			<br/>
		</div>
	</body>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#tr_password').hide();
		});
	</script>
	<?php
		}
		else{
			redirect('Login');
		}
	?>