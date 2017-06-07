<?php //include("../model/top.php") ?>
<?php //$path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/"; ?>
<form action="modifierCompte.php" method="POST">
	<table>
		<tr>
			<td><input type="text" name="pseudo" placeholder="Nouveau Nom"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" /></td>
		</tr>
	</table>
</form>
<form action="modifierCompte.php" method="POST">
	<table>
		<tr>
			<td><input type="text" name="password" placeholder="Nouveau password"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" /></td>
		</tr>
	</table>
</form>
<form action="modifierCompte.php" method="POST">
	<table>
		<tr>
			<td><input type="text" name="email" placeholder="Nouveau email"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" /></td>
		</tr>
	</table>
</form>

<form action="modifierCompte.php" method="POST">
	<table>
		<tr>
			<td><input type="text" name="height" placeholder="Nouveau height"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" /></td>
	</table>
	</tr>	
</form>

<form action="modifierCompte.php" method="POST">
	<table>
		<tr>
			<td><input type="text" name="weight" placeholder="Nouveau weight"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" /></td>
		</tr>
	</table>
</form>
<?php //include("../model/bot.php") ?>
