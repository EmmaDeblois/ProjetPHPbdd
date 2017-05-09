<html>
<head>
   <meta charset="utf-8"/>
     <title>Nouveau cours</title>
</head>
<body>
<h1>Cours ajouté</h1>
<?php

 $db = new SQLite3('emploidutemps.db');
 $annee=$_POST['annee'];
 $classe=$_POST['classe'];
 $jour=$_POST['jour'];
 $debut=$_POST['debut'];
 $fin=$_POST['fin'];
 $enseignant=$_POST['enseignant'];
 $matiere=$_POST['matiere'];
 $salle=$_POST['salle'];
 #$gare=$db->querySingle('SELECT "Gare" FROM trouve WHERE "Code UIC" = \''
 #. $uic .'\''); 
 $id = $db->querySingle('SELECT MAX("ID") FROM emploidutemps') . '0';
 

 #date_default_timezone_set('CET');
 #$d=date("Y-m-d\TG:i:sO");
//2014-05-22T12:35:16+02:00
/* $id=NULL; */

$insert = 'INSERT INTO emploidutemps ("ID", "Annee_detudes", "Classe", "Jour", "Heure_debut", "Heure_fin","Enseignant", "Cours", "Salle") '.
    'VALUES (\''. $id .'\',\''. $annee .'\',\''. $classe .'\',\''. $jour .'\',\''. $debut .'\',\''. $fin .'\',\''. $enseignant .'\',\''. $matiere .'\',\''. $salle .'\')';

$db->exec($insert);
echo $insert;

?>
</body>
</html>
