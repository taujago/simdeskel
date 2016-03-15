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
       
       <h2>IMPORT DATA PENDUDUK SELESAI </h2>
       <span style="color:green">Data berhasil diproses <?php echo $berhasil; ?> </span><br />
        <span style="color:red">Data gagal diproses <?php echo $gagal; ?> </span>
        <hr />

        <?php 
          foreach($arr_berhasil as $x) : 
            echo "$x berhasil disimpan <br />";
            endforeach;
        ?>
         <?php 
          foreach($arr_gagal as $x) : 
            echo "$x gagal disimpan. NIK sudah ada  <br />";
            endforeach;
        ?>
	 	
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