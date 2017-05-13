<html>
<head>
   <meta charset="utf-8"/>
     <title>Emploi du temps</title>
	 	 <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('menu.php'); ?>

<BR>
<center> <h1> Bienvenue sur la page du Collège Emma Deblois</h1></center>
<BR>
Vous êtes : <br/>
<BR>
<BR>
<table>

<tr>

<td>
<form method="POST" action="eleves.php">
<input type="submit" name="eleve" value="Elève"/>
</form>
</td>


<td>
<form method="POST" action="enseignants.php">
<input type="submit" name="enseignant" value="Enseignant"/>
</form>
</td>

</tr>

</table>

</body>
</html>