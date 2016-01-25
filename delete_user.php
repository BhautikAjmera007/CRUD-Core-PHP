<?php
	include('config.php');

	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
		$query_delete="Delete from registration where  id='".$id."'";
		mysql_query($query_delete);
	}