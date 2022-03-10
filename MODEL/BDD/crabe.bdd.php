<?php

require('../MODEL/CLASS/CrabeClass.php');

class crabeBDD
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


    /*public function addCrabe(Crabe $Crabe)
    {  
        
        $query = "INSERT INTO message SET message = :message, idUser  = :idUser";

        $req = $this->_bdd->prepare($query);

        $req->bindValue(':message', $Crabe->getMessage(), PDO::PARAM_STR);
        
        $req->bindValue(':idUser', (int)$Crabe->getIdUser(), PDO::PARAM_INT);
        
        

        return $req->execute();

        $req->closeCursor();
    }
*/
 


    public function SelectAllCrabe()
    {  
        
        $vide = '';

        $Crabes = [];

        $query = "SELECT * FROM message";

        $req = $this->_bdd->prepare($query);

        
        
         $req->execute();
         

         if ($req) {

            while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {

                $Crabe = new Crabe([]);

                $Crabe->setIdCrabe($datas['idCrabe']);
                $Crabe->setIMGPath($datas['IMGPath']);
                $Crabe->setPoints($datas['points']);

                $IMGs[] = $Crabe;
            }
        } else {
            return $vide;
        }

        return $Crabes;

        $req->closeCursor();
    }


    public function SelectCrabeByPoints($score)
    {  
        
        $vide = '';

        $points = 0;

        if($score >= 0 && $score < 100){
            $points = 0;
        }else if($score >= 100 && $score < 200){
            $points = 100;
        }

        $query = "SELECT * FROM crabe WHERE points = :points";

        $req = $this->_bdd->prepare($query);

        
        $req->bindValue(':points', $points, PDO::PARAM_INT);


         $req->execute();
         

         if ($req) {

            while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {

                $Crabe = new Crabe([]);

                $Crabe->setIdCrabe($datas['idCrabe']);
                $Crabe->setIMGPath($datas['IMGPath']);
                $Crabe->setPoints($datas['points']);

                return $Crabe;
            }
        } else {
            return $vide;
        }

        

        $req->closeCursor();
    }
}
