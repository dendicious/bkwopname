		<?php
			if($this->session->userdata('bkwopname_uname') != ''){
				if($this->session->userdata('bkwopname_idjabatan') == 5){
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
			<h2><small>Data Material Site Manager</small></h2>
			<br/>
			<table class="table bordered border hovered" id="table">

				<thead>
					<tr>
						<th colspan="8">
							<div class="place-left">
							<!--<select id="select" name="id_proyek" class="id_proyek" style="width:380px;">
							<?php
								$jml_proyek	= count($id_proyekdistinct);
								if($jml_proyek > 0){
									for($j=0; $j<$jml_proyek; $j++) {
							?>
										<option value="<?php echo $id_proyekdistinct[$j]; ?>"><?php echo $id_proyekdistinct[$j]; ?></option>
							<?php
									}		
								}
							?>
							</select>-->
								<button class="button mif-floppy-disk primary rounded save"> Simpan</button>
							</div>
							<?php
								if($id != ''){
							?>
								<input type="hidden" id="id_projek_reload" value="<?php echo $id; ?>" />
							<?php
								}
							?>
							<input type="hidden" id="notif" value="<?php echo $notif; ?>" />
							<div class="place-right">
								<div class="input-control text" data-role="datepicker" data-other-days="true" data-week-start="1" data-format="yyyy-mm-dd">
								    <input type="text" id="datemin" />
								    <button class="button"><span class="mif-calendar"></span></button>
								</div>
								s.d
								<div class="input-control text" data-role="datepicker" data-other-days="true" data-week-start="1" data-format="yyyy-mm-dd">
								    <input type="text" id="datemax" />
								    <button class="button"><span class="mif-calendar"></span></button>
								</div>
								<button class="button rounded primary" id="search"><span class="mif-search"></span></button>
							</div>
						</th>
					</tr>
					<tr>
						<th>ID Proyek</th>
						<th>Nama Proyek</th>
						<th>ID PIC</th>
						<th>ID Produk</th>
						<th>Volume</th>
						<th>Harga Satuan</th>
						<th>Sub Total</th>
						<th>Tanggal Dibuat</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$jml = count($id_proyek);
						for ($i=0; $i < $jml; $i++) { 
					?>
					<tr id="tabledatasm_'<?php echo $id_proyek[$i]; ?>'">
						<td>
							<label class="input-control checkbox">
							    <input type="checkbox" onclick="insertTemp(<?php echo $no_rec[$i]; ?>)" id="checkbox_<?php echo $id_produk[$i]; ?>">
							    <span class="check"></span>
							    <span class="caption"></span>
							</label>
							<?php echo $id_proyek[$i]; ?>
							<input type="hidden" id="id_proyek_<?php echo $no_rec[$i]; ?>" value="<?php echo $id_proyek[$i]; ?>" />
							<input type="hidden" id="id_produk_<?php echo $no_rec[$i]; ?>" value="<?php echo $id_produk[$i]; ?>" />
							<input type="hidden" id="volume_<?php echo $no_rec[$i]; ?>" value="<?php echo $volume[$i]; ?>" />
							<input type="hidden" id="harga_satuan_<?php echo $no_rec[$i]; ?>" value="<?php echo $harga_satuan[$i]; ?>" />
							<input type="hidden" id="total_harga_<?php echo $no_rec[$i]; ?>" value="<?php echo $total_harga[$i]; ?>" />
							<input type="hidden" id="tgl_dibuat_<?php echo $no_rec[$i]; ?>" value="<?php echo $tanggal_dibuat[$i]; ?>" />
						</td>
						<td><?php echo $nama_proyek[$i]; ?></td>
						<td><?php echo $pic[$i]; ?></td>
						<td><?php echo $id_produk[$i]; ?></td>
						<td><?php echo $volume[$i]; ?></td>
						<td>Rp. <?php echo number_format($harga_satuan[$i],0,",","."); ?>,00</td>
						<td>Rp. <?php echo number_format($total_harga[$i],0,",","."); ?>,00</td>
						<td><?php echo $tanggal_dibuat[$i]; ?></td>
					</tr>
					<?php
						}
					?>
				</tbody>

				<div data-role="dialog" id="alert_data" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="500px" class="padding20">
					<br/>
					<span class="mif-notification mif-3x fg-green" style="color:#FF5500"></span> Data yang Anda cari tidak ada pada tabel
					<br/>
					<button class="button rounded success ok_alert_data place-right"><span class="mif-thumbs-up icon"></span> OK</button>
				</div>

			</table>
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

	    function insertTemp(id){
	    	 var no_rec			= id;
	    	 var id_proyek 		= $('#id_proyek_' + id).val();
	    	 var id_produk 		= $('#id_produk_' + id).val();
	    	 var volume 		= $('#volume_' + id).val();
	    	 var harga_satuan 	= $('#harga_satuan_' + id).val();
	    	 var total_harga 	= $('#total_harga_' + id).val();
	    	 var tgl_dibuat 	= $('#tgl_dibuat_' + id).val();

	    	 if(document.getElementById('checkbox_' + id_produk).checked == true){
	    	 	$.post('<?php echo site_url(); ?>Datasm_headpo/insertDatasmtemp', {no_rec:no_rec, id_proyek:id_proyek, id_produk:id_produk,volume:volume,harga_satuan:harga_satuan,total_harga:total_harga,tanggal_dibuat:tgl_dibuat}, function(data){
	    	 		checkedData();
	    	 	});
	    	 }
	    	 else{
	    	 	deleteTemp(no_rec);
	    	 }
	    }

	    function deleteTemp(id){
	    	var idproject 	= $("#id_projek_reload").val();
	    	$.post('<?php echo site_url(); ?>Datasm_headpo/deleteDatatemp', {no_rec:id,idproject:idproject}, function(data){

	    	});
	    }

	    function checkedData(){
	    	var idproject 	= $("#id_projek_reload").val();
	    	$.get("<?php echo site_url(); ?>Datasm_headpo/GetJsonDatasm_material_temp/"+idproject, function(data){
			    var result = JSON.parse(data);
			    for (var i = 0; i < result.length; i++) {
		          	document.getElementById('checkbox_' + result[i].id_produk).checked = true;
		        };
		   	});
	    }

	    function disabledData(){
	    	var idproject 	= $("#id_projek_reload").val();
	    	$.get("<?php echo site_url(); ?>Datasm_headpo/GetJsonDatase_invoice/"+idproject, function(data){
	    		var result = JSON.parse(data);
	            for (var i = 0; i < result.length; i++) {
	            	document.getElementById('checkbox_' + result[i].id_produk).disabled = true;
	            };
	    	});
	    }

		$(document).ready(function() {
			start();
			disabledData();
			checkedData();

			function start(){
				var notif 	= $("#notif").val();

				if(notif > 0){
					showDialog('#alert_data');
				}
			}

			$("#table").dataTable();
			$("#select").select2();

			$(".id_proyek").val($("#id_projek_reload").val());

			$(".id_proyek").change(function(){
				var value 		= $(".id_proyek").val();
				window.location	= '<?php echo site_url(); ?>Datasm_headpo/DatasmById/' + value;
			});

			$(".ok_alert_data").click(function(){
				closeDialog('#alert_data');
			});

			$("#search").click(function(){
				var idproject 	= $("#id_projek_reload").val();
				var datemin		= $("#datemin").val();
				var datemax 	= $("#datemax").val();
				
				window.location	= '<?php echo site_url(); ?>Datasm_headpo/DatasmByDate/' + idproject + '/'+ datemin + '/' + datemax;
			});

			$(".save").click(function(){
				var idproject 	= $("#id_projek_reload").val();
				$.ajax({
			        url: "<?php echo site_url();?>Datasm_headpo/tambahDataseInvoice",
			        data: {id_proyek:idproject},
		    		type: "post",
			        success: function(data){
		    			window.location = '<?php echo site_url(); ?>Datasm_headpo/sm_invoice/' + idproject + "/" + data;
			        }
			    });
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