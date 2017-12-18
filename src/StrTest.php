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

    public function testExo5()
    {
        $str = Str::toStudlyCase('my_string');
        $this->assertSame('MyString', $str);

        $str = Str::toStudlyCase('myString');
        $this->assertSame('MyString', $str);

        $str = Str::toStudlyCase('my-string');
        $this->assertSame('MyString', $str, -1);

        $str = Str::toStudlyCase('my string');
        $this->assertSame('MyString', $str);

        $str = Str::toStudlyCase('My String');
        $this->assertSame('MyString', $str);
    }

    public function testExo5_5()
    {
        $str = Str::toTitleCase('my_string');
        $this->assertSame('MyString', $str);

        $str = Str::toTitleCase('myString');
        $this->assertSame('MyString', $str);

        $str = Str::toTitleCase('my-string');
        $this->assertSame('MyString', $str, -1);

        $str = Str::toTitleCase('my string');
        $this->assertSame('MyString', $str);

        $str = Str::toTitleCase('My String');
        $this->assertSame('MyString', $str);
    }

    public function testExo6()
    {
            $str = Str::on('mY StrIng');

            $this->assertSame('myString', $str->camelCase()->toString());   // true

            $this->assertSame('my_string', $str->snakeCase()->toString()); // true

            $this->assertSame('MyString', $str->studlyCase()->toString()); // true

            $this->assertSame('MyString', $str->titleCase()->toString()); // true

            $this->assertSame('my-string', $str->slugCase()->toString()); // true

            $this->assertSame('my-string', $str->kebabCase()->toString()); // true

            $this->assertSame('mY StrIng',  $str->toString()); // true

            $this->assertSame('mY StrIng', (string) $str); // true
    }

    public function testExo7()
    {
        $str = str('mY StrIng');

        $string = $str->camelCase;
        $this->assertSame('myString', $string);// true

        $string = $str->snakeCase;
        $this->assertSame('my_string', $string);// true

        $string = $str->studlyCase;
        $this->assertSame('MyString', $string);// true

        $string = $str->titleCase;
        $this->assertSame('MyString', $string);// true

        $string = $str->slugCase;
        $this->assertSame('my-string', $string);// true

        $string = $str->kebabCase;
        $this->assertSame('my-string', $string);// true

        $this->assertSame('mY StrIng',$str()); // true

        $kebab = str('mY StrIng')
            ->camelCase()
            ->snakeCase()
            ->studlyCase()
            ->titleCase()
            ->slugCase()
            ->kebabCase;

        $this->assertSame('my-string', $kebab);
    }
/*
    public function TestExo8()
    {
        $str = Str::checkIf('mY StrIng')->contains('str'); // true
        
        $str = Str::checkIf('mY StrIng')->contains('str', [strict] true ); // false

        $str = Str::checkIf('mY StrIng')->contains('Str', [strict] true ); // true

        $str = Str::checkIf('mY StrIng')->snake_case()->contains('str', [strict] true ); // true

        $str = Str::on('mY StrIng')->snake_case()->contains('str', [strict] true ); // true

        $str = str('mY StrIng')->snake_case()->contains('str', [strict] true ); // true

        $str = Str::checkIf('mY StrIng')->startsWith('my'); // true

        $str = Str::checkIf('mY StrIng')->startsWith('my', [strict] true ); // false

        $str = Str::checkIf('mY StrIng')->endsWith('ing'); // true

        $str = Str::checkIf('mY StrIng')->endsWith('ing', [strict] true ); // false

        $str = Str::checkIf('mY StrIng')->is('*ing'); // true

        $str = Str::checkIf('mY StrIng')->is('my*'); // true

        $str = Str::checkIf('mY StrIng')->is('my*ng'); // true

        $str = Str::checkIf('mY StrIng')->is('my*ng', [strict] true); // false
    }*/
}