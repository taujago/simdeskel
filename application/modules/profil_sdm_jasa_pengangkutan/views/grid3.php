
        <table id="tt_<?php echo $id ?>" class="easyui-datagrid" style="width:1135px;height:375px"
			url="<?php echo site_url($url)  ?>" title="<?php echo $title1 ?>"  singleSelect="false" toolbar="#tb_<?php echo $id ?>" rownumbers="true" pagination="true">
		<thead>
			<tr>
            	<th field="ck" checkbox="true"></th>
				<th field='<?php echo $f1 ?>' width='300' sortable='true'><strong><?php echo $l1 ?></strong></th>
                <th field='<?php echo $f2 ?>' width='150' sortable='true'><strong><?php echo $l2 ?></strong></th>
                <th field='<?php echo $f3 ?>' width='150' sortable='true'><strong><?php echo $l3 ?></strong></th>
                <th field='<?php echo $f4 ?>' width='150' sortable='true'><strong><?php echo $l4 ?></strong></th>
                <th field='<?php echo $f5 ?>' width='150' sortable='true'><strong><?php echo $l5 ?></strong></th>
                <!---->
			</tr>
			
		</thead>
       	</table>
 <script type="text/javascript">
 	$('#tt_<?php echo $id; ?>').datagrid({
		queryParams: {'table':'<?php echo 'v_'.$table; ?>','default':'<?php echo $default; ?>'}
	});
 </script>
 
 