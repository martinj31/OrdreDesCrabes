<?php

require('../MODEL/CLASS/UserClass.php');

class userBDD
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


    public function addUser(User $User)
    {  
        
        $query = "INSERT INTO user SET Pseudo = :Pseudo, MDP = :MDP";

        $req = $this->_bdd->prepare($query);

        $req->bindValue(':Pseudo', $User->getPseudo(), PDO::PARAM_STR);
        $req->bindValue(':MDP', $User->getMDP(), PDO::PARAM_STR);
        
        
        return $req->execute();

        $req->closeCursor();
    }

   /* public function updateArgent($Argent, $email)
    { 
       
        $query = "UPDATE user SET argent = :argent WHERE email = :email";

        $req = $this->_bdd->prepare($query);

        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':argent', $Argent, PDO::PARAM_STR);

        return $req->execute();


        $req->closeCursor();
    }*/

    

    public function updateUser(User $User)
    {  
        
        $query = "UPDATE user SET Pseudo = :Pseudo, MDP = :MDP, score = :score WHERE idUser = :idUser";

        $req = $this->_bdd->prepare($query);

        $req->bindValue(':Pseudo', $User->getPseudo(), PDO::PARAM_STR);
        $req->bindValue(':MDP', $User->getMDP(), PDO::PARAM_STR);
        $req->bindValue(':score', $User->getScore(), PDO::PARAM_INT);
        $req->bindValue(':idUser', $User->getIdUser(), PDO::PARAM_INT);



        return $req->execute();


        $req->closeCursor();
    }



    public function SelectUserByPseudo($Pseudo)
    {  
        
        $vide = '';

        $query = "SELECT * FROM user WHERE Pseudo = :Pseudo";

        $req = $this->_bdd->prepare($query);

        $req->bindValue(':Pseudo', $Pseudo, PDO::PARAM_STR);
        
         $req->execute();
         

         if ($req) {

            while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {

                $User = new User([]);

                $User->setIdUser($datas['idUser']);
                $User->setPseudo($datas['Pseudo']);
                $User->setMDP($datas['MDP']);
                $User->setScore($datas['score']);
                

                return $User;
            }
        } else {
            return $vide;
        }

        $req->closeCursor();
    }




    public function SelectAllUserClassement()
    {  
        
        $vide = '';

        $query = "SELECT * FROM user ORDER BY score";

        $req = $this->_bdd->prepare($query);

        $Users = [];
        
         $req->execute();
         

         if ($req) {

            while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {

                $User = new User([]);

                $User->setIdUser($datas['idUser']);
                $User->setPseudo($datas['Pseudo']);
                $User->setMDP($datas['MDP']);
                $User->setScore($datas['score']);
                
                $Users[] =  $User;
                
            }
        } else {
            return $vide;
        }

        return $Users;

        $req->closeCursor();
    }


    public function SelectUserByID($Id)
    {  
        
        $vide = '';

        $query = "SELECT * FROM user WHERE idUser = :idUser";

        $req = $this->_bdd->prepare($query);

        $req->bindValue(':idUser', $Id, PDO::PARAM_INT);
        
         $req->execute();
         

         if ($req) {

            while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {

                $User = new User([]);

                $User->setIdUser($datas['idUser']);
                $User->setPseudo($datas['Pseudo']);
                $User->setMDP($datas['MDP']);
                $User->setScore($datas['score']);
                

                return $User;
            }
        } else {
            return $vide;
        }

        $req->closeCursor();
    }
}
