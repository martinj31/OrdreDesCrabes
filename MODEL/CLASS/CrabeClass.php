<?php



class Crabe{
    
    
    private $idCrabe;
    private $IMGPath;
    private $points;
   


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
     * Get the value of idCrabe
     */ 
    public function getIdCrabe()
    {
        return $this->idCrabe;
    }

    /**
     * Set the value of idCrabe
     *
     * @return  self
     */ 
    public function setIdCrabe($idCrabe)
    {
        $this->idCrabe = $idCrabe;

        return $this;
    }

    /**
     * Get the value of IMGPath
     */ 
    public function getIMGPath()
    {
        return $this->IMGPath;
    }

    /**
     * Set the value of IMGPath
     *
     * @return  self
     */ 
    public function setIMGPath($IMGPath)
    {
        $this->IMGPath = $IMGPath;

        return $this;
    }

    /**
     * Get the value of points
     */ 
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set the value of points
     *
     * @return  self
     */ 
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }
}
?>