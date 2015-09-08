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
			<h2><small>Data Material Office Engineering</small></h2>
			<br/>
			<table class="table bordered border hovered" id="table">
				<thead>
					<th colspan="6">
						<div class="place-right">
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
					</th>
					<tr>
						<th>ID Proyek</th>
						<th>Nama Proyek</th>
						<th>ID PIC</th>
						<th>ID Produk</th>
						<th>Volume</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$jml = count($id_proyek);
						for ($i=0; $i < $jml; $i++) { 
					?>
					<tr>
						<td><?php echo $id_proyek[$i]; ?></td>
						<td><?php echo $nama_proyek[$i]; ?></td>
						<td><?php echo $pic[$i]; ?></td>
						<td><?php echo $id_produk[$i]; ?></td>
						<td><?php echo $volume[$i]; ?></td>
						<td>
							<button class="button rounded primary add" id="add_<?php echo $no_rec[$i]; ?>"><span class="mif-plus icon"></span></button>
							<button class="button rounded danger delete" id="delete_<?php echo $no_rec[$i]; ?>"><span class="mif-minus icon"></span></button>
						</td>
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
		$(document).ready(function() {
			$("#table").dataTable();

			$("#select").select2();

			$(".id_proyek").change(function(){
				var value = $(".id_proyek").val();
				
			});
		});
	</script>
	<?php
			}
		}
	?>