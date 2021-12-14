<?php


use PHPUnit\Framework\TestCase;
use App\CodeGenerator;

class CodeGeneratorTest extends TestCase
{
    public function test_it_generates_proper_length_string() {
        // GIVEN
        $codeGenerator = new CodeGenerator(false, false);
        $codeLength = 12;

        // WHEN
        $result = $codeGenerator->generate($codeLength);

        // THEN
        $this->assertEquals($codeLength, strlen($result));
    }

    public function test_it_contains_proper_characters() {
        // GIVEN
        $codeGenerator = new CodeGenerator(false, false);
        $codeLength = 12;

        // WHEN
        $result = $codeGenerator->generate($codeLength);

        // THEN
        $this->assertTrue(
            (new \App\StringUtil())->allCharactersInOtherString($result, CodeGenerator::ENABLED_CHARACTERS));
    }

    public function test_it_contains_proper_characters_capitals() {
        // GIVEN
        $codeGenerator = new CodeGenerator(true, false);
        $codeLength = 12;

        // WHEN
        $result = $codeGenerator->generate($codeLength);

        // THEN
        $this->assertTrue(
            (new \App\StringUtil())->allCharactersInOtherString($result,
                CodeGenerator::ENABLED_CHARACTERS . CodeGenerator::ENABLED_CAPITAL_CHARACTERS));
    }

    public function test_it_contains_proper_characters_capitals_digits() {
        // GIVEN
        $codeGenerator = new CodeGenerator(true, true);
        $codeLength = 12;

        // WHEN
        $result = $codeGenerator->generate($codeLength);

        // THEN
        $this->assertTrue(
            (new \App\StringUtil())->allCharactersInOtherString($result,
                CodeGenerator::ENABLED_CHARACTERS .
                CodeGenerator::ENABLED_CAPITAL_CHARACTERS .
                CodeGenerator::ENABLED_DIGITS));
    }


}
