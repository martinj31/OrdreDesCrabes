
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css" >
<link rel="stylesheet" href="../CSS/index.css" >

<head>
    <title>Ordre Des Crabes</title>
</head>

<body>
<?php

require_once('TEMPLATE/Header.php');

?>
<br>

<div id="container">


<?php

require('../MODEL/BDD/crabe.bdd.php');
require('../MODEL/BDD/user.bdd.php');
require('../MODEL/BDD/connexion.bdd.php');

$db = new BDD(); // Utilisation d'une classe pour la connexion à la BDD
$bdd = $db->connect();

$userBDD = new userBDD($bdd);
$crabeBDD = new crabeBDD($bdd);

$listeUser = $userBDD->SelectAllUserClassement();

$listFinal = array_reverse($listeUser);


foreach($listFinal as $value){

    $IMG = $crabeBDD->SelectCrabeByPoints($value->getScore());

    echo('<div id="classment1"><img class="crabeIMG"
    src="'.$IMG->getIMGPath().'">
     '. $value->getPseudo().'----'.$value->getScore().'</div><br>');

}

?>                 


</div>



</body>

</html>