<?php 
$count = count($row[0]);
if($count==0){$count=2;}
$count++;
if(!empty($t))echo "$t<br><br>";
if(!empty($t1))echo "<div class='menjorok'>$t1</div>";
$class = "class='menjorok";
if($m == '1')$class .= " dekat";
$class .= "'";
$table_exc = array("0"=>"produksi_perkebunan","1"=>"sumber","2"=>"jumlah","3"=>"pemanfaatan_teks");
?>
<table <?php  echo $class ?> style="border:1px solid black;border-collapse:separate;border-spacing:0">
	<?php if(!empty($merge)) echo $merge; ?>
  <tr>
  	<?php 
	foreach($data as $val)
	{ if(empty($val['skip'])) { ?> 
    	<th <?php if(!empty($h))echo "style='display:none;'" ?> width='<?php echo isset($val['width'])?$val['width']:'200' ?>' class="thin<?php if($val['c'] == 'l')echo " left"?>" <?php echo $val['tambahan'] ?>><?php echo isset($val['title'])?$val['title']:"&nbsp;"; ?>&nbsp;</th>
	<?php } } ?>
  </tr>
  <?php
  
  foreach($row as $val)
  {
 		echo "<tr>";
		$c = 0;
		foreach($val as $val1)
		{
			if(empty($val1) || $val == '0') $pr = '&nbsp;';
			else{
				if(!empty($data[$c]['sisip']))$pr = $val1.$data[$c]['sisip'];
				else $pr = $val1;
			}
			$w = $data[$c]['width'];
			if($data[$c]['c']=='c')$cen = "style='text-align:center'";
			else $cen = '';
			
			//$cen = !empty($data[$c]['c'])?"style='text-align:center'":'';
			echo "<td width='$w' $cen class='thin'>$pr&nbsp;</td>";
			$c++;
		}
		echo "</tr>";
  }
  if($b == '1'){
	 echo "<tr>";
	  foreach($data as $val)
	{
		echo "<td class='thin'>&nbsp;</td>";
	}
	echo "</tr>";
  }
  ?>
</table>
<p style="clear:both"></p>