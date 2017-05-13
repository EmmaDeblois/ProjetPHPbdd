<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
     <title>Authentification</title>
	 	 <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('menu.php'); ?>

<center> <h1> Authentification</h1></center>
<BR>
Indication : le mot de passe de chaque enseignant est son nom de famille en minuscule
<BR>
<form method="POST" action="authentification.php">

<fieldset>
 <legend>Authentification</legend>
  <label for="nom">Votre nom :</label>
		<select name="enseignant">
			<option value="" selected></option>
				<?php
				$db = new SQLite3('enseignantsmdp.db');

				$results = $db->query(
					'SELECT DISTINCT "login" FROM mdp ORDER BY "login"' 
				);

while ($row3 = $results->fetchArray()) {
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
<input type="submit" name="verif" value="Valider" class="bouton"/>
 </p>

</form>
</body>
</html>