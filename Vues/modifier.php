<?php
include 'vues/menu.php';
?>
<div class='parent'>
	<table>
		<tr>
			<td><a href="index.php?login=<?php echo $_SESSION['login'];?>&password=<?php echo $_SESSION['password'];?>&vue=compte&action=modifMdp">Modifier le mot de passe</a></td></tr>
			<td><a href="index.php?login=<?php echo $_SESSION['login'];?>&password=<?php echo $_SESSION['password'];?>&vue=compte&action=modifInfos">Modifier les informations</a></td>
		</tr>
	</table>
</div>
