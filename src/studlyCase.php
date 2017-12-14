<?php

namespace Strings;


trait studlyCase
{
    public function studlyCase()
    {
        return $this
            ->camelCase()
            ->ucwords();
    }
}