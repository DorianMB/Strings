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
            $patern ="/(.)(?=[A-Z])/";
            $this->modif = preg_replace($patern, '$1-',$this->modif);
            return $this
                ->strtolower();
        }
    }
}