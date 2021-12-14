<?php

namespace Tests;

use App\StringUtil;
use PHPUnit\Framework\TestCase;

class StringUtilTest extends TestCase
{

    public function testAllCharactersInOtherString_with_empty_parameter()
    {
        // GIVEN
        $stringUtil = new StringUtil();

        // WHEN // THEN
        $this->assertTrue($stringUtil->allCharactersInOtherString("asdasd", ""));
        $this->assertTrue($stringUtil->allCharactersInOtherString("", "abc"));
    }

    public function testAllCharactersInOtherString_with_not_empty_parameter_true()
    {
        // GIVEN
        $stringUtil = new StringUtil();

        // WHEN // THEN
        $this->assertTrue($stringUtil->allCharactersInOtherString("aAaaAAA", "aA"));
        $this->assertTrue($stringUtil->allCharactersInOtherString("aaaabbbbc", "abc"));
    }

    public function testAllCharactersInOtherString_with_not_empty_parameter_false()
    {
        // GIVEN
        $stringUtil = new StringUtil();

        // WHEN // THEN
        $this->assertFalse($stringUtil->allCharactersInOtherString("ab", "aA"));
    }
}
