<?php
?>

<li class="list-group-item">

	<div class=" m_p_0 clear_float">
		<span><?php echo($count);?> . </span>
		<span class="name f_17"> <?php echo($single_user_name);?></span>
	</div>
	<div class="clear_float">
		<div class="text-right">
			<a href="Edit_Employee.php?User_ID=<?php echo($single_user_id);?>" class="btn btn-warning btn-xs" role="button">Edit</a>
			<a href="Delete_Employee.php?User_ID=<?php echo($single_user_id);?>" class="btn btn-danger btn-xs" role="button">Delete</a>
		</div>
	</div>


</li>