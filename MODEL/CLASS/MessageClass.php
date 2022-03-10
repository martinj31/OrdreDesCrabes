<?php



class Message{
    
    
    private $idMessage;
    private $Message;
    private $dateMessage;
    private $idUser ;


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
     * Get the value of idMessage
     */ 
    public function getIdMessage()
    {
        return $this->idMessage;
    }

    /**
     * Set the value of idMessage
     *
     * @return  self
     */ 
    public function setIdMessage($idMessage)
    {
        $this->idMessage = $idMessage;

        return $this;
    }

    /**
     * Get the value of Message
     */ 
    public function getMessage()
    {
        return $this->Message;
    }

    /**
     * Set the value of Message
     *
     * @return  self
     */ 
    public function setMessage($Message)
    {
        $this->Message = $Message;

        return $this;
    }

    /**
     * Get the value of dateMessage
     */ 
    public function getDateMessage()
    {
        return $this->dateMessage;
    }

    /**
     * Set the value of dateMessage
     *
     * @return  self
     */ 
    public function setDateMessage($dateMessage)
    {
        $this->dateMessage = $dateMessage;

        return $this;
    }

    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }
}
?>