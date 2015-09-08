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
			<h2><small>Data Proyek</small></h2>
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
						<th>ID Proyek</th>
						<th>Nama Proyek</th>
						<th>PIC</th>
						<th>Tanggal Dibuat</th>
						<th>Tanggal Update</th>
						<th>Modifikasi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$jml = count($id_proyek);

						for($i=0; $i<$jml; $i++){
					?>
					<tr>
						<td><?php echo $id_proyek[$i]; ?></td>
						<td><?php echo $nama_proyek[$i]; ?></td>
						<td><?php echo $pic[$i]; ?></td>
						<td><?php echo $tgl_dibuat[$i]; ?></td>
						<td><?php echo $tgl_update[$i]; ?></td>
						<td>
							<button class="button rounded primary ubah" id="ubah_<?php echo $id_proyek[$i]; ?>"><span class="mif-pencil icon"></span> Edit</button>
							<button class="button rounded danger hapus" id="hapus_<?php echo $id_proyek[$i]; ?>"><span class="mif-bin icon"></span> Hapus</button>
						</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>

			<div data-role="dialog" id="formdataproyek" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="500px" class="padding20">
			    <h2><small>Form Data Material</small></h2>
			    	<table>
			    		<tbody>
			    			<form method="post" id="form_data_proyek">
			    			<input type="hidden" id="id_proyek_temp" value="" name="id_proyek_temp" />
			    			<tr>
			    				<td><label id="label_idproyek">ID Proyek</label></td>
			    				<td>:</td>
				    			<td>
				    				<div class="input-control text">
							    		<input type="text" id="id_proyek" placeholder="ID Proyek" name="id_proyek" style="width:380px;" />
							    	</div>
				    			</td>
			    			</tr>
			    			<tr>
			    				<td><label id="label_namaproyek">Nama Proyek</label></td>
			    				<td>:</td>
				    			<td>
				    				<div class="input-control text">
							    		<input type="text" id="nama_proyek" placeholder="Nama Proyek" name="nama_proyek" style="width:380px;" />
							    	</div>
				    			</td>
			    			</tr>
			    			<tr>
			    				<td><label id="label_pic">PIC</label></td>
			    				<td>:</td>
				    			<td>
				    				<div class="input-control text">
							    		<input type="text" id="pic" placeholder="PIC" name="pic" style="width:380px;" />
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
			    					<button class="button rounded primary edit place-right"><span class="mif-pencil icon"></span> Edit</button>
			    				</td>
			    			</tr>
			    		</tbody>
			    	</table>
			</div>

			<div data-role="dialog" id="konfirmasi" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="500px" class="padding20">
				<br/>
				<span class="mif-notification mif-3x fg-green"></span>  Apakah Anda yakin akan menghapus data?
				<input type="hidden" id="idproyek_hapus" name="idproyek_hapus" />
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

			$(".tambah").click(function(){
				$("#id_proyek_temp").val('');
				$("#id_proyek").val('');
				$("#nama_proyek").val('');
				$("#pic").val('');
				$(".add").show();
				$(".edit").hide();
				showDialog("#formdataproyek");
				$("#id_proyek").focus();
			});

			$(".ok_alert_field").click(function(){
				closeDialog('#alert_field');
				showDialog('#form_data_proyek');
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
		}
	?>