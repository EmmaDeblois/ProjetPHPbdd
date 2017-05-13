<html>
<head>
   <meta charset="utf-8"/>
     <title>Nouveau cours</title>
	 	 	 <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('menu.php'); ?>
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
 $id = $db->querySingle('SELECT MAX("ID") FROM emploidutemps') . '0';
 

$insert = 'INSERT INTO emploidutemps ("ID", "Annee_detudes", "Classe", "Jour", "Heure_debut", "Heure_fin","Enseignant", "Cours", "Salle") '.
    'VALUES (\''. $id .'\',\''. $annee .'\',\''. $classe .'\',\''. $jour .'\',\''. $debut .'\',\''. $fin .'\',\''. $enseignant .'\',\''. $matiere .'\',\''. $salle .'\')';

$db->exec($insert);
#echo $insert;
echo "Le cours a été ajouté avec succès"

?>
</body>
</html>
