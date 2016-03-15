<fieldset>
<br />
	<legend><strong><?php echo $label ?> </strong></legend>
    <a href="javascript:void(0)" class="easyui-linkbutton <?php echo $id ?>" onclick="jQuery('#table_<?php echo $id ?>').toggle('slow');jQuery('a.<?php echo $id ?>').toggle();">Sembunyikan</a> 
<a href="javascript:void(0)" style="display:none" class="easyui-linkbutton <?php echo $id ?>" onclick="jQuery('#table_<?php echo $id ?>').toggle('slow');jQuery('a.<?php echo $id ?>').toggle();">Tampilkan</a> 
	 	<table id="table_<?php echo $id ?>">
        <?php
		$temp = explode("id_",$ck_name);
		$table1 = "penduduk_".$temp[1];
		?>
        <input type="hidden" name="tab_name[]" value="<?php echo $table1 ?>" />
	 	<tr>
                <td>
                	<table style="float:left">
            		<tr><td>
						<?php
						//$arr_danau = $this->dm->arr_transportasi($arr_detail["id_penduduk"]);
                        $c = 0;
                        $arr = $this->cm->arr_tabel($table,$id_t,$data_t,$data_t); 
                        foreach($arr as $key=>$value)
                        {
							if(in_array($key,$arr_danau)){$check = true;}
							else{ $check = false; }
                            echo form_checkbox($ck_name."[]",$key, $check);
                            echo " : ";
                            echo $value;
                            echo "<br>";
                            $c++;
                            if($c%10 == 0)echo "</td></tr></table><table style='float:left'><tr><td>";
                        }
                        ?> 
        			</td></tr>
            		</table>
           		</td>
	 	</tr>
        </table>
  <br />
</fieldset>