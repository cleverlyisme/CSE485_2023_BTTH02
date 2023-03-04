<?php
class Article{
    private $tieude;
    private $tomtat;
    private $noidung;


    public function __construct($tieude, $tomtat,$noidung){
        $this->tieude = $tieude;
        $this->tomtat = $tomtat;
        $this->noidung = $noidung;
    }

    public function gettieude(){
        return $this->tieude;
    }
}