<?php

if(! function_exists('getRangeDates'))
{
    function getRangeDates($fromDate, $toDate)
    {
        $datePeriods = new \DatePeriod(
            new \DateTime($fromDate),
            new \DateInterval('P1D'),
            new \DateTime($toDate)
        );

        $periods = [];

        foreach($datePeriods as $p) {
            $periods[] = $p->format('Y-m-d');
        }

        return $periods;
    }
}