<div id="dlg" class="easyui-dialog" style="width:600px;height:300px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
<table>
				
				<tr>
			 		<td width="200px">Penetapan Batas </td> 
			 		<td> : <?php $data = array("1"=>"Sudah ada","0"=>"Belum Ada");
				echo form_dropdown("penetapan_batas", $data ,"",'id="penetapan_batas"'); ?></td>
			 	</tr>		 		 
			 	 
		 </table>
			 <table>
			   <tr>
			     <td width="200px" height="24">Perdes No</td>
			     <td> :
		         <input size="40" type="text" name="perdes" /></td>
		       </tr>
		      </table>
			 <table>
			   <tr>
			     <td width="200px">Perda No</td>
			     <td> :
			       <input size="40" type="text" name="perda"/></td>
		       </tr>
		      </table>
			 <table>
			   <tr>
			     <td width="200px">Peta Wilayah</td>
			     <td> :
			        <?php $data = array("1"=>"Ada","0"=>"Tidak");
				echo form_dropdown("peta_wilayah", $data ,"",'id="peta_wilayah"'); ?></td>
		       </tr>
		      </table>
			 <p>&nbsp;</p>
            </fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 