<?php

namespace Strings;


trait kebabCase
{
    public function kebabCase()
    {
        return $this
            ->slugCase();
    }
}