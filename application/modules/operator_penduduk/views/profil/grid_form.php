<div id="dlg_<?php echo $id ?>" class="easyui-dialog" style="width:600px;height:250px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm_<?php echo $id ?>" method="post" novalidate>
        	<input type="hidden" name="id_penduduk" id="id_penduduk" value="<?php echo $id_penduduk; ?>" />		 
           	<input type="hidden" class="<?php echo $id ?>" name="tab" id="tab" value="<?php echo $table ?>" />
            <input type="hidden" class="<?php echo $id ?>" name="id" id="id" value="" />
		 	<fieldset >
			 <table>
                <tr>
                <td width='200px'><?php echo $l1 ?> </td>
                <td> : <?php $temp = explode('_teks',$f1); echo form_dropdown($temp[0], $arr1,'','style="width: 260px;"'); ?></td>
                </tr>
                <tr>
                <td width='200px'><?php echo $l2 ?></td>
                <td> : <input size='40' type='text' name='<?php echo $f2 ?>' id='<?php echo $f2 ?>' /></td>
                </tr>
                <!---->
             
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="save1('<?php echo $id ?>')">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_<?php echo $id ?>').dialog('close')">Cancel</a>
	</div>
<input type="hidden" id="table" class="<?php echo $id ?>" value="<?php echo $table ?>" />
<input type="hidden" id="title2" class="<?php echo $id ?>" value="<?php echo $title2 ?>" />

<div style="display:none" id="tb_<?php echo $id ?>" style="padding:5px;height:auto">
	<div >
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="baru1('<?php echo $id ?>')" >Tambah Baru</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit1('<?php echo $id ?>')" >Edit</a>
 		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus1('<?php echo $id ?>')">Hapus</a>
		<br />
		 
	</div>

</div>