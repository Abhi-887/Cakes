<?php

namespace App\Helpers;

class TimeHelper
{
    public static function getConsultationTimes()
    {
        $start = new \DateTime('10:00');
        $end = new \DateTime('18:00');
        $interval = new \DateInterval('PT1H');
        $slots = [];

        while ($start < $end) {
            $slots[] = $start->format('g:ia') . '-' . $start->add(new \DateInterval('PT45M'))->format('g:ia');
            $start->add($interval);
        }

        return $slots;
    }
}
