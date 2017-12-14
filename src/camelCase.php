<?php

namespace Strings;


trait camelCase
{
    public function camelCase()
    {
        return $this
            ->replace('-', ' ')
            ->replace('_', ' ')
            ->ucwords()
            ->replace(' ', '')
            ->lcfirst();
    }
}