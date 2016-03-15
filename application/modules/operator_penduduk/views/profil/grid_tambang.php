<fieldset>
<legend><strong><?php echo $title1 ?> </strong></legend>
    <br />
    	<table id="tt_<?php echo $id ?>" class="easyui-datagrid" style="width:1135px;height:375px"
			url="<?php echo site_url($url)  ?>" title="<?php echo $title2 ?>"  singleSelect="false" toolbar="#tb_<?php echo $id ?>" rownumbers="true" pagination="true">
		<thead>
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="<?php echo $f1 ?>" width="300" sortable="true"><strong><?php echo $l1 ?></strong> </th>
				<th field="<?php echo $f2 ?>" width="100" sortable="true"><strong><?php echo $l2 ?></strong> </th>
                <th field="<?php echo $f5 ?>" width="100" sortable="true"><strong><?php echo $l5 ?></strong> </th>
                <th field="<?php echo $f3 ?>" width="100" sortable="true"><strong><?php echo $l3 ?></strong> </th>
                <th field="<?php echo $f4 ?>" width="100" sortable="true"><strong><?php echo $l4 ?></strong> </th>
                <th field="pemasaran_hasil" width="300" sortable="true"><strong>Pemasaran Hasil</strong> </th>
			</tr>
			
		</thead>
       	</table>
 <br />
</fieldset>
 <script type="text/javascript">
 	$('#tt_<?php echo $id; ?>').datagrid({
		queryParams: {'id_penduduk':'<?php echo $id_penduduk; ?>','id1':'<?php echo $id1; ?>','id2':'<?php echo $id2; ?>','table':'<?php echo $table; ?>','table_m':'<?php echo $table_m; ?>'}
	});
 </script>