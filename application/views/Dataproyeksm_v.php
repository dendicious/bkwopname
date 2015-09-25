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
			<h2><small>Data Projek</small></h2>
			<br/>
			<table class="table bordered border hovered" id="table">

				<thead>
					<tr>
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
					</tr>
					<tr>
						<th>ID Proyek</th>
						<th>Nama Proyek</th>
						<th>ID PIC</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$jml = count($id_proyek);
						for ($i=0; $i < $jml; $i++) { 
					?>
					<tr id="tableproject_<?php echo $id_proyek[$i]; ?>" onclick="FindDatasmById('<?php echo $id_proyek[$i]; ?>')">
						<td>
							<?php echo $id_proyek[$i]; ?>
						</td>
						<td><?php echo $nama_proyek[$i]; ?></td>
						<td><?php echo $pic[$i]; ?></td>
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
		function FindDatasmById(id){
			window.location 	= '<?php echo site_url(); ?>Datasm_headpo/DatasmById/' + id;
		}

		$(document).ready(function() {
			$("#table").dataTable();
			$("#select").select2();

			$(".id_proyek").val($("#id_projek_reload").val());

			$(".id_proyek").change(function(){
				var value 		= $(".id_proyek").val();
				window.location	= '<?php echo site_url(); ?>Datasm_headpo/DataproyeksmById/' + value;
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