<?php

require('../MODEL/BDD/user.bdd.php');
require('../MODEL/BDD/connexion.bdd.php');

if (isset($_POST['sub'])) {



    if (isset($_POST['pseudo'])) {

        $pseudo = $_POST['pseudo'];
    }

    if (isset($_POST['password'])) {

        $password = $_POST['password'];
    }



    $db = new BDD(); // Utilisation d'une classe pour la connexion à la BDD
    $bdd = $db->connect();

    $UserBDD = new userBDD($bdd);


    $User = $UserBDD->SelectUserByPseudo($pseudo);

    //regarde si l'email inscrit existe 
    if (empty($User)) {

?>
        <script type="text/javascript">
            alert("Cet Email n\'existe pas ! \n Veuillez créer un compte. ");
            document.location.href = '../VUE/inscription.php';
        </script>
    <?php
    }

    $good_password = $User->getMDP();

    //regarde que le mot de passe est bon
    //si oui : initialise les variable de  session
    if (password_verify($password, $good_password)) {

       

            session_start();

            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['idUser'] = $User->getIdUser();
            
    
            header('Location: ../VUE/crabes.php');
        

        
    } else {
    ?>
        <script type="text/javascript">
            alert("Mauvais mot de passe ");
            window.location = ' ../VUE/accueil.php';
        </script>
<?php
 
    }
}
