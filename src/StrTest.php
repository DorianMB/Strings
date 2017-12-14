<?php

namespace Strings;

use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    public function testExo1()
    {

        $str = (string) Str::on('my_string')
            ->replace('_', ' ')
            ->ucwords()
            ->replace(' ', '')
            ->lcfirst();

        $this->assertSame('myString', $str);
    }

    public function testExo2()
    {
        $str = Str::on('my_string')
            ->camelCase()
            ->toString();
        $this->assertSame('myString', $str);

        $str = Str::toCamelCase('my_string');
        $this->assertSame('myString', $str);
    }

}