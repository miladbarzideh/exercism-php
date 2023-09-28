<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class SimpleCipher
{
    private const LOWER_A_CODE = 97;
    private const LOWER_Z_CODE = 122;
    public string $key;

    public function __construct(string $key = null)
    {
        if ($key === null) {
            $this->key = $this->generateRandomKey();
        } else if ($key === '' || is_numeric($key) || !ctype_lower($key)) {
            throw new InvalidArgumentException();
        } else {
            $this->key = $key;
        }
    }

    public function encode(string $plainText): string
    {
        $cipherText = '';
        for ($i = 0; $i < strlen($plainText); $i++) {
            $distance = $this->getDistance($i);
            $cipherText = $cipherText . $this->getCipherChar($plainText[$i], $distance);
        }
        return $cipherText;
    }

    public function decode(string $cipherText): string
    {
        $plainText = '';
        for ($i = 0; $i < strlen($cipherText); $i++) {
            $distance = $this->getDistance($i);
            $plainText = $plainText . $this->getTextChar($cipherText[$i], $distance);
        }
        return $plainText;
    }

    private function generateRandomKey(int $length = 100): string
    {
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $char = chr(rand(self::LOWER_A_CODE, self::LOWER_Z_CODE));
            $key = $key . $char;
        }
        return $key;
    }

    public function getDistance(int $i): int
    {
        return ord($this->key[$i]) - self::LOWER_A_CODE;
    }

    private function getCipherChar(string $char, int $distance): string
    {
        $cipherCode = ord($char) + $distance;
        if ($cipherCode <= self::LOWER_Z_CODE) {
            return chr($cipherCode);
        } else {
            return chr(self::LOWER_A_CODE + ($cipherCode - self::LOWER_Z_CODE) - 1);
        }
    }

    private function getTextChar(string $char, int $distance): string
    {
        $cipherCode = ord($char) - $distance;
        if ($cipherCode >= self::LOWER_A_CODE) {
            return chr($cipherCode);
        } else {
            return chr(self::LOWER_Z_CODE - (self::LOWER_A_CODE - $cipherCode) + 1);
        }
    }
}
