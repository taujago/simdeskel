	<div id="detail" style="min-height: 500px;" >
	 <div id="detail-head">
	 	Laporan Penduduk Bulanan	 </div>

<div>

	<div style="margin:100px 0px;">
    
    <div style="border-top:#999 solid 1px;border-bottom:#999 solid 1px; padding:10px 300px;">
    Pilih Bulan  <?php echo form_dropdown("bulan",$this->add->arr_bulan,'','id="bulan"'); ?> 
    <a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="false" onclick="cetak()" >Cetak</a>
    </div>
    
    </div>

</div>
</div>

<?php 
//$this->load->view($controller."_form");
$this->load->view($controller."_js");
$this->load->view("js/global_js");
?>