
        <table id="tt_<?php echo $id ?>" class="easyui-datagrid" style="width:1135px;height:200px"
			url="<?php echo site_url($url)  ?>" title="<?php echo $title1 ?>"  singleSelect="false" toolbar="#tb_<?php echo $id ?>" rownumbers="true" pagination="true">
		<thead>
			<tr>
            	<th field="ck" checkbox="true"></th>
				<th field='<?php echo $f1 ?>' width='100' sortable='true'><strong><?php echo $l1 ?></strong></th>
                <th field='<?php echo $f7 ?>' width='100' sortable='true'><strong><?php echo $l7 ?></strong></th>
                <th field='<?php echo $f2 ?>' width='200' sortable='true'><strong><?php echo $l2 ?></strong></th>
                <th field='<?php echo $f3 ?>' width='100' sortable='true'><strong><?php echo $l3 ?></strong></th>
                <th field='<?php echo $f4 ?>' width='110' sortable='true'><strong><?php echo $l4 ?></strong></th>
                <th field='<?php echo $f5 ?>' width='230' sortable='true'><strong><?php echo $l5 ?></strong></th>
                <th field='<?php echo $f6 ?>' width='230' sortable='true'><strong><?php echo $l6 ?></strong></th>
                <!---->
			</tr>
			
		</thead>
       	</table>
 <script type="text/javascript">
 	$('#tt_<?php echo $id; ?>').datagrid({
		queryParams: {'table':'<?php echo $table; ?>','default':'<?php echo $default; ?>','del':'de'}
	});
 </script>
<div style="display:none" id="tb_<?php echo $id ?>" style="padding:5px;height:auto">
 <a class="easyui-linkbutton"  iconCls="icon-back" href="<?php echo site_url("profil_menu"); ?>" > Kembali </a>
 <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit('<?php echo $id ?>')" >Edit</a>
 </div>