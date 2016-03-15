 <ul class="menuitems">
    <?php 
		foreach($record->result() as $row) : 
		?>
        <li><?php echo anchor("$row->controller", "$row->id .  $row->menu"); ?>
        </li>
        <?php
		endforeach;
	?>
  </ul>