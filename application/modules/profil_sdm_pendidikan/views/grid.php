
        <table id="tt_<?php echo $id ?>" class="easyui-datagrid" style="width:1135px;height:450px"
			url="<?php echo site_url($url)  ?>" title="<?php echo $title1 ?>"  singleSelect="false" toolbar="#tb_<?php echo $id ?>" rownumbers="true" pagination="true" showFooter="true">
		<thead>
			<tr>
				<th field='<?php echo $f1 ?>' width='350' sortable='true'><strong><?php echo $l1 ?></strong></th>
<th field='<?php echo $f2 ?>' width='200' sortable='true'><strong><?php echo $l2 ?></strong></th>
<th field='<?php echo $f3 ?>' width='200' sortable='true'><strong><?php echo $l3 ?></strong></th>
<!---->
			</tr>
			
		</thead>
       	</table>
 <script type="text/javascript">
 	$('#tt_<?php echo $id; ?>').datagrid({
		queryParams: {'table':'v_<?php echo $table; ?>','default':'<?php echo $default; ?>'}
	});
 </script>

 
 