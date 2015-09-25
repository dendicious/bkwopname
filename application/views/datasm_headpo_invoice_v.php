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
			<h2><small>Data Material Site Manager</small></h2>
			<br/>
			<table class="table bordered border hovered" id="table">

				<thead>
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
						$jml 	= count($id_project);
						$total 	= 0;
						for ($i=0; $i < $jml; $i++) { 
					?>
					<tr>
						<td>
							<?php echo $id_project[$i]; ?>
							<input type="hidden" id="id_proyek_<?php echo $no_rec[$i]; ?>" value="<?php echo $id_project[$i]; ?>" />
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
							$total 			= $total + $total_harga[$i];
							$no_invoicedb	= $no_invoice[$i];
							$idproject 		= $id_project[$i];
						}
						echo "<input type='hidden' id='akumulasitotalharga' name='akumulasitotalharga' value='".$total."' />";
						echo "<input type='hidden' id='no_invoice' name='no_invoice' value='".$no_invoicedb."' />";
						echo "<input type='hidden' id='idproject' name='idproject' value='".$idproject."' />";
					?>
				</tbody>
			</table>
			<table class="place-right" style="margin-right:0px;font-size:12pt;">
				<tbody>
					<tr>
						<th >Total Harga :</th>
						<th>Rp. <?php echo number_format($total,0,",","."); ?>,00</th>
					</tr>
				</tbody>
			</table>
			<br/>
			<br/>
			Potongan (ditanggung oleh perusahaan):
			<table class="table">
				<tbody>
					<tr>
						<td>Retensi</td>
						<td>:</td>
						<td>
							<div class="input-control text" style="width:50px;">
							    <input type="number" id="retensi" name="retensi" />
							</div>
						</td>
						<td>%</td>
						<td>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>Total<font style="color:#FFFFFF;">_</font>Potongan</td>
						<td>:</td>
						<td>
							<div class="input-control text" style="width:50px;">
							    <input type="number" id="jmlpersentasepotongan" name="jmlpersentasepotongan" readonly="readonly" />
							</div>
						</td>
						<td>%</td>
						<td> X </td>
						<td>
							<div class="input-control text" style="width:110px;">
							    <input type="number" id="totalharga" name="totalharga" readonly="readonly" />
							</div>
						</td>
						<td> = </td>
						<td>
							<div class="input-control text" style="width:110px;">
							    <input type="number" id="totalpotongan" name="totalpotongan" readonly="readonly" />
							</div>
						</td>
					</tr>
					<tr>
						<td>Kebersihan</td>
						<td>:</td>
						<td>
							<div class="input-control text" style="width:50px;">
							    <input type="number" id="kebersihan" name="kebersihan" />
							</div>
						</td>
						<td>%</td>
						<td>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td>Total<font style="color:#FFFFFF;">_</font>Bersih</td>
						<td>:</td>
						<td colspan="2">
							<div class="input-control text" style="width:110px;">
							    <input type="number" id="totalhargabersih" name="totalhargabersih" readonly="readonly" />
							</div>
						</td>
						<td> - </td>
						<td>
							<div class="input-control text" style="width:110px;">
							    <input type="number" id="totalpotonganbersih" name="totalpotonganbersih" readonly="readonly" />
							</div>
						</td>
						<td> = </td>
						<td>
							<div class="input-control text" style="width:110px;">
							    <input type="number" id="totalbersih" name="totalbersih" readonly="readonly" />
							</div>
						</td>
					</tr>
					<tr>
						<td>Repair</td>
						<td>:</td>
						<td>
							<div class="input-control text" style="width:50px;">
							    <input type="number" id="repair" name="repair" />
							</div>
						</td>
						<td>%</td>
						<td>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
						<td colspan="8"><button class="button mif-floppy-disk primary rounded place-right save"> Simpan </button></td>
					</tr>
					<tr>
						<td>PPH</td>
						<td>:</td>
						<td>
							<div class="input-control text" style="width:50px;">
							    <input type="number" id="pph" name="pph" />
							</div>
						</td>
						<td>%</td>
					</tr>	
				</tbody>
			</table>

			<div data-role="dialog" id="alert_data" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="500px" class="padding20">
				<br/>
				<span class="mif-notification mif-3x fg-green" style="color:#FF5500"></span> Jumlah total dari potongan harus sama dengan 12%
				<br/>
				<button class="button rounded success ok_alert_data place-right"><span class="mif-thumbs-up icon"></span> OK</button>
			</div>

			<div data-role="dialog" id="alert_field" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-width="500px" class="padding20">
				<br/>
				<span class="mif-notification mif-3x fg-green" style="color:#FF5500"></span> Data potongan masih kosong!
				<br/>
				<button class="button rounded success ok_alert_field place-right"><span class="mif-thumbs-up icon"></span> OK</button>
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

			function showAlert(jml){
				if(jml > 12){
					showDialog('#alert_data');
				}
				else{
					$("#jmlpersentasepotongan").val(jml);
					hitung_potongan();
				}
			}

			function hitung_potongan(){
				var persentase 	= $("#jmlpersentasepotongan").val();
				var totalharga 	= $("#totalharga").val();
				var persenan 	= persentase/100;
				var total 		= Number(persenan) * Number(totalharga);

				$("#totalpotongan").val(total);
				$("#totalpotonganbersih").val(total);
				hitung_bersih();
			}

			function hitung_bersih(){
				var totalharga 		= $("#totalhargabersih").val();
				var totalpotongan 	= $("#totalpotonganbersih").val();
				var total 			= Number(totalharga) - Number(totalpotongan);

				$("#totalbersih").val(total);
			}

			$("#totalharga").val($("#akumulasitotalharga").val());

			$("#totalhargabersih").val($("#akumulasitotalharga").val());

			$("#retensi").focus();

			//$("#table").dataTable();

			$("#select").select2();

			$(".ok_alert_data").click(function(){
				closeDialog('#alert_data');
			});

			$(".ok_alert_field").click(function(){
				closeDialog('#alert_field');
			});

			$("#retensi").change(function(){
				var retensi 	= $("#retensi").val();
				$("#kebersihan").focus();
				showAlert(retensi);
			});

			$("#kebersihan").change(function(){
				var retensi 	= $("#retensi").val();
				var kebersihan 	= $("#kebersihan").val();
				var total 		= Number(retensi) + Number(kebersihan);
				$("#repair").focus();
				showAlert(total);
			});

			$("#repair").change(function(){
				var retensi 	= $("#retensi").val();
				var kebersihan 	= $("#kebersihan").val();
				var repair 		= $("#repair").val();
				var total 		= Number(retensi) + Number(kebersihan) + Number(repair);
				$("#pph").focus();
				showAlert(total);
			});

			$("#pph").change(function(){
				var retensi 	= $("#retensi").val();
				var kebersihan 	= $("#kebersihan").val();
				var repair 		= $("#repair").val();
				var pph 		= $("#pph").val();
				var total 		= Number(retensi) + Number(kebersihan) + Number(repair) + Number(pph);
				$(".save").focus();
				showAlert(total);
			});

			$(".save").click(function(){
				var no_invoice 		= $("#no_invoice").val();
				var idproject 		= $("#idproject").val();
				var retensi 		= $("#retensi").val();
				var kebersihan 		= $("#kebersihan").val();
				var repair 			= $("#repair").val();
				var pph 			= $("#pph").val();
				var totalharga 		= $("#totalharga").val();
				var totalpotongan 	= $("#totalpotongan").val();
				var totalbersih 	= $("#totalbersih").val();

				if(retensi == '' && kebersihan == '' && repair == '' && pph == ''){
					showDialog('#alert_field');
				} 
				else{
					$.ajax({
						url: "<?php echo site_url(); ?>Datasm_headpo/save",
						data: {no_invoice:no_invoice,idproject:idproject,retensi:retensi,kebersihan:kebersihan,repair:repair,pph:pph,totalharga:totalharga,totalpotongan:totalpotongan,totalbersih:totalbersih},
						type: "post",
						success: function(data){
							window.location	= '<?php echo site_url(); ?>Datasm_headpo/Dataproyeksm';
						}
					});
				}
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