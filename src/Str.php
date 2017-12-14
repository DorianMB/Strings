<?php

namespace Strings;

class Str
{
    use camelCase;
    use snakeCase;
    use slugCase;
    use kebabCase;
    use studlyCase;
    use titleCase;

    private $string;
    private $modif;
    private $send;



    //Fonction construct qui initie l'objet à la variable $string
    public function __construct($string)
    {
        $this->string = $string;
        $this->modif = $string;
    }

    //Méthode magique qui transforme l'objet en string.
    public function __toString()
    {
        return $this->toString();
    }

    public function toString()
    {
        $this->send = $this->modif;
        $this->reset();
        return $this->send;
    }

    //Fonction on qui crée un nouvel objet Str en static
    public static function on($string)
    {
        return new Str($string);
    }

    public function reset()
    {
        $this->modif = $this->string;
        return $this;
    }

    //Fonction qui remplace un mot par un autre
    public function replace ($search, $replace)
    {
        $this->modif = str_replace($search, $replace, $this->modif);
        return $this;
    }

    //Fonction qui met la première lettre des mots en majuscule
    public function ucwords()
    {
        $this->modif = ucwords($this->modif);
        return $this;
    }

    //Fonction qui met la première lettre des mots en minuscule
    public function lcfirst()
    {
        $this->modif = lcfirst($this->modif);
        return $this;
    }

    public function strtolower(){
        $this->modif = strtolower($this->modif);
        return $this;
    }

    public static function __callStatic($name, $arguments)
    {
        $method = (string) Str::on($name)->replace('to', '')->lcfirst();
        return (string) Str::on($arguments[0])->{$method}();
    }
}