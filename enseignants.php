<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
     <title>Authentification</title>
</head>
<body>
<BR>
<center> <h1> Authentification</h1></center>
<BR>
<h3>Merci de vous identifier</h3>
<BR>
<form method="POST" action="authentification.php">
<table>

<tr>
<td>
Votre nom :
</td>

<td>
<center>

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

</center>
</td>
</tr>

<tr>
<td>
Mot de passe :
</td>

<td>
<input type="password" name="password" />
</td>

</tr>

<tr>
<td>
<input type="submit" name="verif" value="Valider"/>
</td>

</tr>

</table>
</form>
</body>
</html>