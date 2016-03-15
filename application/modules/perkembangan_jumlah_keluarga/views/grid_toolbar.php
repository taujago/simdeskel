<div style="display:none" id="tb_<?php echo $id ?>" style="padding:5px;height:auto">
	<div >
    	<a class="easyui-linkbutton"  iconCls="icon-back" href="<?php echo site_url("perkembangan_menu"); ?>" > Kembali </a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="baru('<?php echo $id ?>')" >Tambah Baru</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit('<?php echo $id ?>')" >Edit</a>
 		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus('<?php echo $id ?>')">Hapus</a>
		<a href="#" class="easyui-linkbutton easyui-tooltip" title="Tekan tombol ini untuk mengambil dan memasukkan data Jumlah KK tahun ini kedalam database serta mengkalkulasi persentase perkembangan KK" iconCls="icon-reload" plain="true" onclick="reload('<?php echo $id ?>')">Ambil data KK tahun ini dan kalkulasi</a>
		<br />
		 
	</div>

</div>