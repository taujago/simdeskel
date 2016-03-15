<div id="dlg_<?php echo $id ?>" class="easyui-dialog" style="width:600px;height:300px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm_<?php echo $id ?>" method="post" novalidate>			 
			<input type="hidden" name="id_penduduk" id="id_penduduk" value="<?php echo $id_penduduk; ?>" />
            <input type="hidden" class="<?php echo $id ?>" name="tab" id="tab" value="<?php echo $table ?>" />
            <input type="hidden" class="<?php echo $id ?>" name="id" id="id" value="" />
		 	<fieldset >
			 <table>
				
				<tr>
			 		<td width="200px"><?php echo $l1 ?> </td> 
			 		<td> : <?php echo form_dropdown("$id2", $this->cm->arr_tabel("$table_m","$id1","$f1","$f1")); ?></td>
			 	</tr>		 		 
			 	 <tr>
			 		<td width="200px"><?php echo $l2 ?> </td> 
			 		<td> : <input size="40" type="text" name="<?php echo $f2 ?>" id="<?php echo $f2 ?>" /></td>
			 	</tr>
                <tr>
			 		<td width="200px"><?php echo $l5 ?> </td> 
			 		<td> : <?php echo form_dropdown("satuan_bahan_galian", $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan")); ?></td>
			 	</tr>
                <tr>
			 		<td width="200px"><?php echo $l3 ?> </td> 
			 		<td> : <?php 
					$options = array(
                  'Ya'  => 'Ya',
                  'Tidak'    => 'Tidak'
               		 );
					echo form_dropdown($f3, $options); ?></td>
			 	</tr>
                <tr>
			 		<td width="200px"><?php echo $l4 ?> </td> 
			 		<td> : <?php 
					$options = array(
                  'Ya'  => 'Ya',
                  'Tidak'    => 'Tidak'
               		 );
					echo form_dropdown($f4, $options); ?></td>
			 	</tr>
                <tr>
			 		<td width="200px">Pemasaran Hasil </td> 
			 		<td> : <?php echo form_dropdown("id_pemasaran_hasil", $this->cm->arr_tabel("master_pemasaran_hasil","id_pemasaran_hasil","pemasaran_hasil","pemasaran_hasil")); ?></td>
			 	</tr>
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan('<?php echo $id ?>')">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_<?php echo $id ?>').dialog('close')">Cancel</a>
	</div>
<input type="hidden" id="title2" class="<?php echo $id ?>" value="<?php echo $title2 ?>" />
<input type="hidden" id="table" class="<?php echo $id ?>" value="<?php echo $table ?>" />