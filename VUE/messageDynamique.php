<link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
<link rel="stylesheet" href="../CSS/index.css">

<?php

require('../MODEL/BDD/message.bdd.php');
require('../MODEL/BDD/user.bdd.php');
require('../MODEL/BDD/connexion.bdd.php');

$db = new BDD(); // Utilisation d'une classe pour la connexion à la BDD
$bdd = $db->connect();

$messageBDD = new messageBDD($bdd);
$userBDD = new userBDD($bdd);

$messages = $messageBDD->SelectAllMessage();




foreach($messages as $value){
    
    $user = $userBDD->SelectUserByID($value->getIdUser());
    echo('<div class="message">
        
            
                <p>'.$value->getMessage().'</p>

          

            <span class="time-right">'.$user->getPseudo().' || '.$value->getDateMessage().'</span>
            
       

    </div>');


}


    

