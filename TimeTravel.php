<?php

namespace Wcs;

use \DatePeriod;
use \DateInterval;
use \DateTime;

class TimeTravel
{
    /** @var  string */
    private $start;
    /** @var  string */
    private $end;

    /**
     * TimeTravel constructor.
     * @param $start
     * @param $end
     */
    public function __construct($start, $end)
    {
        $this->start = new DateTime($start);
        $this->end = new DateTime($end);
    }

    /**
     * @return string
     */
    public function getTravelInfo()
    {
        $interval = $this->start->diff($this->end);
        return $interval->format("Il y a %y années, %m mois, %d jours, %h heures, %i minutes et %s secondes.");
    }

    /**
     * @param int $interval
     * @return string
     */
    public function findDate(int $interval)
    {
        $date = $this->start;
        if ($interval >= 0) {
            $date->sub(new DateInterval('PT' . abs($interval) . 'S'));
        } else {
            $date->add(new DateInterval('PT' . abs($interval) . 'S'));
        }
        return $date->format('Y-m-d H:i:s') . "\n";
    }

    /**
     * @return array
     */
    public function backToFutureStepByStep($step)
    {
        $begin = $this->start;
        $end = $this->end;
        $interval = new DateInterval($step);
        $dateRange = new DatePeriod($begin, $interval, $end);
        foreach ($dateRange as $date) {
            $steps[] = $date->format("M d Y A H:i");
        }
        return $steps;
    }


}
