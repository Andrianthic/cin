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

            header('Location: index.php');
        }


 ?>

<!DOCTYPE html>

<html>
<head>
	<title>CIN - Madagascar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="formulaire">
	<div class="titre">
		<h1>Ajouter vos informations</h1>
	</div>
	<div class="form">
		<form method="POST" action="">
			<table>
				<tr><td class="td1">Nom</td><td><input type="text" name="nom"></td></tr>
				<tr><td class="td1">Prénom</td><td><input type="text" name="prenom"></td></tr>
				<tr><td class="td1">Date de naissance</td><td><input type="date" name="date_naissance"></td></tr>
				<tr><td class="td1">Lieu de naissance</td><td><input type="text" name="lieu_naissance"></td></tr>
				<tr><td class="td1">Num CIN</td><td><input type="text" name="num_cin"></td></tr>
				<tr class="tr-last"><td class="td1"></td><td><button>Enregistrer</button><button>Annuler</button></td></tr>
			</table>
		</form>
	</div>
	<p>Nouvelle identité</p>
	<div class="new-id">
	<?php
	    $rep_list = $bdd->query('SELECT * FROM carte LIMIT 5');
	  while ($cin_list = $rep_list->fetch())
	    {
	      ?>
	      <table>
			<tr><td>Nom</td><td>: <?php echo $cin_list['nom']; ?><b></b></td></tr>
			<tr><td>Prénom</td><td>: <?php echo $cin_list['prenom']; ?></td></tr>
			<tr><td>Date et lieu de naissance</td><td>: <?php echo $cin_list['date_naissance']; ?> à <?php echo $cin_list['lieu_naissance']; ?></td></tr>
			<tr><td>Num CIN</td><td>: <?php echo $cin_list['num_cin']; ?></td></tr>
			<tr><td>Ajouté le</td><td>: <?php echo $cin_list['date_ajout']; ?></td></tr>
		</table>
	  <?php
	    }
	      $rep_list->closeCursor();
	  ?>
		
	</div>
</div>


</body>
</html>