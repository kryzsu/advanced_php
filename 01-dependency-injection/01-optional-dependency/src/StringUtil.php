<?php

namespace App;

class StringUtil
{
    public function allCharactersInOtherString(string $source, string $characters): bool {
        if (empty($source) || empty($characters)) {
            return true;
        }
        $stringChars = str_split($source);
        foreach ($stringChars as $ch) {
            if (!str_contains($characters, $ch)) {
                return false;
            }
        }
        return true;
    }
}