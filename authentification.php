<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
     <title>Emploi du temps</title>
	 	 <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('menu.php'); ?>
<h1> Authentification </h1>

<?php

if (array_key_exists('enseignant', $_POST)) {
    $login=$_POST['enseignant'];
} else {
    $login=NULL;
}

if (array_key_exists('password', $_POST)) {
    $password=$_POST['password'];
} else {
    $password=NULL;
}


$query= 'SELECT "password" FROM mdp WHERE 1 ';
	
if ($login) {
    $query = $query . 'AND "login" = \'' . $login . '\' ' ;
}

$db = new SQLite3('enseignantsmdp.db');
	
$reponse = $db->query($query);

#echo $query;
#echo $reponse;


while ($row = $reponse->fetchArray()) {
if ($password == $row[0])
{
   
    echo "Authentification réussie" .
	"<form method='POST' action='enseignantsedt.php'>
		<input type='submit' name='verif' class='verif' value='Continuer'/>
		<input type='hidden' name='essai' value='" , $_POST['enseignant'] , "' />
	</form>";
}else{
	echo "Erreur d'authentification" .
	"<form method='POST' action='enseignants.php'>
		<input type='submit' name='retour' value='Revenir à l authentification'/>
	</form>";
}
}



?>

</body>
</html>
