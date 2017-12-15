<?php

namespace Strings;


trait slugCase
{
    public function slugCase()
    {
        if (preg_match("/[-,_, ]+/", $this->string) === 1){
            return $this
                ->replace('_', ' ')
                ->ucwords()
                ->replace(' ', '-')
                ->strtolower();
        }
        else{
            $pattern ="/(.)(?=[A-Z])/";
            $this->string = preg_replace($pattern, '$1-',$this->string);
            return $this
                ->strtolower();
        }
    }
}