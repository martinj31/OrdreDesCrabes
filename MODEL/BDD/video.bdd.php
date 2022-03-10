<?php

require('../MODEL/CLASS/VideoClass.php');

class videoBDD
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


    public function addVideo(Video $Video)
    {  
        
        $query = "INSERT INTO video SET videoName = :videoName, auteur  = :auteur, titre  = :titre";

        $req = $this->_bdd->prepare($query);

        $req->bindValue(':videoName', $Video->getVideoName(), PDO::PARAM_STR);
        
        $req->bindValue(':auteur', (int)$Video->getAuteur(), PDO::PARAM_INT);
        $req->bindValue(':titre', $Video->getTitre(), PDO::PARAM_STR);
        

        return $req->execute();

        $req->closeCursor();
    }

 




    public function SelectAllVideo()
    {  
        
        $vide = '';

        $Videos = [];

        $query = "SELECT * FROM video";

        $req = $this->_bdd->prepare($query);

        
        
         $req->execute();
         

         if ($req) {

            while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {

                $Video = new Video([]);

                $Video->setIdVideo($datas['idVideo']);
                $Video->setVideoName($datas['videoName']);
                $Video->setAuteur($datas['auteur']);
                $Video->setTitre ($datas['titre']);
                $Video->setDateVideo ($datas['dateVideo']);


                $Videos[] = $Video;
            }
        } else {
            return $vide;
        }

        return $Videos;

        $req->closeCursor();
    }


    public function SelectVideoByID($Id)
    {  
        
        $vide = '';

        $query = "SELECT * FROM video WHERE idVideo = :idVideo";

        $req = $this->_bdd->prepare($query);

        $req->bindValue(':idVideo', $Id, PDO::PARAM_INT);
        
         $req->execute();
         

         if ($req) {

            while ($datas = $req->fetch(PDO::FETCH_ASSOC)) {

                $Video = new Video([]);

                $Video->setIdVideo($datas['idVideo']);
                $Video->setVideoName($datas['videoName']);
                $Video->setAuteur($datas['auteur']);
                $Video->setTitre ($datas['titre']);
                $Video->setDateVideo ($datas['dateVideo']);
                

                return $Video;
            }
        } else {
            return $vide;
        }

        $req->closeCursor();
    }
}