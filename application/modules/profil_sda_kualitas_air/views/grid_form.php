<div id="dlg_<?php echo $id ?>" class="easyui-dialog" style="width:600px;height:250px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm_<?php echo $id ?>" method="post" novalidate>			 
           <input type="hidden" class="<?php echo $id ?>" name="tab" id="tab" value="<?php echo $table ?>" />
            <input type="hidden" class="<?php echo $id ?>" name="id" id="id" value="" />
		 	<fieldset >
			 <table>
				
				<tr>
                <td width='200px'><?php echo $l1 ?> </td>
                <td> : <?php $temp = explode('_teks',$f1); echo form_dropdown($temp[0], $arr1); ?></td>
                </tr>
                <tr>
                <td width='200px'><?php echo $l2 ?> </td>
                <td> : <?php $temp = explode('_teks',$f2); echo form_dropdown($temp[0], $arr2); ?></td>
                </tr>
                <!---->
             
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan('<?php echo $id ?>')">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_<?php echo $id ?>').dialog('close')">Cancel</a>
	</div>
<input type="hidden" id="table" class="<?php echo $id ?>" value="<?php echo $table ?>" />
<input type="hidden" id="title2" class="<?php echo $id ?>" value="<?php echo $title2 ?>" />