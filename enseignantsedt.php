<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
     <title>Emploi du temps</title>
	 	 <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('menu.php'); ?>
<h1> Emploi du temps </h1>
<form action="suppression.php" method="GET">
<table class="coursens">
<tr><th>Jour</th><th>Heure de d&eacute;but</th><th>Heure de fin</th> <th>Classe</th><th>Salle</th><th><input type="submit" value='Supprimer les cours s&eacute;lectionn&eacute;s'/></th><!-- tableau premiere ligne -->
</tr>

<?php
if (array_key_exists('essai', $_POST)) {
    $enseignant=$_POST['essai'];
} else {
    $enseignant=NULL;
}



$query = 'SELECT "Jour", "Heure_debut", "Heure_fin", "Cours" , "Annee_detudes", "Classe", "Salle" , "ID"'.
    'FROM emploidutemps WHERE 1 ';
    
if ($enseignant) {
    $query = $query . 'AND "Enseignant" = \'' . $enseignant . '\' ' ;
}

$query= $query . 'ORDER BY CASE "jour"
                 WHEN "Lundi" THEN 1 
                 WHEN "Mardi" THEN 2 
                 WHEN "Mercredi" THEN 3 
                 WHEN "Jeudi" THEN 4 
                 WHEN "Vendredi" THEN 5 END,
				 "Heure_debut";';

#echo $query;

$db = new SQLite3('emploidutemps.db');
$results = $db->query($query);



while ($row = $results->fetchArray()) {
    echo "<tr>";
	echo "<td><center>",$row[0],"</center></td>";
    echo "<td><center>",$row[1],"</center></td>";
    echo "<td><center>",$row[2],"</center></td>";
    echo "<td><center>",$row[4],$row[5],"</center></td>";
	echo "<td><center>",$row[6],"</center></td>";
	echo "<td><center><input type='radio' name='id' id='geant' value='",$row[7],"'/></center></td>";
    echo "</tr>\n";
}

echo "<div id='ttitre'>Voici votre emploi du temps " . $enseignant . "</div></br>";

?>
</table>
</form>

<form action="ajout.php" method="GET">
<input type="submit" name="ajout" value="Ajouter un cours"/>

</form>

</body>
</html>
