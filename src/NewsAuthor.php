<?php 

class NewsAuthor
{

    private $portrait, $firstName, $lastName;

    public function setName($f,$l){
        $this->firstName = ucfirst($f);
        $this->lastName = ucfirst($l);
    }

    public function setPortrait($l){
        $this->portrait = $l;
    }

    public function __toString(){
        return $this->firstName . " " . $this->lastName;
    }

    public function getPort(){
        return $this->portrait;
    }

}





?>