<?php

namespace Strings;

class Str
{
    private $string;



    //Fonction construct qui initie l'objet à la variable $string
    public function __construct($string)
    {
        $this->string = $string;
    }

    //Méthode magique qui transforme l'objet en string.
    public function __toString()
    {
        return $this->toString();
    }

    public function toString(){
        return $this->string;
    }

    //Fonction on qui crée un nouvel objet Str en static
    public static function on($string)
    {
        return new Str($string);
    }

    //Fonction qui remplace un mot par un autre
    public function replace ($search, $replace)
    {
        $this->string = str_replace($search, $replace, $this->string);
        return $this;
    }

    //Fonction qui met la première lettre des mots en majuscule
    public function ucwords()
    {
        $this->string = ucwords($this->string);
        return $this;
    }

    //Fonction qui met la première lettre des mots en minuscule
    public function lcfirst()
    {
        $this->string = lcfirst($this->string);
        return $this;
    }
}