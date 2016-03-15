<div id="dlg" class="easyui-dialog" style="width:900px;height:500px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
  <form id="fm" method="post" novalidate>			 
<input type="hidden" name="id" id="id" />
		 	<fieldset >
 		  <legend><b>Data Aparatur</b></legend>
			 <table width="714">
				
				<tr>
			 		<td width="279">Nama</td> 
			 		<td width="423"> : <input size="40" type="text" name="nama" id="nama" /></td>
			 	</tr>
				<tr>
				  <td>Nomor Induk Aparatur Pemerintah Desa</td>
				  <td>: 
			      <input size="40" type="text" name="niap" id="niap" /></td>
			   </tr>
				<tr>
				  <td>NIP / NRP </td>
				  <td>: 
			      <input size="40" type="text" name="nip" id="nip" /></td>
			   </tr>
				<tr>
				  <td>Jenis Kelamin</td>
				  <td>: <?php echo form_dropdown("jk",array("L"=>"L","P"=>"P"),'','id="jk"'); ?></td>
			   </tr>
				<tr>
				  <td>Tempat Lahir</td>
				  <td>: 
			      <input size="40" type="text" name="tmp_lahir" id="tmp_lahir" /></td>
			   </tr>
				<tr>
				  <td>Tanggal Lahir</td>
				  <td>: 
			      <input size="40" type="text" name="tgl_lahir" id="tgl_lahir" /></td>
			   </tr>
				<tr>
				  <td>Agama </td>
				  <td>: <?php
				  $arr_agama = $this->cm->arr_agama();
				  echo form_dropdown("id_agama",$arr_agama,'','id="id_agama"');
				  
				  ?></td>
			   </tr>
				<tr>
				  <td>Pangkat </td>
				  <td>: 
			      <input size="40" type="text" name="pangkat" id="pangkat" /></td>
			   </tr>
				<tr>
				  <td>Golongan</td>
				  <td>: 
			      <input size="5" type="text" name="golongan" id="golongan" /></td>
			   </tr>
				<tr>
				  <td>Jabatan</td>
				  <td>: 
			      <input size="40" type="text" name="jabatan" id="jabatan" /></td>
			   </tr>
				<tr>
				  <td>Pendidikan Terakhir</td>
				  <td>: 
			      <input size="40" type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" /></td>
			   </tr>
				<tr>
				  <td>No. Keputusan Pengangkatan</td>
				  <td>: 
			      <input size="40" type="text" name="pengangkatan_nomor" id="pengangkatan_nomor" /></td>
			   </tr>
				<tr>
				  <td>Tanggal Keputusan Pengangkatan</td>
				  <td>: 
			      <input size="40" type="text" name="pengangkatan_tanggal" id="pengangkatan_tanggal" /></td>
			   </tr>
				<tr>
				  <td>No. Keputusan Pemberhentian</td>
				  <td>: 
			      <input size="40" type="text" name="pemberhentian_nomor" id="pemberhentian_nomor" /></td>
			   </tr>
				<tr>
				  <td>Tanggal Keputusan Pemberhentian </td>
				  <td>: 
			      <input size="40" type="text" name="pemberhentian_tanggal" id="pemberhentian_tanggal" /></td>
			   </tr>
				<tr>
				  <td>Keterangan</td>
				  <td>: 
			      <input name="keterangan" type="text" id="keterangan" size="60" /></td>
			   </tr>
          </table>
			 
			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 