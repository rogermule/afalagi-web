
<li class="list-group-item">
	<h4 class="list-group-item-heading">
		<span class="number"> <?php echo($count);?></span> <span class="name"><?php echo($single_user_name);?></span></h4>
	<dl class="dl-horizontal grey">
		<dt>Phone</dt>
		<dd><?php echo($single_user_phone);?></dd>
		<dt>Started Working</dt>
		<dd><?php echo($single_registration_date);?></dd>
	</dl>

	<div class="text-right">
		<a href="<?php echo("Admin_Action_Handler.php?ID=$single_user_id&EDIT=1");?>" class="btn btn-warning btn-xs" role="button">Edit</a>
		<a href="<?php echo("Admin_Action_Handler.php?ID=$single_user_id&DELETE=1");?>" class="btn btn-danger btn-xs" role="button">Delete</a>
	</div>

</li>