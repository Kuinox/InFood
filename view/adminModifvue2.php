<?php $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/";
			$user = $_SESSION['user'];
?>

<form action= "<?php echo $path ?>user\?tab=parametre&id=" method="POST">
	<table>
		<tr>
			<?php echo $user['pseudo'] ?>
			<td><input type="text" name="pseudo" placeholder="Nouveau Pseudo"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" />
					<input type="hidden" name="action" value="pseudo" />
			</td>
		</tr>
	</table>
</form>
<form action= "<?php echo $path ?>user\?tab=parametre&id=" method="POST">
	<table>
		<tr><?php echo $user['email'] ?>
			<td><input type="text" name="email" placeholder="Nouveau email"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" />
					<input type="hidden" name="action" value="email" />
			</td>
		</tr>
	</table>
</form>
<form action= "<?php echo $path ?>user\?tab=parametre&id=" method="POST">
	<table>
		<tr><?php echo $user['height'] ?>
			<td><input type="text" name="height" placeholder="Nouveau height"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" />
					<input type="hidden" name="action" value="height" />
			</td>
		</tr>
	</table>
</form>
<form action="<?php echo $path ?>user\?tab=parametre&id=" method="POST">
	<table>
		<tr><?php echo $user['weight'] ?>
			<td><input type="text" name="weight" placeholder="Nouveau weight"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" />
					<input type="hidden" name="action" value="weight" />
			</td>
		</tr>
	</table>
</form>
<form action="<?php echo $path ?>user\?tab=parametre&id=" method="POST">
	<table>
		<tr>
			<td><input type="password" name="aPassword" placeholder="acien mot de passe"/></td>
			<td><input type="password" name="password" placeholder="Nouveau mot de passe"/></td>
			<td><input type="password" name="cPassword" placeholder="confirmer mot de passe"/></td>
			<td><input type="submit" name="Modifer" value="Modifer" />
					<input type="hidden" name="action" value="password" />
			</td>
		</tr>
	</table>