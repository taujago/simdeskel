
<form target="<?php echo site_url("register/key") ?>" method="post">
	<input type="text" name="serial" value="<?php echo $serial; ?>" /> 
	<input type="submit" name="Generate" value="Generate" />
</form>
<hr /> 
<?php echo isset($aktivasi)?$aktivasi:""; ?>