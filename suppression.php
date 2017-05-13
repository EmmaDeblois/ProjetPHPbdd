<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
     <title>Cours supprimé</title>
	 	 	 <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('menu.php'); ?>
<h1>Cours supprimé</h1>
<?php
if (array_key_exists('id', $_GET)) {
	$id=$_GET['id'];
    $delete = 'DELETE from emploidutemps WHERE "ID" = \'' . $id . '\'';
    $db = new SQLite3('emploidutemps.db');
    $results = $db -> exec($delete);
    echo "<p>Le cours a bien été supprimé.</p>";
    
} else {
echo "<p>Veuillez sélectionner un cours</p>";
}

?></body>
</html>
