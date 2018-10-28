<?php
/**
 * Created by PhpStorm.
 * User: alireza
 * Date: 10/6/18
 * Time: 1:45 PM
 */

namespace Persianworkdays;

use Alireza1992\ProcessManager\Exceptions\NotFound;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Persianworkdays\Models\Hol  iday;


class PWorkdays
{
    public static function nextDays($count = 4, $from = null)
    {
        $i = 1;
        $array = [];
        while ($i < $count) {
            $dt = Carbon::instance($from);
            if (!$dt->isThursday() || !$dt->isFriday()) {
                if (!in_array($dt, $this->getHolidays())) {
                    $array[$i] = Verta::now('Asia/Tehran')->addDays($i);
                }
            }
        }

        return $array;
    }

    private function getHolidays($from = null)
    {
        $from ?: Carbon::now('Asia/Tehran')->toDateString();

        return Holiday::where('date', '>', $from)->pluck('date', 'id')->toArray();
    }


}