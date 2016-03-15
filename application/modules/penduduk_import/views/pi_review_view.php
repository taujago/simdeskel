<style type="text/css">
    

    .button {
   border-top: 1px solid #96d1f8;
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#65a9d7));
   background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
   background: -moz-linear-gradient(top, #3e779d, #65a9d7);
   background: -ms-linear-gradient(top, #3e779d, #65a9d7);
   background: -o-linear-gradient(top, #3e779d, #65a9d7);
   padding: 5px 10px;
   -webkit-border-radius: 8px;
   -moz-border-radius: 8px;
   border-radius: 8px;
   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
   box-shadow: rgba(0,0,0,1) 0 1px 0;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: white;
   font-size: 14px;
   font-family: Georgia, serif;
   text-decoration: none;
   vertical-align: middle;
   }
.button:hover {
   border-top-color: #28597a;
   background: #28597a;
   color: #ccc;
   }
.button:active {
   border-top-color: #1b435e;
   background: #1b435e;
   }

</style>

<div id="detail" style="min-height: 400px;" >
	 <div id="detail-head">
	 	<?php echo $title; ?>
	 </div>
	 <div style="padding : 100px">
      <form class="form-inline" id="gembreng" enctype="multipart/form-data" method="post" action="<?php echo site_url("$controller/save"); ?>">
      
      <input type="submit" class="button" value="IMPORT" />  

 	 <table width="100%" border="1" cellpadding="0">
           <tr>
             <th width="3%" scope="col"><input type="checkbox" id="selall" name="selall" value="1" /></th>
             <th width="4%" scope="col">NO.</th>
             <th width="17%" scope="col">HUBUNGAN DALAM KELAURGA</th>
             <th width="15%" scope="col">NO. KK</th>
             <th width="13%" scope="col">NIK</th>
             <th width="7%" scope="col">NAMA</th>
             <th width="12%" scope="col">TMP LAHIR</th>
             <th width="12%" scope="col">TGL LAHIR</th>
             <th width="9%" scope="col">ALAMAT</th>
             <th width="3%" scope="col">RT</th>
             <th width="5%" scope="col">RW</th>
           </tr>
        <?php 
		$i = 0;
		//show_array($data);  
		foreach($data as $index => $row) : 
		$i++;
		?>   
           <tr>
             <td scope="col"><input class="ck_data" type="checkbox" name="data[<?php echo $index; ?>]" value="<?php echo isset($index)?$index:""; ?>" /></td>
             <td scope="col"><?php echo $i; ?></td>
             <td scope="col"><?php echo $row['hubungan_dlm_keluarga']; ?></td>
             <td scope="col"><?php echo $row['no_kk']; ?></td>
             <td scope="col"><?php echo $row['nik']; ?></td>
             <td scope="col"><?php echo $row['nama']; ?></td>
             <td scope="col"><?php echo $row['tmp_lahir']; ?></td>
             <td scope="col"><?php echo flipdate($row['tgl_lahir']); ?></td>
             <td scope="col"><?php echo $row['alamat']; ?></td>
             <td scope="col"><?php echo $row['rt']; ?></td>
             <td scope="col"><?php echo $row['rw']; ?></td>
       </tr>
           <?php endforeach; ?>
         </table>
</form>
	 	
<div>
</div> 

<script>
 $(document).ready(function(){
 
$("#selall").click(function(){
	
	if(this.checked) { // check select status
            $('.ck_data').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.ck_data').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }

 	
}
);
});              
</script>