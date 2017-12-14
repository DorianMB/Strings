<?php
//je me suis bien update

namespace Strings;


trait snakeCase
{
    public function snakeCase()
    {
        if (preg_match("/[-,_, ]+/", $this->string) === 1){
            return $this
                ->replace('-', ' ')
                ->ucwords()
                ->replace(' ', '_')
                ->strtolower();
        }
        else{
            $patern ="/(.)(?=[A-Z])/";
            $this->string = preg_replace($patern, '$1_',$this->string);
            return $this
                ->strtolower();
        }
    }
}