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

    public function testExo2_5()
    {
        $str = Str::toCamelCase('my_string');
        $this->assertSame('myString', $str);

        $str = Str::toCamelCase('myString');
        $this->assertSame('myString', $str);

        $str = Str::toCamelCase('my-string');
        $this->assertSame('myString', $str);

        $str = Str::toCamelCase('my string');
        $this->assertSame('myString', $str);

        $str = Str::toCamelCase('My String');
        $this->assertSame('myString', $str);
    }

    public function testExo3()
    {
        $str = Str::toSnakeCase('my_string');
        $this->assertSame('my_string', $str);

        $str = Str::toSnakeCase('myString');
        $this->assertSame('my_string', $str);

        $str = Str::toSnakeCase('my-string');
        $this->assertSame('my_string', $str, -1);

        $str = Str::toSnakeCase('my string');
        $this->assertSame('my_string', $str);

        $str = Str::toSnakeCase('My String');
        $this->assertSame('my_string', $str);
    }

    public function testExo4()
    {
        $str = Str::toSlugCase('my_string');
        $this->assertSame('my-string', $str);

        $str = Str::toSlugCase('myString');
        $this->assertSame('my-string', $str);

        $str = Str::toSlugCase('my-string');
        $this->assertSame('my-string', $str, -1);

        $str = Str::toSlugCase('my string');
        $this->assertSame('my-string', $str);

        $str = Str::toSlugCase('My String');
        $this->assertSame('my-string', $str);
    }

    public function testExo4_5()
    {
        $str = Str::toKebabCase('my_string');
        $this->assertSame('my-string', $str);

        $str = Str::toKebabCase('myString');
        $this->assertSame('my-string', $str);

        $str = Str::toKebabCase('my-string');
        $this->assertSame('my-string', $str, -1);

        $str = Str::toKebabCase('my string');
        $this->assertSame('my-string', $str);

        $str = Str::toKebabCase('My String');
        $this->assertSame('my-string', $str);
    }

}