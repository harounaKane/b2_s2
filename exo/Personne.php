
<?php

class Personne{

    //Encapsulation (visibilité: private)
    private $prenom;
    private $nom;
    public $age;
    private $ville;

    public function __construct($prenom, $nom, $age, $ville){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->age = $age;
        $this->ville = $ville;
    }


    public function estMemePrenom(Personne $p){
        return $this->prenom == $p->prenom;
    }

    //getter (accesseur)

    public function getPrenom(){
        return $this->prenom;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getAge(){
        return $this->age;
    }

    public function getVille(){
        return $this->ville;
    }




    // setter (mutteur)
    
    public function setPrnom($prenom){
        $this->prenom = $prenom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setAge($age){
        if( is_numeric($age) ){
            $this->age = $age;
        }else{
            $this->age = 0;
        }


    }

    public function setVille($city){
        $this->ville = $city;
    }


    public function afficher(){
        return $this->prenom ." ". 
        $this->nom ." ". 
        $this->age ." ans Vous êtes de la ville de ". 
        $this->ville;
    }

    public function estMajeur(){
        return $this->age >= 18;
    }
}

