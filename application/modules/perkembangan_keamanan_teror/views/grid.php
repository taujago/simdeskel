        <table id="tt_<?php echo $id ?>" class="easyui-datagrid" style="width:1135px;height:375px"
			url="<?php echo site_url($url)  ?>" title="<?php echo $title1 ?>"  singleSelect="false" toolbar="#tb_<?php echo $id ?>" rownumbers="true" pagination="true">
		<thead>
			<tr>
            	<th field="ck" checkbox="true"></th>
				<th field='<?php echo $f1 ?>' width='700' sortable='true'><strong><?php echo $l1 ?></strong></th>
<th field='<?php echo $f2 ?>' width='150' sortable='true'><strong><?php echo $l2 ?></strong></th>
<th field='<?php echo $f3 ?>' width='150' sortable='true'><strong><?php echo $l3 ?></strong></th>
<!---->
			</tr>
			
		</thead>
       	</table>
 <script type="text/javascript">
 	$('#tt_<?php echo $id; ?>').datagrid({
		queryParams: {'table':'<?php echo "v_".$table; ?>','default':'<?php echo $default; ?>'<?php // ?>}
	});
 </script>

 <a class="easyui-linkbutton"  iconCls="icon-back" href="<?php echo site_url("perkembangan_menu"); ?>" > Kembali </a>
 