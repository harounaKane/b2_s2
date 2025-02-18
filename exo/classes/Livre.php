<?php 

class Livre{
    private int $numero;
    private int $nbrePage;
    private Personne $auteur;
    private string $editeur;
    private Biblio $biblio;

    public function __construct(int $numero, int $page, Personne $auteur, string $editeur, Biblio $biblio){
        $this->numero = $numero;
        $this->nbrePage = $page;
        $this->auteur = $auteur;
        $this->editeur = $editeur;
        $this->biblio = $biblio;
    }

    public function setNumero(int $numero): void {$this->numero = $numero;}

	public function setNbrePage(int $nbrePage): void {$this->nbrePage = $nbrePage;}

	public function setAuteur(Personne $auteur): void {$this->auteur = $auteur;}

	public function setEditeur(string $editeur): void {$this->editeur = $editeur;}

	public function setBiblio(Biblio $biblio): void {$this->biblio = $biblio;}

	

    public function getNumero(): int {return $this->numero;}

	public function getNbrePage(): int {return $this->nbrePage;}

	public function getAuteur(): Personne {return $this->auteur;}

	public function getEditeur(): string {return $this->editeur;}

	public function getBiblio(): Biblio {return $this->biblio;}

	
	
} 
