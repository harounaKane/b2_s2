<?php


class Biblio{
    private int $id;
    private string $ville;
    private array $livres;

    public function __construct(int $id, string $ville){
        $this->id = $id;
        $this->ville = $ville;
        $this->livres = [];
    }

    public function ajouter(Livre $livre){
        $this->livres[] = $livre;
    }

    public function retirer(int $numeroLivre): bool{

        foreach($this->livres as $index => $livre){
            if( $livre->getNumero() == $numeroLivre ){
                array_splice($this->livres, $index, 1);
                return true;
            }
        }

        return false;
    }


    public function getId(){return $this->id;}
	

    public function getVille(): string {
        return $this->ville;
    }

	public function getLivres(): array {
        return $this->livres; 
    }

    public function setVille(string $ville): void {
        $this->ville = $ville;
    }

	public function setLivres(array $livres): void {
        $this->livres = $livres;
    }

	
	
}
