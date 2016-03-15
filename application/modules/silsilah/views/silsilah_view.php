<style>
#hasil {
	border : #999 solid 1px;
	margin:10px;
	padding:10px;
	display:none;
}
</style>
<div id="detail" style="min-height: 600px; width:1132px; " >
	 <div id="detail-head">
	 	SILSILAH KELUARGA 
	 </div>


<div>
	
    <div style="margin:20px 10px ; border-bottom:#999 solid 1px; padding-bottom:10px">
    Cari Nama Penduduk : 
    <input type="text" name="id_penduduk" id="id_penduduk" style="width:500px;" /> 

    <a  class="easyui-linkbutton" iconCls="icon-search" 
			 			 href="javascript:show_dialog('id_penduduk');">
			 			cari </a>
			 			
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="silsilah()">Lihat Silsilah</a>
    </div>
</div>
<div id="hasil"></div>

<div>
<?php 
$this->load->view("silsilah_js");
$this->load->view("search_penduduk_view");
$this->load->view("search_penduduk_js");
?>
  
  