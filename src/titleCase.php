<?php
/**
 * Created by PhpStorm.
 * User: dorian
 * Date: 14/12/2017
 * Time: 13:19
 */

namespace Strings;


trait titleCase
{
    public function titleCase(){
        return $this
            ->studlyCase();
    }
}