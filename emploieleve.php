<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
     <title>Emploi du temps</title>
	 	 	 <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('menu.php'); ?>
<h1> Emploi du temps de la <?php echo $_GET['annees'];
echo$_GET['classes'];

?>
</h1>

<table class="coursens">
<tr><th>Jour</th><th>Heure de début</th><th>Heure de fin</th><th>Matière</th> <th>Enseignant</th><th>Salle</th><!-- tableau premiere ligne -->
</tr> <!-- fin de la ligne du tableau -->

<?php
if (array_key_exists('annees', $_GET)) {
    $annee=$_GET['annees'];
} else {
		$annee=NULL;
}

if (array_key_exists('classes', $_GET)) {
    $classe=$_GET['classes'];
} else {
    $classe=NULL;
}


$query = 'SELECT "Jour", "Heure_debut", "Heure_fin", "Enseignant", "Cours", "Salle"'.
    'FROM emploidutemps WHERE 1 ';
    
if ($annee) {
    $query = $query . 'AND "Annee_detudes" = \'' . $annee . '\' ' ;
}

if ($classe) {
    $query = $query . 'AND "Classe" = \'' . $classe . '\' ' ;
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
    echo "<td><center>",$row[3],"</center></td>";
	echo "<td><center>",$row[4],"</center></td>";
	echo "<td><center>",$row[5],"</center></td>";
    echo "</tr>\n";
}

?>
</table>
</form>

</body>
</html>
