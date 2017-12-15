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

    public function toString()
    {
        return $this->string;
    }

    //Fonction on qui crée un nouvel objet Str en static
    public static function on($string)
    {
        return new Str($string);
    }

    public function reset()
    {
        $str = $this->string;
        return new Str($str);
    }

    //Fonction qui remplace un mot par un autre
    public function replace ($search, $replace)
    {
        $str = str_replace($search, $replace, $this->string);
        return new Str($str);
    }

    //Fonction qui met la première lettre des mots en majuscule
    public function ucwords()
    {
        $str = ucwords($this->string);
        return new Str($str);
    }

    //Fonction qui met la première lettre des mots en minuscule
    public function lcfirst()
    {
        $str = lcfirst($this->string);
        return new Str($str);
    }

    public function strtolower(){
        $str = strtolower($this->string);
        return new Str($str);
    }

    public static function __callStatic($name, $arguments)
    {
        $method = (string) Str::on($name)->replace('to', '')->lcfirst();
        return (string) Str::on($arguments[0])->{$method}();
    }

    public function __get($name)
    {
        $this->$name()->toString();
    }
}