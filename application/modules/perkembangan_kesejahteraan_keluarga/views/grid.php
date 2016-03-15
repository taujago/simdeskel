        <table id="tt_<?php echo $id ?>" class="easyui-datagrid" style="width:1135px;height:375px"
			url="<?php echo site_url($url)  ?>" title="<?php echo $title1 ?>"  singleSelect="false" toolbar="#tb_<?php echo $id ?>" rownumbers="true" pagination="true" showFooter="true">
		<thead>
			<tr>
            	<th field="ck" checkbox="true"></th>
				<th field='<?php echo $f1 ?>' width='400' sortable='true'><strong><?php echo $l1 ?></strong></th>
<th field='<?php echo $f2 ?>' width='200' sortable='true'><strong><?php echo $l2 ?></strong></th>
<!---->
			</tr>
			
		</thead>
       	</table>
 <script type="text/javascript">
 	$('#tt_<?php echo $id; ?>').datagrid({
		queryParams: {'table':'<?php echo $table; ?>','default':'<?php echo $default; ?>',"del":"del"}
	});
 </script>
 