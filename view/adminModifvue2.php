<?php
include (__DIR__."./../model/top.php");
			//session_start();
			$path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";
			//var_dump($_SESSION['user2']);
			$user = $_SESSION['user2'];
?>

<form action= "..\admin\admin_changer.php" method="POST">
	<table>
		<tr>
			<td><input type="text" name="pseudo" placeholder="Nouveau Pseudo"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" />
					<input type="hidden" name="action" value="pseudo" />
			</td>
		</tr>
	</table>
</form>
<form action= "..\admin\admin_changer.php" method="POST">
	<table>
			<td><input type="text" name="email" placeholder="Nouveau email"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" />
					<input type="hidden" name="action" value="email" />
			</td>
		</tr>
	</table>
</form>
<form action= "..\admin\admin_changer.php" method="POST">
	<table>
			<td><input type="text" name="height" placeholder="Nouveau height"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" />
					<input type="hidden" name="action" value="height" />
			</td>
		</tr>
	</table>
</form>
<form action="..\admin\admin_changer.php" method="POST">
	<table>
			<td><input type="text" name="weight" placeholder="Nouveau weight"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" />
					<input type="hidden" name="action" value="weight" />
			</td>
		</tr>
	</table>
</form>
<form action="..\admin\admin_changer.php" method="POST">
	<table>
			<td><input type="text" name="grade" placeholder="grade user"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" />
					<input type="hidden" name="action" value="Modifer" />
			</td>
		</tr>
	</table>
</form>
<form action="..\admin\admin_changer.php" method="POST">
	<table>
		<tr>
			<td><input type="password" name="aPassword" placeholder="Mot De Passe Administrateur "/></td>
			<td><input type="password" name="password" placeholder="Mot De Passe Utilisateur"/></td>
			<td><input type="password" name="cPassword" placeholder="Confirmer le Mot De Passe"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" />
					<input type="hidden" name="action" value="password" />
			</td>
		</tr>
	</table>
</form>
