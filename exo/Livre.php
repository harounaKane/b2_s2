<?php 

class Livre{
    private int $numero;
    private int $nbrePage;
    private Personne $auteur;
    private string $editeur;

    public function __construct(int $numero, int $page, Personne $auteur, string $editeur){
        $this->numero = $numero;
        $this->nbrePage = $page;
        $this->auteur = $auteur;
        $this->editeur = $editeur;
    }


    public function getNumero(){
        return $this->numero;
    }


    public function setNumero(int $numero){
        $this->numero = $numero;
    }

    public function  setNbrePage(int $page) {
        $this->nbrePage = $page;
    }

    public function setAuteur(Personne $auteur){
        $this->auteur = $auteur;
    }

    public function setEditeur(string $editeur){
        $this->editeur = $editeur;
    }
} 
