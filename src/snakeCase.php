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
            $pattern ="/(.)(?=[A-Z])/";
            $this->string = preg_replace($pattern, '$1_',$this->string);
            return $this
                ->strtolower();
        }
    }
}