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

class Bob
{
    public function respondTo(string $str): string
    {
        $trimmedStr = trim($str);
        $response = "Whatever.";

        $isQuestion = $this->isQuestion($trimmedStr);
        $isYelling = $this->isYelling($str);

        if (empty($trimmedStr)) {
            $response = "Fine. Be that way!";
        } else if ($isQuestion && $isYelling) {
            $response = "Calm down, I know what I'm doing!";
        } else if ($isQuestion) {
            $response = "Sure.";
        } else if ($isYelling) {
            $response = "Whoa, chill out!";
        }

        return $response;
    }

    private function isQuestion(string $str): bool
    {
        return str_ends_with($str, '?'); // preg_match('/\?$/', $str) == 1
    }

    private function isYelling(string $str): bool
    {
        $filteredStr = preg_replace('/[^a-zA-Z]/', '', $str);
        return ctype_upper($filteredStr);
    }
}
