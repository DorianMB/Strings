<?php

namespace Strings;


trait camelCase
{
    public function camelCase()
    {
        if (preg_match("/[-,_, ]+/", $this->string) === 1){
            return $this
                ->strtolower()
                ->replace('-', ' ')
                ->replace('_', ' ')
                ->ucwords()
                ->replace(' ', '')
                ->lcfirst();
        }
        else{
            return $this;
        }
    }
}