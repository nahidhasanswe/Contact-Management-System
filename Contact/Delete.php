<?php 
	include 'Dataoperation.php';

	if(isset($_GET['Id']))
	{
		$Id=htmlspecialchars($_GET['Id']);
		$dataOb=new DataOperation();
		$result=$dataOb->DeleteContact($Id);

		if($result)
			header("location:Index.php");
		else
			header('location:Details.php?Id='.$Id);

	}else
	{
		header("location:Index.php");
	}
 ?>