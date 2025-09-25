<?php
namespace App;

class ReverseWords
{
    public static function transform(string $input): string
    {
        return preg_replace_callback(
            '/\p{L}+/u',
            function ($matches) {
                $word = $matches[0];
                $letters = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);

                $reversed = array_reverse($letters);

                foreach ($letters as $i => $orig) {
                    $reversed[$i] = mb_strtolower($reversed[$i]);
                    if (mb_strtoupper($orig) === $orig) {
                        $reversed[$i] = mb_strtoupper($reversed[$i]);
                    }
                }
                return implode('', $reversed);
            },
            $input
        );
    }
}