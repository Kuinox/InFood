<?php

include(__DIR__."/../SQL/FUNCTIONS/connect.php");
include(__DIR__."/fonction_modifier_compt.php");
if(isset($_SESSION['user']))
{
	if($_POST['Modifer'] = "OK")
	{
		if(isset($_POST['pseudo']))
		{
			$_SESSION['user']['pseudo']=$_POST['pseudo'];
		}
		else if(isset($_POST['password']))
		{
			$_SESSION['user']['password'] = hash("sha256", $_POST['password']);
		}
    else if(isset($_POST['email']))
		{
			$_SESSION['user']['email']=$_POST['email'];
		}
		else if(isset($_POST['height']))
		{
			$_SESSION['user']['height']=$_POST['height'];
		}
		else if(isset($_POST['weight']))
		{
			$_SESSION['user']['weight']=$_POST['weight'];
		}
  }
}
updateUser($bdd);
 ?>
