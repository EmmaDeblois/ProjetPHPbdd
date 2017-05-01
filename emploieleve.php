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
    'FROM essai2 WHERE 1 ';
    
if ($annee) {
    $query = $query . 'AND "Annee_detudes" = \'' . $annee . '\' ' ;
}

if ($classe) {
    $query = $query . 'AND "Classe" = \'' . $classe . '\' ' ;
}

#$query = $query . "LIMIT 10 " . "OFFSET " . $offset ;

#echo $query;

$db = new SQLite3('essai.db');
$results = $db->query($query);

while ($row = $results->fetchArray()) {
    #$full_date = $row[0];
   # $date = substr($full_date,0,10);
    echo "<tr>";
    #echo "<td>",$date,"</td>";
	echo "<td>",$row[0],"</td>";
    echo "<td>",$row[1],"</td>";
    echo "<td>",$row[2],"</td>";
    echo "<td>",$row[3],"</td>";
	echo "<td>",$row[4],"</td>";
	echo "<td>",$row[5],"</td>";
    #echo "<td><input type='radio' name='id' value='",$row[4],"'/></td>";
    echo "</tr>\n";
}

?>
</table>
</form>

</body>
</html>
