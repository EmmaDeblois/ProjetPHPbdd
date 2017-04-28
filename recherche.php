<html>
<head>
   <meta charset="utf-8"/>
     <title>Emploi du temps</title>
</head>
<body>
<h1> Emploi du temps</h1>
<form method="GET" action="emploi.php">
<select name="classe">
<option value="" selected></option>
<?php
$db = new SQLite3('essai.db'); #base de données

$results = $db->query(
    'SELECT DISTINCT "Annee_detudes", "Classe" FROM essai2 ORDER BY "Annee_detudes", "Classe"' # on met dans la variable results le nom des gares dans l'ordre alphabétique
);

while ($row = $results->fetchArray()) { #on met les résultats dans un tableau
    if ($row[0]) {
        echo "<option value='", $row[1],"'>", $row[0], "</option>\n";
    }
}
?>
</select>
<p>Description d'objet : </p> 
<input type="text" name="descr"/></br>
<input type="submit" name="Go" value="Trouve mon tresor"/>
</form>
</body>
</html>
