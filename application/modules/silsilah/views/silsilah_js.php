<script>
$(document).ready(function(){
						   
 // $('#id_penduduk').combogrid({
	// 			panelWidth:800,
	// 			url: '<?php echo site_url('general/penduduk_dropdown_desa/') ?>',
	// 			idField:'id_penduduk',
	// 			textField:'nama',
	// 			mode:'remote',
	// 			fitColumns:true,
	// 			columns:[[
	// 				//{field:'id_member',title:'ID',width:60},
	// 				{field:'nik',title:'NIK',width:200},
	// 				{field:'nama',title:'Nama Member',width:200},
	// 				{field:'tmp_lahir',title:'Tmp. Lahir',width:100},
	// 				{field:'tgl_lahir',title:'Tgl. lahir',width:100},
	// 				{field:'rt',title:'RT',width:30},
	// 				{field:'rw',title:'RW',width:30},
	// 				{field:'desa',title:'Desa',width:60}
					 
	// 			]]
				
	// });

});

function silsilah() {
vid_penduduk = $('#id_penduduk').val();
getdata(vid_penduduk);
}


function getdata(vid_penduduk){
	
	//$("#id_penduduk").val();
	console.log(vid_penduduk);
	$.ajax({
		url:'<?php echo site_url("silsilah/data_silsilah") ?>/'+vid_penduduk,
		success : function(result) {
			
			$("#hasil").show('fast').html(result);
		}
	});
}


function cetak_silsilah(vid_penduduk) {
	window.open('<?php echo site_url("silsilah/cetak_silsilah") ?>/'+vid_penduduk);
}
</script>