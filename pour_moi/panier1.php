<?php
session_start();
if(isset($_POST['go']))
{
	if(empty($_POST['t']))
	{
		echo"text est vide";
	}
	else
	{	
		if(isset($_SESSION['panier']))
		{
			echo"session connue";
			$panier=$_SESSION['panier'];
			$ses = $_POST['t'];
			array_push($panier,$ses);
			$_SESSION['panier'] = $panier;
			foreach($panier as $i =>$key) {
			$i >0;
				echo $key."<br>";
			}
		}
		else
		{
			echo"session  pas connue";
			$ses = $_POST['t'];
			array_push($panier,$ses);
			$_SESSION['panier'] = $panier;
			foreach($panier as $i =>$key) {
			$i >0;
				echo $key."<br>";
			}
		}
			
	}
}
// session_destroy();
?>
	<form action='panier1.php' method='POST'>
		<input type='text' name='t'/>
		<input type='submit' value='sub' name='go'/>
	</form>
