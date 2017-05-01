<html>
<head>
   <meta charset="utf-8"/>
     <title>Emploi du temps</title>
</head>
<body>
<center> <h1> Emploi du temps</h1></center>
<BR>
<table>
<tr>
<td>
Sélectionner votre année :
</td>
<td>
<form method="GET" action="emploieleve.php">
<select name="annees">
<!-- <option value="" selected></option> --> 
<?php
$db = new SQLite3('essai.db'); #base de données

$results = $db->query(
    'SELECT DISTINCT "Annee_detudes" FROM essai2 ORDER BY "Annee_detudes"' # on met dans la variable results le nom des gares dans l'ordre alphabétique
);

while ($row = $results->fetchArray()) { #on met les résultats dans un tableau
    if ($row[0]) {
        echo "<option value='", $row[0],"'>", $row[0], "</option>\n";
    }
}
?>
</select>

</td>

<td>
Sélectionner votre classe :
</td>

<td>
<select name="classes">
<!-- <option value="" selected></option> --> 
<?php
$db = new SQLite3('essai.db'); #base de données

$results = $db->query(
    'SELECT DISTINCT "Classe" FROM essai2 ORDER BY "Classe"' # on met dans la variable results le nom des gares dans l'ordre alphabétique
);

while ($row2 = $results->fetchArray()) { #on met les résultats dans un tableau
    if ($row2[0]) {
        echo "<option value='", $row2[0],"'>", $row2[0], "</option>\n";
    }
}
?>
</select>
</td>

<td>
<input type="submit" name="Go" value="Valider"/>
</td>

</tr>
</form>
<table>

</body>
</html>
