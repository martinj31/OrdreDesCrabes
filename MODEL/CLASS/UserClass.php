<?php



class User{
    
    
    private $idUser;
    private $Pseudo;
    private $MDP;
    private $Score;


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
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of id_User
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of nomUser
     */ 
    public function getPseudo()
    {
        return $this->Pseudo;
    }

    /**
     * Set the value of nomUser
     *
     * @return  self
     */ 
    public function setPseudo($Pseudo)
    {
        $this->Pseudo = $Pseudo;

        return $this;
    }

    /**
     * Get the value of prenomUser
     */ 
    public function getMDP()
    {
        return $this->MDP;
    }

    /**
     * Set the value of prenomUser
     *
     * @return  self
     */ 
    public function setMDP($MDP)
    {
        $this->MDP = $MDP;

        return $this;
    }

    

    /**
     * Get the value of Score
     */ 
    public function getScore()
    {
        return $this->Score;
    }

    /**
     * Set the value of Score
     *
     * @return  self
     */ 
    public function setScore($Score)
    {
        $this->Score = $Score;

        return $this;
    }
}
?>