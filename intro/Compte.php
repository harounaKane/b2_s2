<?php 

class Compte{

    // ATTRIBUT / Variables d'instance
    public $numero;
    public $solde;

    // Méthodes / méthode d'instance
    public function consulter(){
                    //le this fait référence à l'objet courant.
        return "numéro : " . $this->numero . 
        " Votre solde : " . $this->solde;
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
