<?php 

class Compte{

    // ATTRIBUT / Variables d'instance
    private $numero;
    private $solde = 10;
    private Personne $auteur;

    // 'static' : variable de classe (même copie pour toutes les instances)
    private static $compteur = 10000;

    // constante de classe.
    public const TYPE = "epargne";

    public function __construct($solde, Personne $auteur){
        $this->setNumero( $this->numGenerate() );
        $this->setSolde($solde);
        $this->auteur = $auteur;
    }

    private function numGenerate(){
        return self::TYPE .'-'. ++self::$compteur;
    }


    public static function getCompteur(){
        // 💡/!\ PASE DE $this  DANS UNE METHODE STATIC

        return self::$compteur;
    }

    public function getSole(){return $this->solde;}
    public function getNumero(){return $this->numero;}

    public function setSolde($montant){
        $this->solde = $montant;
    }

    public function setNumero($numero){
        $this->numero = $numero;;
    }


    // Méthodes / méthode d'instance
    public function consulter(){
                    //le this fait référence à l'objet courant.
        return "numéro : " . $this->numero . 
        "<br> Votre solde : " . $this->solde. 
        "<br> Type compte: " . self::TYPE . 
        "<br>";
    }

    public function deposer($montant){
      //  $this->solde = $this->solde + $montant;
        
        if( $montant > 0 ){
            $this->solde += $montant;
        }else{
            echo "Dépôt impossible ....";
        }
    }

    public function retirer($montant){
      //  $this->solde = $this->solde - $montant;
        if( $this->solde >= $montant ){
            $this->solde -= $montant;
        }else{
            echo "Retrait impossible ....";
        }
    }

    public function virer($montant, $comptDes){
        if( $this->solde >= $montant ){
            $this->retirer($montant);
            $comptDes->deposer($montant);
        }else{
            echo "virement impossible de " . $montant . 
            " montant supérieur au solde : " . $this->solde;
        }
    }

}
