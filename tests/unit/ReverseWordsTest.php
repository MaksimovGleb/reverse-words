<?php

namespace Tests\unit;

use App\ReverseWords;
use PHPUnit\Framework\TestCase;

class ReverseWordsTest extends TestCase
{
    public function testSimpleEnglish()
    {
        $this->assertEquals('Tac', ReverseWords::transform('Cat'));
        $this->assertEquals('esuOh', ReverseWords::transform('houSe'));
    }

    public function testRussian()
    {
        $this->assertEquals('Ьшым', ReverseWords::transform('Мышь'));
        $this->assertEquals('кимОД', ReverseWords::transform('домИК'));
    }

    public function testMixedWithPunctuation()
    {
        $this->assertEquals('tac,', ReverseWords::transform('cat,'));
        $this->assertEquals('Амиз:', ReverseWords::transform('Зима:'));
        $this->assertEquals("si 'dloc' won", ReverseWords::transform("is 'cold' now"));
        $this->assertEquals('отэ «Кат» "отсорп"', ReverseWords::transform('это «Так» "просто"'));
    }

    public function testCompoundWords()
    {
        $this->assertEquals('driht-trap', ReverseWords::transform('third-part'));
        $this->assertEquals('nac`t', ReverseWords::transform('can`t'));
    }
}