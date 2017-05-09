<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
     <title>Emploi du temps</title>
</head>
<body>
<h1> Emploi du temps </h1>
<!--<form action="returned.php" method="GET"> --><!-- Pour retourner les objets-->
<table>
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

#$query = $query . "LIMIT 10 " . "OFFSET " . $offset ;

#echo $query;

$db = new SQLite3('emploidutemps.db');
$results = $db->query($query);

while ($row = $results->fetchArray()) {
    #$full_date = $row[0];
   # $date = substr($full_date,0,10);
    echo "<tr>";
    #echo "<td>",$date,"</td>";
	echo "<td><center>",$row[0],"</center></td>";
    echo "<td><center>",$row[1],"</center></td>";
    echo "<td><center>",$row[2],"</center></td>";
    echo "<td><center>",$row[3],"</center></td>";
	echo "<td><center>",$row[4],"</center></td>";
	echo "<td><center>",$row[5],"</center></td>";
    #echo "<td><input type='radio' name='supp' value='",$row[4],"'/></td>";
    echo "</tr>\n";
}

?>
</table>
</form>

</body>
</html>
