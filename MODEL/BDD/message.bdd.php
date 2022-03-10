<?php

require('../MODEL/CLASS/MessageClass.php');

class messageBDD
{
    /*
     * Attributs
     */

    private $_bdd;


    /*
     * Méthode de construction
     */

    public function __construct($bdd)
    {
        $this->setDb($bdd);
    }

    public function setDb(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }


    public function addMessage(Message $Message)
    {  
        
        $query = "INSERT INTO message SET message = :message, idUser  = :idUser";

        $req = $this->_bdd->prepare($query);

        $req->bindValue(':message', $Message->getMessage(), PDO::PARAM_STR);
        
        $req->bindValue(':idUser', (int)$Message->getIdUser(), PDO::PARAM_INT);
        
        

        return $req->execute();

        $req->closeCursor();
    }

 

    

   /* public function updateUser(User $User)
    {  
        
        $query = "UPDATE user SET Pseudo = :Pseudo, MDP = :MDP";

        $req = $this->_bdd->prepare($query);

        $req->bindValue(':Pseudo', $User->getPseudo(), PDO::PARAM_STR);
        $req->bindValue(':MDP', $User->getMDP(), PDO::PARAM_STR);
        



        return $req->execute();


        $req->closeCursor();
    }
*/


    /*public function SelectUserByPseudo($Pseudo)
    {  
        
        $vide = '';

        $query = "SELECT * FROM user WHERE Pseudo = :Pseudo";

        $req = $this->_bdd->prepare($query);

        $req->bindValue(':Pseudo', $Pseudo, PDO::PARAM_STR);
        
         $req->execute();
         

         if ($req) {

            while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {

                $Message = new Message([]);

                $Message->setIdUser($datas['idUser']);
                $Message->setPseudo($datas['Pseudo']);
                $Message->setMDP($datas['MDP']);
                

                return $Message;
            }
        } else {
            return $vide;
        }

        $req->closeCursor();
    }*/



    public function SelectAllMessage()
    {  
        
        $vide = '';

        $Messages = [];

        $query = "SELECT * FROM message";

        $req = $this->_bdd->prepare($query);

        
        
         $req->execute();
         

         if ($req) {

            while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {

                $Message = new Message([]);

                $Message->setIdMessage($datas['idMessage']);
                $Message->setMessage($datas['message']);
                $Message->setDateMessage($datas['dateMessage']);
                $Message->setIdUser ($datas['idUser']);

                $Messages[] = $Message;
            }
        } else {
            return $vide;
        }

        return $Messages;

        $req->closeCursor();
    }
}
