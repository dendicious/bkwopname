		<?php
			if($this->session->userdata('bkwopname_uname') != ''){
				if($this->session->userdata('bkwopname_idjabatan') == 3){
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
			<h2><small>Data Head PO</small></h2>
			<br/>
			<table class="table bordered border hovered" id="table">

				<thead>
					<!--<tr>
						<th colspan="3">
							<div class="place-right">
								<?php
								if($id != ''){
							?>
								<input type="hidden" id="id_projek_reload" value="<?php echo $id; ?>" />
							<?php
								}
							?>
							<select id="select" name="id_proyek" class="id_proyek" style="width:380px;">
							<?php
								$jml_proyek	= count($id_project);
								if($jml_proyek > 0){
									for($j=0; $j<$jml_proyek; $j++) {
							?>
										<option value="<?php echo $id_project[$j]; ?>"><?php echo $id_project[$j]; ?></option>
							<?php
									}		
								}
							?>
							</select>
						</div>
						</th>
					</tr>-->
					<tr>
						<th>Nomor Invoice</th>
						<th>ID Proyek</th>
						<th>Total Harga</th>
						<th>Tanggal Dibuat</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$jml = count($id_proyek);
						for ($i=0; $i < $jml; $i++) { 
					?>
					<tr id="tableproject_<?php echo $id_proyek[$i]; ?>" onclick="FindDatainvoice('<?php echo $id_proyek[$i]; ?>',<?php echo $id_rec[$i]; ?>)">
						<td><?php echo $id_rec[$i]; ?></td>
						<td><?php echo $id_proyek[$i]; ?></td>
						<td><?php echo $total[$i]; ?></td>
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
			<br/>
			<br/>
		</div>
		
	</body>
	<script type="text/javascript">
		function FindDatainvoice(id,invoice){
			window.location 	= '<?php echo site_url(); ?>Datase_invoice/DatasmById/' + id;
		}

		$(document).ready(function() {
			$("#table").dataTable();
			$("#select").select2();

			/*$(".id_proyek").val($("#id_projek_reload").val());

			$(".id_proyek").change(function(){
				var value 		= $(".id_proyek").val();
				window.location	= '<?php echo site_url(); ?>Datasm_headpo/DataproyeksmById/' + value;
			});*/

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