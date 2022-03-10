<?php

require('../MODEL/BDD/user.bdd.php');
require('../MODEL/BDD/connexion.bdd.php');

//Ajout de l'user dans la base de données
if (isset($_POST['sub'])) {


    if (isset($_POST['pseudo'])) {

        $pseudo = $_POST['pseudo'];
    }


    if (isset($_POST['password'])) {

        $password = $_POST['password'];
    }

    if (isset($_POST['password_comfirm'])) {

        $password_comfirm = $_POST['password_comfirm'];
    }

  

    $db = new BDD(); // Utilisation d'une classe pour la connexion à la BDD
    $bdd = $db->connect();

    $UserBDD = new userBDD($bdd);
    $User = new User([]);

    //condition : ne doit pas avoir le meme email qu'un user deja inscrit
    if (!empty($UserBDD->SelectUserByPseudo($pseudo))) {

?>
        <script type="text/javascript">
            alert("Ce Mail est déjà utilisé");
            window.location = ' ../VUE/inscription.php';
        </script>
<?php
        die();
    }

    $User->setPseudo($pseudo);
    


    //hash du mot de passe dans la base de données
    if ($password == $password_comfirm) {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $User->setMDP($password);
    }



    $UserBDD->addUser($User);

   

    header('Location: ../VUE/accueil.php');
}
