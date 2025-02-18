
<?php

class Personne{

    //Encapsulation (visibilité: private)
    private int $id;
    private $prenom;
    private $nom;
    public $age;
    private $ville;

    public function __construct($id, $prenom, $nom, $age, $ville){
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->age = $age;
        $this->ville = $ville;
    }

    public function setId(int $id): void {$this->id = $id;}

	public function setPrenom( $prenom): void {$this->prenom = $prenom;}

	public function setNom( $nom): void {$this->nom = $nom;}

	public function setAge( $age): void {$this->age = $age;}

	public function setVille( $ville): void {$this->ville = $ville;}

	

    public function getId(): int {return $this->id;}

	public function getPrenom() {return $this->prenom;}

	public function getNom() {return $this->nom;}

	public function getAge() {return $this->age;}

	public function getVille() {return $this->ville;}

	

}

