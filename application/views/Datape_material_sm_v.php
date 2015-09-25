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
			<h2><small>Data Material Pelaksana</small></h2>
			<br/>
			<table class="table bordered border hovered" id='table_origin'>
				<thead>
					<th colspan="6">
						<div class="place-left">
							<?php
								if($id != ''){
							?>
								<input type="hidden" id="id_projek_reload" value="<?php echo $id; ?>" />
							<?php
								}
							?>
								<input type="hidden" id="notif" value="<?php echo $notif; ?>" />

							<select id="select" name="id_proyek" class="id_proyek" style="width:380px;">
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
							</select>
						</div>
						<div class="place-right">
							<!--<label class="input-control checkbox" >
								<input type="checkbox" id="checkbox" style="height:100px;" />
								<span class="check"></span>
							</label>-->
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
					<tr>
						<th>ID Proyek</th>
						<th>Nama Proyek</th>
						<th>ID PIC</th>
						<th>ID Produk</th>
						<th>Volume</th>
						<th>Tanggal Dibuat</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$jml = count($id_proyek);
						for ($i=0; $i < $jml; $i++) { 
					?>
					<tr id="table_origin_row_<?php echo $no_rec[$i];?>" onclick="MoveRow(<?php echo $no_rec[$i];?>)">
						<input type="hidden" id="no_rec<?php echo $no_rec[$i];?>" value="<?php echo $no_rec[$i]; ?>">
						<input type="hidden" id="id_proyek<?php echo $no_rec[$i];?>" value="<?php echo $id_proyek[$i]; ?>">
						<input type="hidden" id="id_produk<?php echo $no_rec[$i];?>" value="<?php echo $id_produk[$i]; ?>">
						<input type="hidden" id="volume<?php echo $no_rec[$i];?>" value="<?php echo $volume[$i]; ?>">
						<input type="hidden" id="harga_satuan<?php echo $no_rec[$i];?>" value="<?php echo $harga_satuan[$i]; ?>">
						<input type="hidden" id="total_harga<?php echo $no_rec[$i];?>" value="<?php echo $total_harga[$i]; ?>">
						<input type="hidden" id="nama_proyek<?php echo $no_rec[$i];?>" value="<?php echo $nama_proyek[$i]; ?>">
						<input type="hidden" id="pic<?php echo $no_rec[$i];?>" value="<?php echo $pic[$i]; ?>">
						<input type="hidden" id="tanggal_dibuat<?php echo $no_rec[$i];?>" value="<?php echo $tanggal_dibuat[$i]; ?>">
						
						
						<td><?php echo $id_proyek[$i]; ?></td>
						<td><?php echo $nama_proyek[$i]; ?></td>
						<td><?php echo $pic[$i]; ?></td>
						<td><?php echo $id_produk[$i]; ?></td>
						<td><?php echo $volume[$i]; ?></td>
						<td><?php echo $tanggal_dibuat[$i]; ?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
			<br/>
			<br/>
			<br/>
		</div>
		<div class="container page-content">
			
			<h2><small>Data Material Site Manager </small></h2>
			<br/>
			<table class="table bordered border hovered" id='tabel_target'>
				<thead>
					<tr >
						<th>ID Proyek</th>
						<th>Nama Proyek</th>
						<th>ID PIC</th>
						<th>ID Produk</th>
						<th>Volume</th>
						<th>Tanggal Dibuat</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$jml = count($id_proyek_sm);
						for ($i=0; $i < $jml; $i++) { 
					?>
					<tr id="table_target_row_<?php echo $no_rec_sm[$i];?>" onclick="removeDataSm(<?php echo $no_rec_sm[$i];?>)">
						<input type="hidden" id="no_rec_sm<?php echo $no_rec_sm[$i];?>" value="<?php echo $no_rec_sm[$i]; ?>" name="no_rec_sm">
						<td><?php echo $id_proyek_sm[$i]; ?></td>
						<td><?php echo $nama_proyek_sm[$i]; ?></td>
						<td><?php echo $pic_sm[$i]; ?></td>
						<td><?php echo $id_produk_sm[$i]; ?></td>
						<td><?php echo $volume_sm[$i]; ?></td>
						<td><?php echo $tanggal_dibuat_sm[$i]; ?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
		</div>
		
		<div data-role="dialog" id="alert_data" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="500px" class="padding20">
			<br/>
			<span class="mif-notification mif-3x fg-green" style="color:#FF5500"></span> Data yang Anda cari tidak ada pada tabel
			<br/>
			<button class="button rounded success ok_alert_data place-right"><span class="mif-thumbs-up icon"></span> OK</button>
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
		function MoveRow(id){
			var formatRow = "<tr id='table_target_row_"+id+"' onclick='removeDataSm("+id+")'>";
				formatRow += "<input type='hidden' id='no_rec_se"+$("#no_rec"+id).val()+"' value='"+$("#no_rec"+id).val()+"' value = '"+$("#no_rec"+id).val()+"' name='no_rec_se'>";
				formatRow += "<td>"+$("#id_proyek"+id).val()+"</td>";
				formatRow += "<td>"+$("#nama_proyek"+id).val()+"</td>";
				formatRow += "<td>"+$("#pic"+id).val()+"</td>";
				formatRow += "<td>"+$("#id_produk"+id).val()+"</td>";
				formatRow += "<td>"+$("#volume"+id).val()+"</td>";
				formatRow += "<td>"+$("#tanggal_dibuat"+id).val()+"</td>";
				formatRow += "</tr>";
			$("#tabel_target tr:last").after(formatRow);
			insertDataSm(id);
			DisableRowClick();
		}
		function DisableRowClick(){
			$.get("<?php echo site_url();?>Datasm_material/GetJsonDatasm_material", function( data ) {
	            var result = JSON.parse(data);
	            for (var i = 0; i < result.length; i++) {
	            	$("#table_origin_row_"+result[i].no_rec).removeAttr("onClick");
	            	$("#table_origin_row_"+result[i].no_rec).css("background-color", "#DDDDDD");
	            };
	        });
		}
		function insertDataSm(id){
			var no_rec 			= $("#no_rec"+id).val();
			var id_proyek 		= $("#id_proyek"+id).val();		
			var id_produk 		= $("#id_produk"+id).val();
			var volume 			= $("#volume"+id).val();
			var harga_satuan 	= $("#harga_satuan"+id).val();
			var total_harga 	= $("#total_harga"+id).val();
			var tanggal_dibuat 	= $("#tanggal_dibuat"+id).val();

			$.post('<?php echo site_url();?>Datasm_material/insertDatasmMaterial', {no_rec:no_rec, id_proyek:id_proyek, id_produk:id_produk,volume:volume,harga_satuan:harga_satuan,total_harga:total_harga,tanggal_dibuat:tanggal_dibuat},function(data){
				var result = JSON.parse(data);
				if (result.result) {
					DisableRowClick();
				};
			});
		}

		function removeDataSm(id){
			if (confirm("Apakah Anda yakin akan menghapus data ini?")) {

				var no_rec= $("#no_rec_se"+id).val();
				$("#table_origin_row_"+id).removeAttr("style");
				$("#table_origin_row_"+id).attr("onclick","MoveRow("+id+")");
				$("#table_target_row_"+id).remove();
				$.get('<?php echo site_url();?>Datasm_material/deleteDatasmMaterial?no_rec='+id,function(data){
					var result = JSON.parse(data);
					if (result.result) {
						alert("Delete Success");
					};
				});
			}; 
		}

	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			DisableRowClick();
			start();

			function start(){
				var notif 	= $("#notif").val();

				if(notif > 0){
					showDialog('#alert_data');
				}
			}

			$(".table").dataTable();

			$("#select").select2();

			$(".id_proyek").val($("#id_projek_reload").val());

			$(".id_proyek").change(function(){
				var value 		= $(".id_proyek").val();
				window.location	= '<?php echo site_url(); ?>Datasm_material/DatasmById/' + value;
			});

			$(".ok_alert_data").click(function(){
				closeDialog('#alert_data');
			});

			$("#search").click(function(){
				var idproject 	= $("#id_projek_reload").val();
				var datemin		= $("#datemin").val();
				var datemax 	= $("#datemax").val();
				
				window.location	= '<?php echo site_url(); ?>Datasm_material/DatasmByDate/' + idproject + '/'+ datemin + '/' + datemax;
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