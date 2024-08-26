<?php

namespace SalatNotifier;

use SalatNotifier\Models\SalatTime;
use SalatNotifier\Interfaces\SalatTimeInterface;

class SalatTimeManager implements SalatTimeInterface
{
    public function getSalatTimes()
    {
        return SalatTime::first();
    }

    public function setSalatTimes(array $times)
    {
        $salatTimes = SalatTime::firstOrNew();
        $salatTimes->update($times);
    }
}
