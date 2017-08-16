<?php 
	$bdd = new PDO('mysql:host=localhost;dbname=cin;charset=utf8', 'root', '');

	if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date_naissance']) && isset($_POST['lieu_naissance']) && isset($_POST['num_cin'])) {

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date_naissance = $_POST['date_naissance'];
            $lieu_naissance = $_POST['lieu_naissance'];
            $num_cin = $_POST['num_cin'];

            $req_ajout= $bdd->prepare('INSERT INTO carte(nom, prenom, date_naissance, lieu_naissance, num_cin, date_ajout)VALUES(:nom, :prenom, :date_naissance, :lieu_naissance, :num_cin, NOW())');
            $req_ajout->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'date_naissance' => $date_naissance,
            'lieu_naissance' => $lieu_naissance,
            'num_cin' => $num_cin,
            ));
        }

    header('Location: index.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>