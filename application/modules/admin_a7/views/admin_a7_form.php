<style>
.masuk, .keluar  {
	display:none;
}
</style>
<div id="dlg" class="easyui-dialog" style="width:900px;height:500px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="title"></div>
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
		 		<legend><b>Data Agenda</b></legend>
			 <table width="790">
				
				<tr>
			 		<td width="186" > Tanggal </td> 
			 		<td width="582"> : <input type="text" name="tanggal" id="tanggal" /></td> 
			 	</tr>
			 	<tr>
			 		<td > Jenis Surat </td> 
			 		<td> : <?php 
						$arr = array("keluar"=>"Keluar","masuk"=>"Masuk");
						echo form_dropdown("jenis_surat",$arr,'','id="jenis_surat"');
					?></td> 
			 	</tr>
			 	<tr class="masuk">
			 		<td colspan="2" ><strong>Surat Masuk </strong></td> 
		 		</tr>
			 	<tr class="masuk">
			 		<td >Nomor Surat</td> 
			 		<td> : <input type="text" name="masuk_nomor" id="masuk_nomor" /></td> 
			 	</tr>
			 	 	<tr class="masuk">
			 		<td > Tanggal Surat</td> 
			 		<td> : <input type="text" name="masuk_tanggal" id="masuk_tanggal" /></td> 
			 	</tr>
			 	<tr class="masuk">
			 		<td > Pengirim</td> 
			 		<td> : <input type="text" name="masuk_pengirim" id="masuk_pengirim" /></td> 
			 	</tr>
			 	<tr class="masuk">
			 		<td > Isi Singkat</td> 
			 		<td> : <input size="80" type="text" name="masuk_isi_singkat" id="masuk_isi_singkat" /></td> 
			 	</tr>
			 	<tr class="keluar">
			 		<td colspan="2" ><strong>Surat Keluar </strong></td> 
		 		</tr>
			 	<tr class="keluar">
			 	  <td >Nomor Surat </td>
			 	  <td>:		 	      
		 	      <input type="text" name="keluar_nomor" id="keluar_nomor" /></td>
		 	   </tr>
			 	<tr class="keluar">
			 	  <td >Tanggal Surat </td>
			 	  <td>: 
		 	      
		 	      <input type="text" name="keluar_tanggal" id="keluar_tanggal" /></td>
		 	   </tr>
			 	<tr class="keluar">
			 	  <td >Tujuan</td>
			 	  <td>: 
		 	      <input type="text" name="keluar_tujuan" id="keluar_tujuan" /></td>
		 	   </tr>
			 	<tr class="keluar">
			 	  <td >Isi Singkat </td>
			 	  <td>: 
		 	      <input size="80" type="text" name="keluar_isi_singkat" id="keluar_isi_singkat" /></td>
		 	   </tr>
			 	<tr>
			 	  <td >Keterangan</td>
			 	  <td>: 
		 	      <input size="80" type="text" name="keterangan" id="keterangan" /></td>
		 	   </tr>
          </table>
			 
			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 