<?php
namespace App;

class CodeGenerator
{

    public const ENABLED_CHARACTERS = 'abcdefghjkmnpqrstuvzy';
    public const ENABLED_CAPITAL_CHARACTERS = 'ABCDEFGHJKMNPQRSTUVZY';
    public const ENABLED_DIGITS = '23456789';

    private bool $capitalsEnabled;
    private bool $digitsEnabled;

    public function __construct(bool $capitalsEnabled = false, bool $digitsEnabled = false)
    {
        $this->capitalsEnabled = $capitalsEnabled;
        $this->digitsEnabled = $digitsEnabled;
    }

    public function generate(int $codeLength): string
    {
        $code = '';

        $valueSet = CodeGenerator::ENABLED_CHARACTERS;

        if ($this->capitalsEnabled) {
            $valueSet .= CodeGenerator::ENABLED_CAPITAL_CHARACTERS;
        }

        if ($this->digitsEnabled) {
            $valueSet .= CodeGenerator::ENABLED_DIGITS;
        }

        for ($i = 0 ; $i < $codeLength ; $i++) {
            $code .= $valueSet[random_int(0, strlen($valueSet) - 1)];
        }

        return $code;
    }
}