<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
     <title>Emploi du temps</title>
</head>
<body>
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




#$loginexact= $db->query('SELECT login FROM mdp');
#$mdpexact= $db->query('SELECT password FROM mdp');
$query= 'SELECT "password" FROM mdp WHERE 1 ';
	
if ($login) {
    $query = $query . 'AND "login" = \'' . $login . '\' ' ;
}

$db = new SQLite3('enseignantsmdp.db');
	
$reponse = $db->query($query);
#$donnees = $reponse_login->fetch();
#echo $query;
#echo $reponse;


while ($row = $reponse->fetchArray()) {
if ($password == $row[0])
{
    // La suite de mon code qui y sera après que je n'ai plus d'erreur et pour l'instant c'est :
    echo "Authentification réusite" .
	"<form method='POST' action='enseignantsedt.php'>
		<input type='submit' name='verif' value='Continuer'/>
		<input type='hidden' name='essai' value='" , $_POST['enseignant'] , "' />
	</form>";
}else{
	echo "Erreur d'authentification	";
}
}



?>

</body>
</html>
