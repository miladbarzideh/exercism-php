<?php

declare(strict_types=1);

class Lasagna
{
    function expectedCookTime()
    {
        return 40;
    }

    function remainingCookTime($elapsedMinutes)
    {
        return $this->expectedCookTime() - $elapsedMinutes;
    }

    function totalPreparationTime($layersToPrep)
    {
        return 2 * $layersToPrep;
    }

    function totalElapsedTime($layersToPrep, $elapsedMinutes)
    {
        return $this->totalPreparationTime($layersToPrep) + $elapsedMinutes;
    }

    function alarm()
    {
        return "Ding!";
    }
}
