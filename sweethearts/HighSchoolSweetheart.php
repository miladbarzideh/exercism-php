<?php

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        return trim($name)[0];
    }

    public function initial(string $name): string
    {
        return ucfirst($this->firstLetter($name)).".";
    }

    public function initials(string $name): string
    {
        $split_name = explode(" ", $name);
        return $this->initial($split_name[0])." ".$this->initial($split_name[1]);
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        $name_a = $this->initials($sweetheart_a);
        $name_b = $this->initials($sweetheart_b);
        return <<<HEART
                 ******       ******
               **      **   **      **
             **         ** **         **
            **            *            **
            **                         **
            **     $name_a  +  $name_b     **
             **                       **
               **                   **
                 **               **
                   **           **
                     **       **
                       **   **
                         ***
                          *
            HEART;
    }
}
