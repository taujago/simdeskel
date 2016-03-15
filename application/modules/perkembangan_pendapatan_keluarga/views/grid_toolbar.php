<div style="display:none" id="tb_<?php echo $id ?>" style="padding:5px;height:auto">
	<div >
    	<a class="easyui-linkbutton"  iconCls="icon-back" href="<?php echo site_url("perkembangan_menu"); ?>" > Kembali </a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit('<?php echo $id ?>')" >Edit</a>
		<a href="#" class="easyui-linkbutton easyui-tooltip" title="Tekan tombol ini untuk mengambil dan memasukkan data KK kedalam database" iconCls="icon-reload" plain="true" onclick="reload('<?php echo $id ?>')">Ambil data KK</a>
		<br />
		 
	</div>

</div>