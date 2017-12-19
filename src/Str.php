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
        return new self($string);
    }

    public static function checkIf($string)
    {
        return self::on($string);
    }

    //Fonction qui remplace un mot par un autre
    public function replace ($search, $replace)
    {
        $str = str_replace($search, $replace, $this->string);
        return new self($str);
    }

    //Fonction qui met la première lettre des mots en majuscule
    public function ucwords()
    {
        $str = ucwords($this->string);
        return new self($str);
    }

    //Fonction qui met la première lettre des mots en minuscule
    public function lcfirst()
    {
        $str = lcfirst($this->string);
        return new self($str);
    }

    public function strtolower(){
        $str = strtolower($this->string);
        return new self($str);
    }

    public function contains($search, $strict=false)
    {

        if ($strict === true){
            $pattern = "/".$search."/";
            if (preg_match($pattern, $this->string) >= 1){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            $pattern = "/".$this->strtolower($search)."/";
            if (preg_match($pattern, $this->strtolower($this->string)) >= 1){
                return true;
            }
            else{
                return false;
            }
        }
    }

    public function startsWith($search, $strict = false)
    {
        $search = '^'.$search;
        return $this->contains($search, $strict);

    }

    public function endsWith($search, $strict = false)
    {
        $search = $search.'$';
        return $this->contains($search, $strict);
    }

    public function is($search, $strict = false)
    {
        $table = preg_split("/[*]/", $search);
        if ($this->startsWith($table[0], $strict)===true && $this->endsWith($table[1], $strict)===true){
            return true;
        }
        else{
            return false;
        }
    }

    public static function __callStatic($name, $arguments)
    {
        $method = (string) Str::on($name)->replace('to', '')->lcfirst();
        return (string) Str::on($arguments[0])->{$method}();
    }

    public function __get($name)
    {
        $method = (string) Str::on($name)->lcfirst();
        $str = $this->{$method}()->toString();
        return $str;
    }

    public function __invoke()
    {
        $str = $this->toString();
        return $str;
    }
}