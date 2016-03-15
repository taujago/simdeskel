<a class="easyui-linkbutton"  iconCls="icon-back" href="<?php echo site_url("profil_menu"); ?>" > Kembali </a>
<a href="#" class="easyui-linkbutton" onclick="submit('<?php echo $id ?>')">Simpan</a>
<br />
<form id="<?php echo $id ?>" method="post">
<br />
<fieldset>
<?php 
$jl = (string)$data[0]['jumlah']; 
$ket1 = (string)$data[0]['ket1'];
$ket2 = (string)$data[0]['ket2'];
?>
<br />
	<legend><strong><?php echo $title ?></strong></legend>
    <table>
	 	<tr>
	 		<td class="wi1"><?php echo $l1 ?></td>
            <td> :
            <?php 
            $data = array("1"=>"Ada","0"=>"Tidak");
            $data = $this->cm->add_arr_head($data,"","Belum ada data");
            echo form_dropdown($f1, $data,($ket1 != null)?$ket1:""); ?>
            </td>
		</tr>
        <tr>
        <td></td>
        <td>&nbsp;
            <?php 
            $data = array("1"=>"Aktif","0"=>"Tidak");
            $data = $this->cm->add_arr_head($data,"","Belum ada data");
            echo form_dropdown($f2, $data,($ket2 != null)?$ket2:""); ?>
        </td>
        </tr>
        <tr>
        <td><?php echo $l3 ?></td>
        <td> :
        <input type="text" name="<?php echo $f3 ?>" value="<?php echo "$jl" ?>" />
        </td>
        </tr>
	</table>
    <br />
</fieldset>
</form>
<br /><br /><br />
