<?php

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
            $this->modif = preg_replace($patern, '$1_',$this->modif);
            return $this
                ->strtolower();
        }
    }
}