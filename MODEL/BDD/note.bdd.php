<?php

require('../MODEL/CLASS/noteClass.php');

class noteBDD
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


    public function addNote(Note $Note)
    {  
        
        $query = "INSERT INTO note SET idUser = :idUser, idVideo  = :idVideo, note  = :note";
        
            
        $req = $this->_bdd->prepare($query);

        $req->bindValue(':idUser', (int)$Note->getIdUser(), PDO::PARAM_INT);
        
        $req->bindValue(':idVideo', (int)$Note->getIdVideo(), PDO::PARAM_INT);
        $req->bindValue(':note', (int)$Note->getNote(), PDO::PARAM_INT);
        

        return $req->execute();

        $req->closeCursor();
    }



    public function UpdateNote(Note $Note, $idVideo)
    {  
        
        $query = "UPDATE note SET idUser = :idUser, idVideo  = :idVideo, note  = :note WHERE idVideo = :videoActuelle";
       
            
        $req = $this->_bdd->prepare($query);

        $req->bindValue(':idUser', (int)$Note->getIdUser(), PDO::PARAM_INT);
        
        $req->bindValue(':idVideo', (int)$Note->getIdVideo(), PDO::PARAM_INT);
        $req->bindValue(':note', (int)$Note->getNote(), PDO::PARAM_INT);
        $req->bindValue(':videoActuelle', $idVideo, PDO::PARAM_INT);
       

        return $req->execute();

        $req->closeCursor();
    }

 


    public function SelectNoteByVideo($idVideo)
    {  
        
        $vide = '';

        $Notes = [];

        $query = "SELECT * FROM note WHERE idVideo = :idVideo";

        
        $req = $this->_bdd->prepare($query);

        $req->bindValue(':idVideo', (int)$idVideo, PDO::PARAM_INT);
        
         $req->execute();
         

         if ($req) {

            while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {

                $Note = new Note([]);

                $Note->setIdUser($datas['idUser']);
                $Note->setIdVideo($datas['idVideo']);
                $Note->setNote($datas['note']);
               

                $Notes[] = $Note;
            }
        } else {
            return $vide;
        }

        return $Notes;

        $req->closeCursor();
    }
}
