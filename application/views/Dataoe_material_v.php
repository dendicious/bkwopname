		<?php
			if($this->session->userdata('bkwopname_uname') != ''){
				if($this->session->userdata('bkwopname_idjabatan') == 2){
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
			<h2><small>Data Material</small></h2>
			<br/>
			<?php echo form_open_multipart('Dataoe_material/do_upload');?>
				<div class="input-control file" data-role="input">
					<input type="file" id="file_upload" name="userfile" size="20" />
					<button class="button"><span class="mif-folder"></span></button>
				</div>
					<input type="submit" class="button rounded primary" value="Upload" />
			<?php echo form_close();?>

			<br/>
			<table class="table bordered border" id="table">

				<thead>
					<th colspan="8">
						<div class="place-right">
							<select id="select2" name="id_proyek" class="id_proyek" style="width:380px;">
							<?php
								$jml_proyek	= count($idproyek_dataproyek);
								if($jml_proyek > 0){
									for($j=0; $j<$jml_proyek; $j++) {
									
							?>
									<option value="<?php echo $idproyek_dataproyek[$j]; ?>"><?php echo $idproyek_dataproyek[$j]; ?></option>
							<?php
									}		
								}
							?>
							</select>
						</div>
					</th>
					<tr>
						<th>ID Proyek</th>
						<th>Nama Proyek</th>
						<th>ID PIC</th>
						<th>ID Produk</th>
						<th>Volume</th>
						<th>Harga Satuan</th>
						<th>Total Harga</th>
						<th>Modifikasi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$jml = count($id_proyek);
						for ($i=0; $i < $jml; $i++) { 
					?>
					<tr>
						<td>
							<?php echo $id_proyek[$i]; ?>
							<input type="hidden" id="id_proyek_<?php echo $no_rec[$i]; ?>" value="<?php echo $id_proyek[$i]; ?>" />
							<input type="hidden" id="id_produk_<?php echo $no_rec[$i]; ?>" value="<?php echo $id_produk[$i]; ?>" />
							<input type="hidden" id="volume_<?php echo $no_rec[$i]; ?>" value="<?php echo $volume[$i]; ?>" />
							<input type="hidden" id="harga_satuan_<?php echo $no_rec[$i]; ?>" value="<?php echo $harga_satuan[$i]; ?>" />
							<input type="hidden" id="total_harga<?php echo $no_rec[$i]; ?>" value="<?php echo $total_harga[$i]; ?>" />
						</td>
						<td><?php echo $nama_proyek[$i]; ?></td>
						<td><?php echo $pic[$i]; ?></td>
						<td><?php echo $id_produk[$i]; ?></td>
						<td><?php echo $volume[$i]; ?></td>
						<td>Rp. <?php echo number_format($harga_satuan[$i],0,",","."); ?>,00</td>
						<td>Rp. <?php echo number_format($total_harga[$i],0,",","."); ?>,00</td>
						<td>
							<button class="button rounded primary edit" id="edit_<?php echo $no_rec[$i]; ?>"><span class="mif-pencil icon"></span> Edit</button>
							<button class="button rounded danger delete" id="delete_<?php echo $no_rec[$i]; ?>"><span class="mif-bin icon"></span> Hapus</button>
						</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>

			<div data-role="dialog" id="formdatamaterialoe" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="500px" class="padding20">
			    <h2><small>Form Data Material</small></h2>
			    	<table>
			    		<tbody>
			    			<form method="post" id="form_data_material_oe">
			    			<input type="hidden" id="no_rec" value="" name="no_rec" />
			    			<tr>
				    			<td><label id="label_proyek">Proyek</label></td>
				    			<td>:</td>
				    			<td>
							    	<select id="select" name="proyek" class="proyek" style="width:380px;">
							    		<?php
							    			$jml_dataproyek = count($idproyek_dataproyek);
							    			for($j=0; $j<$jml_dataproyek; $j++){
							    		?>
							    				<option value="<?php echo $idproyek_dataproyek[$j]; ?>"><?php echo $namaproyek_dataproyek[$j]; ?></option>
							    		<?php
							    			}	
							    		?>
							    	</select>
				    			</td>
			    			</tr>
			    			<tr>
			    				<td><label id="label_idproduk">ID Produk</label></td>
			    				<td>:</td>
				    			<td>
				    				<div class="input-control text">
				    					<input type="hidden" id="id_produk_temp" name="id_produk_temp"/>
							    		<input type="text" id="id_produk" placeholder="ID Produk" name="id_produk" style="width:380px;" />
							    	</div>
				    			</td>
			    			</tr>
			    			<tr>
			    				<td><label id="label_volume">Volume</label></td>
			    				<td>:</td>
				    			<td>
				    				<div class="input-control number">
							    		<input type="number" id="volume" placeholder="Volume" name="volume" style="width:380px;" />
							    	</div>
				    			</td>
			    			</tr>
			    			<tr>
			    				<td><label id="label_hargasatuan">Harga Satuan</label></td>
			    				<td>:</td>
				    			<td>
				    				<div class="input-control number">
							    		<input type="number" id="harga_satuan" placeholder="Harga Satuan" name="harga_satuan" style="width:380px;" />
							    	</div>
				    			</td>
			    			</tr>
			    			<tr>
			    				<td><label id="label_totalharga">Total Harga</label></td>
			    				<td>:</td>
				    			<td>
				    				<div class="input-control number">
							    		<input type="number" id="total_harga" placeholder="Total Harga" name="total_harga" style="width:380px;" readonly="readonly" />
							    	</div>
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
				<input type="hidden" id="norec_hapus" name="norec_hapus" />
				<br/>
				<button class="button rounded danger hapus place-right"><span class="mif-bin icon"></span> Hapus</button>
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
	<script type="text/javascript">
		function showDialog(id){
	        var dialog = $(id).data('dialog');
	        dialog.open();
	    }
	    function closeDialog(id){
	    	var dialog = $(id).data('dialog');
	        dialog.close();
	    }

		$(document).ready(function() {
			$("#table").dataTable();
			$("#select2").select2();

		$(document).ready(function() {
			$("#table").dataTable();

			$("#select2").select2();

			$(".id_proyek").change(function(){
				var value = $(".id_proyek").val();
				
			});

			$(".edit").click(function(){
				var id 	= this.id.substr(5);
				$("#no_rec").val(id);
				$(".proyek").val($("#id_proyek_" + id).val());
				$("#id_produk").val($("#id_produk_" + id).val());
				$("#id_produk_temp").val($("#id_produk_" + id).val());
				$("#volume").val($("#volume_" + id).val());
				$("#harga_satuan").val($("#harga_satuan_" + id).val());
				$("#total_harga").val($("#total_harga" + id).val());
				$("#id_produk").prop("disabled", true);
				$(".add").hide();
				$(".ubah").show();
			    showDialog('#formdatamaterialoe');
			});
			$(".ubah").click(function(){
				var no_rec				= $("#no_rec").val();
				var id_proyek 			= $(".proyek").val();
				var id_produk 			= $("#id_produk_temp").val();
				var volume 				= $("#volume").val();
				var harga_satuan 		= $("#harga_satuan").val();
				var form_data_material	= $("#form_data_material_oe").serialize();
				if(no_rec == '' || id_proyek == '' || id_produk == '' || volume == '' || harga_satuan == ''){
					showDialog('#alert_field');
				}
				else{
					$.ajax({
			            url: "<?php echo site_url();?>Dataoe_material/ubah",
			       		data: form_data_material,
			       		type: "post",
			       		success: function(data){
			       			if(data > 0){
			       				showDialog('#success_update');
			       			}
			       			else{
			       				showDialog('#unsuccess_update');
			       			}
			       		}
		          	});
				}
			});
			$(".delete").click(function(){
				var id 	= this.id.substr(7);
				$("#norec_hapus").val(id);
				showDialog('#konfirmasi');
			});
			$(".hapus").click(function(){
				var id 	= $("#norec_hapus").val();
				$.post("<?php echo site_url();?>Dataoe_material/hapus", {id:id}, function(data){
					if(data > 0){
						closeDialog('#konfirmasi');
						showDialog('#success_update');
					}
					else{
						showDialog('#unsuccess_update');
					}
				});
			});
			$("#volume").change(function(){
				var volume 			= $("#volume").val();
				var harga_satuan 	= $("#harga_satuan").val();
				var total_harga 	= 0;
				total_harga 		= volume * harga_satuan;
				$('#total_harga').val(total_harga);
			});
			$("#harga_satuan").change(function(){
				var volume 			= $("#volume").val();
				var harga_satuan 	= $("#harga_satuan").val();
				var total_harga 	= 0;
				total_harga 		= volume * harga_satuan;
				$('#total_harga').val(total_harga);
			});
			$(".ok_alert_field").click(function(){
				closeDialog('#alert_field');
				showDialog('#formdatamaterialoe');
			});
			$(".ok_success_update").click(function(){
				closeDialog('#success_update');
				location.reload();
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