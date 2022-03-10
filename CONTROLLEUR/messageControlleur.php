<?php

require('../MODEL/BDD/message.bdd.php');
require('../MODEL/BDD/connexion.bdd.php');
session_start();

if (isset($_GET['message'])) {


    

    $Message = new Message([]);
   

    
    $Message->setIdUser($_SESSION['idUser']);
    
    $Message->setMessage($_GET['message']);
    $db = new BDD(); // Utilisation d'une classe pour la connexion à la BDD
    $bdd = $db->connect();

    $messageBDD = new messageBDD($bdd);


    $messageBDD->addMessage($Message);
    

    //header('Location: ../VUE/discussion.php');

}
