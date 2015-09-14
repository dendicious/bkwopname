		<?php
			if($this->session->userdata('bkwopname_uname') != ''){
				if($this->session->userdata('bkwopname_idjabatan') == 1){
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
			<h2><small>Data User</small></h2>
			<br/>
			<table class="table bordered border" id="table">
				<thead>
					<tr>
						<th colspan="6">
							<div class="place-right">
								<button class="button rounded primary tambah" id="tambah"><span class="mif-plus icon"></span>Tambah</button>
							</div>
						</th>
					</tr>
					<tr>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Username</th>
						<th>Tanggal Dibuat</th>
						<th>Tanggal Update</th>
						<th>Modifikasi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$jml = count($id_user);
						for($i=0; $i<$jml; $i++){
					?>
					<tr>
						<td>
							<?php echo $nama[$i]; ?>
							<input type="hidden" id="nama_<?php echo $id_user[$i]; ?>" value="<?php echo $nama[$i] ?>"/>
							<input type="hidden" id="id_jabatan_<?php echo $id_user[$i]; ?>" value="<?php echo $id_jabatan[$i] ?>"/>
							<input type="hidden" id="jabatan_<?php echo $id_user[$i]; ?>" value="<?php echo $jabatan[$i] ?>"/>
							<input type="hidden" id="username_<?php echo $id_user[$i]; ?>" value="<?php echo $username[$i] ?>"/>
						</td>
						<td><?php echo $jabatan[$i]; ?></td>
						<td><?php echo $username[$i]; ?></td>
						<td><?php echo $tgl_dibuat[$i]; ?></td>
						<td style="text-align:center;">
							<?php 
								if($tgl_update[$i] == ''){
									echo "-";
								} 
								else{
									echo $tgl_update[$i];
								}
							?>
						</td>
						<td>
							<button class="button rounded primary edit" id="edit_<?php echo $id_user[$i]; ?>"><span class="mif-pencil icon"></span> Edit</button>
							<button class="button rounded danger hapus" id="hapus_<?php echo $id_user[$i]; ?>"><span class="mif-bin icon"></span>Hapus</button>
						</td>
					</tr>
					<?php 
						}
					?>
				</tbody>
			</table>
			<div data-role="dialog" id="formdatauser" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="500px" class="padding20">
			    <h2><small>Form Data User</small></h2>
			    	<table>
			    		<tbody>
			    			<form method="post" id="form_data_user">
			    			<input type="hidden" id="id_user" value="" name="id_user" />
			    			<tr>
				    			<td><label id="label_nama">Nama</label></td>
				    			<td>:</td>
				    			<td>
				    				<div class="input-control text">
							    		<input type="text" id="nama" placeholder="Nama" name="nama" style="width:380px;" />
							    	</div>
				    			</td>
			    			</tr>
			    			<tr>
				    			<td><label id="label_jabatan">Jabatan</label></td>
				    			<td>:</td>
				    			<td>
							    	<select id="select" name="jabatan" class="jabatan" style="width:380px;">
							    		<?php
							    			if($dtajabatan->num_rows() > 0){
							    				foreach ($dtajabatan->result() as $dtajbtn) {
							    		?>
							    					<option value="<?php echo $dtajbtn->id_jabatan; ?>"><?php echo $dtajbtn->jabatan; ?></option>
							    		<?php
							    				}
							    			}
							    		?>
							    	</select>
				    			</td>
			    			</tr>
			    			<tr>
			    				<td><label id="label_username">Username</label></td>
			    				<td>:</td>
				    			<td>
				    				<div class="input-control text">
							    		<input type="text" id="username" placeholder="Username" name="username" style="width:380px;" />
							    	</div>
				    			</td>
			    			</tr>
			    			<tr>
			    				<td><label id="label_username">Password</label></td>
			    				<td>:</td>
				    			<td>
				    				<div class="input-control password">
							    		<input type="password" id="passowrd" placeholder="Password" name="password" style="width:380px;" />
							    	</div>
							    	<br/>
							    	<div id="note" style="color:#FF0000">*Kosongkan password jika tidak ada perubahan password</div>
				    			</td>
			    			</tr>
			    			</form>
			    			<tr>
			    				<td>
			    					<br/>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td colspan="3">
			    					<button class="button rounded primary add place-right"><span class="mif-plus icon"></span> Tambah</button>
			    					<button class="button rounded primary ubah place-right"><span class="mif-pencil icon"></span> Edit</button>
			    				</td>
			    			</tr>
			    		</tbody>
			    	</table>
			</div>

			<div data-role="dialog" id="konfirmasi" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="500px" class="padding20">
				<br/>
				<span class="mif-notification mif-3x fg-green"></span>  Apakah Anda yakin akan menghapus data?
				<input type="hidden" id="iduser_hapus" name="iduser_hapus" />
				<br/>
				<button class="button rounded danger delete place-right"><span class="mif-bin icon"></span> Hapus</button>
			</div>

			<div data-role="dialog" id="success_update" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="500px" class="padding20">
				<br/>
				<span class="mif-checkmark mif-3x" style="color:#AAFFAA"></span>  Perubahan pada tabel berhasil dilakukan
				<br/>
				<button class="button rounded success ok_success_update place-right"><span class="mif-thumbs-up icon"></span> OK</button>
			</div>

			<div data-role="dialog" id="alert_field" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="500px" class="padding20">
				<br/>
				<span class="mif-warning mif-3x" style="color:#FF5500"></span>  Semua field harus diisi
				<br/>
				<button class="button rounded success ok_alert_field place-right"><span class="mif-thumbs-up icon"></span> OK</button>
			</div>

			<div data-role="dialog" id="alert_uname" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="500px" class="padding20">
				<br/>
				<span class="mif-warning mif-3x" style="color:#FF5500"></span>  Username yang Anda masukkan sudah terdaftar
				<br/>
				<button class="button rounded success ok_alert_uname place-right"><span class="mif-thumbs-up icon"></span> OK</button>
			</div>

			<div data-role="dialog" id="unsuccess_update" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="500px" class="padding20">
				<br/>
				<span class="mif-warning mif-3x" style="color:#FF5500"></span>  Perubahan pada tabel tidak berhasil dilakukan. Silahkan coba kembali!
				<br/>
				<button class="button rounded success ok_unsuccess_update place-right"><span class="mif-thumbs-up icon"></span> OK</button>
			</div>
			<br/>
			<br/>
			<br/>
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
			$("#table").dataTable();

			$("#select").select2();

			$("#tambah").click(function(){
				$("#nama").val('');
            	$("#username").val('');
            	$("#passowrd").val('');
            	$("#note").hide();
				$(".add").show();
				$(".ubah").hide();
			    showDialog('#formdatauser');
			    $("#nama").focus();
            }); 

            $(".add").click(function(){
            	var nama 			= $("#nama").val();
            	var jabatan 		= $(".jabatan").val();
            	var uname 			= $("#username").val();
            	var passwd 			= $("#passowrd").val();
            	var form_data_user	= $("#form_data_user").serialize();

            	if(nama == '' || jabatan == '' || uname == '' || passwd == ''){
            		showDialog('#alert_field');
            	}else{
            		$.post("<?php echo site_url();?>Datauser/cek_username", {uname:uname}, function(data){
            			if(data == 0){
							$.ajax({
			            		url: "<?php echo site_url();?>Datauser/tambah",
			            		data: form_data_user,
			            		type: "post",
			            		complete: function(data){
			            			showDialog('#success_update');
			            		}
			            	});
            			}
            			else{
            				showDialog('#alert_uname');
            			}
            		});
            	}
            });

			$(".edit").click(function(){
				var id 	= this.id.substr(5);
				
				$("#id_user").val(id);
				$("#nama").val($('#nama_' + id).val());
            	$("#username").val($('#username_' + id).val());
            	$(".jabatan").val($('#id_jabatan_' + id).val());
            	$("#password").val('');
            	$("#password").attr('placeholder', 'Kosongkan jika tidak ingin merubah password');
            	$("#note").show();
				$(".add").hide();
				$(".ubah").show();
			    showDialog('#formdatauser');
			    $("#nama").focus();

			});

			$(".ubah").click(function(){
				var id 				= $("#id_user").val();
				var nama 			= $("#nama").val();
            	var jabatan 		= $(".jabatan").val();
            	var uname 			= $("#username").val();
            	var form_data_user	= $("#form_data_user").serialize();

				if(nama == '' || jabatan == '' || uname == ''){
            		showDialog('#alert_field');
            	}else{
            		$.post("<?php echo site_url();?>Datauser/cek_username", {uname:uname}, function(data){
            			if(data == 0){
							$.ajax({
			            		url: "<?php echo site_url();?>Datauser/ubah",
			            		data: form_data_user,
			            		type: "post",
			            		complete: function(data){
			            			showDialog('#success_update');
			            		}
			            	});
            			}
            			else{
            				$.post("<?php echo site_url();?>Datauser/cek_akun", {id:id, uname:uname}, function(data2){
            					if(data2 > 0){
									$.ajax({
					            		url: "<?php echo site_url();?>Datauser/ubah",
					            		data: form_data_user,
					            		type: "post",
					            		complete: function(data){
					            			showDialog('#success_update');
					            		}
					            	});
            					}
            					else{
            						showDialog('#alert_uname');
            					}
            				});	
            			}
            		});
            	}
			});

            $(".hapus").click(function() {
				var id 	= this.id.substr(6);

				$("#iduser_hapus").val(id);
				showDialog('#konfirmasi');
			});

			$(".delete").click(function(){
				var id 	= $("#iduser_hapus").val();
				
				$.post("<?php echo site_url();?>Datauser/hapus", {id:id}, function(data){
					if(data > 0){
						closeDialog('#konfirmasi');
						showDialog('#success_update');
					}
					else{
						showDialog('#unsuccess_update');
					}
				});
			});

			$(".ok_alert_field").click(function(){
				closeDialog('#alert_field');
				showDialog('#form_data_user');
			});

			$(".ok_success_update").click(function(){
				closeDialog('#success_update');
				location.reload();
			});

			$(".ok_alert_uname").click(function(){
				closeDialog('#alert_uname');
			});

			$(".ok_unsuccess_update").click(function(){
				closeDialog('#unsuccess_update');
			});
		});
	</script>

	<?php
			}
			else{
				redirect('Login');
			}
		}
		else{
			redirect('Login');
		}
	?>