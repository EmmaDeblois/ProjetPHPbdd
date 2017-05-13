<html>
<head>
   <meta charset="utf-8"/>
     <title>Ajout d'un cours</title>
	 	 <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('menu.php'); ?>
<h1> Ajout d'un cours </h1>
<form method="POST" action="add.php">


Année :
<select name="annee">
<?php
$db = new SQLite3('emploidutemps.db');

$results = $db->query(
    'SELECT DISTINCT "Annee_detudes" FROM emploidutemps ORDER BY "Annee_detudes" DESC'
);

while ($row = $results->fetchArray()) {
    if ($row[0]) {
        echo "<option value='", $row[0],"'>", $row[0], "</option>\n";
    }
}
?>
</select>

<br/>

Classe : 
<select name="classe">
<?php
$db = new SQLite3('emploidutemps.db');

$results = $db->query(
    'SELECT DISTINCT "Classe" FROM emploidutemps ORDER BY "Classe"'
);

while ($row = $results->fetchArray()) {
    if ($row[0]) {
        echo "<option value='", $row[0],"'>", $row[0], "</option>\n";
    }
}
?>
</select>

<br/>
Jour :
<select name="jour">
<?php
$db = new SQLite3('emploidutemps.db');

$results = $db->query(
    'SELECT DISTINCT "Jour" FROM emploidutemps'
);

while ($row = $results->fetchArray()) {
    if ($row[0]) {
        echo "<option value='", $row[0],"'>", $row[0], "</option>\n";
    }
}
?>
</select>


<br/>
<p> Heure de début, de la forme : hh:mm</p>
<input type='text' name='debut'/>
<br/>
<p> Heure de fin, de la forme : hh:mm</p>
<input type='text' name='fin'/>
<br/>

Sélectionner l'enseignant :
<select name="enseignant">
<?php
$db = new SQLite3('emploidutemps.db');

$results = $db->query(
    'SELECT DISTINCT "Enseignant" FROM emploidutemps ORDER BY "Enseignant"'
);

while ($row = $results->fetchArray()) {
    if ($row[0]) {
        echo "<option value='", $row[0],"'>", $row[0], "</option>\n";
    }
}
?>
</select>
<br/>

Sélectionner la matière :
<select name="matiere">
<?php
$db = new SQLite3('emploidutemps.db');

$results = $db->query(
    'SELECT DISTINCT "Cours" FROM emploidutemps ORDER BY "Cours"'
);

while ($row = $results->fetchArray()) {
    if ($row[0]) {
        echo "<option value='", $row[0],"'>", $row[0], "</option>\n";
    }
}
?>
</select>
<br/>

Sélectionner la salle :
<select name="salle">
<?php
$db = new SQLite3('emploidutemps.db');

$results = $db->query(
    'SELECT DISTINCT "Salle" FROM emploidutemps ORDER BY "Salle"'
);

while ($row = $results->fetchArray()) {
    if ($row[0]) {
        echo "<option value='", $row[0],"'>", $row[0], "</option>\n";
    }
}
?>
</select>
<br/>

<br/>
<input type="submit" name="New" value="Ajouter le cours"/>
</form>
</body>
</html>
