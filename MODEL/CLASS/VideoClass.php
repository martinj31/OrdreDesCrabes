<?php



class Video{
    
    
    private $idVideo;
    private $videoName;
    private $auteur;
    private $titre;
    private $dateVideo;


    public function __construct(array $donnees){
        
        $this->hydrate($donnees);
        
    }

    
    
    public function hydrate(array $donnees){
        
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key); 
            if (method_exists($this, $method)){
                // On appelle le setter.
                $this->$method($value);
                
            }
        }
    }


    
    /**
     * Get the value of id_User
     */ 
    public function getIdVideo()
    {
        return $this->idVideo;
    }

    /**
     * Set the value of id_User
     *
     * @return  self
     */ 
    public function setIdVideo($idVideo)
    {
        $this->idVideo = $idVideo;

        return $this;
    }


     
    /**
     * Get the value of id_User
     */ 
    public function getVideoName()
    {
        return $this->videoName;
    }

    /**
     * Set the value of id_User
     *
     * @return  self
     */ 
    public function setVideoName($videoName)
    {
        $this->videoName = $videoName;

        return $this;
    }



    /**
     * Get the value of id_User
     */ 
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set the value of id_User
     *
     * @return  self
     */ 
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }



    /**
     * Get the value of id_User
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of id_User
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }



    /**
     * Get the value of id_User
     */ 
    public function getDateVideo()
    {
        return $this->dateVideo;
    }

    /**
     * Set the value of id_User
     *
     * @return  self
     */ 
    public function setDateVideo($dateVideo)
    {
        $this->dateVideo = $dateVideo;

        return $this;
    }

    
}
?>