<?php

namespace wcs;

use \DatePeriod;
use \DateInterval;

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
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getTravelInfo()
    {
        $interval = $this->start->diff($this->end);
        return "Il y a " . $interval->format('%R%Y') . " années " . $interval->format('%R%m') . " mois " . $interval->format('%R%d') . " jours " . $interval->format('%R%H') . " heures " . $interval->format('%R%i') . " minutes " . $interval->format('%R%s') . " secondes entre les deux dates";
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
    public function backToFutureStepByStep()
    {
        $begin = $this->start;
        $end = $this->end;
        $interval = new DateInterval('P1M1W1D');
        $dateRange = new DatePeriod($begin, $interval, $end);
        foreach ($dateRange as $date) {
            $step[] = $date->format("M d Y A H:i");
        }
        return $step;
    }


}