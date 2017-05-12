<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
     <title>Authentification</title>
	 <link rel="stylesheet" href="style.css">
</head>
<body>
<BR>
<center> <h1> Authentification</h1></center>
<BR>

<BR>
<form method="POST" action="authentification.php">


<fieldset>
 <legend>Authentification</legend>
  <label for="nom">Votre nom :</label>
		<select name="enseignant">
			<option value="" selected></option>
				<?php
				$db = new SQLite3('enseignantsmdp.db'); #base de données

				$results = $db->query(
					'SELECT DISTINCT "login" FROM mdp ORDER BY "login"' # on met dans la variable results le nom des gares dans l'ordre alphabétique
				);

while ($row3 = $results->fetchArray()) { #on met les résultats dans un tableau
    if ($row3[0]) {
        echo "<option value='", $row3[0],"'>", $row3[0], "</option>\n";
    }
}
?>
		</select>

 <p> <label for="mdp">Mot de passe :</label>
		<input type="password" name="password" /> </p>
</fieldset>

 <p>
<input type="submit" name="verif" value="Valider"/>
 </p>

</form>
</body>
</html>