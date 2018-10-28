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
use Persianworkdays\Models\Holiday;


class PWorkdays
{
    public static function nextDays($count = 4, $from = null)
    {
        $from = self::now($from);
        ini_set('max_execution_time', 3000);
        $holidays = self::getHolidays();
        $x = 0;
        $firstEndOfWeek = self::getWeekend();
        $endEndOfWeek = self::getWeekend(1);

        for ($i = 0; $i <= 20; $i++) {
            if ($x < $count) {
                $dt = Carbon::parse($from)->addDays($i);
                if (!$dt->$firstEndOfWeek() && !$dt->$endEndOfWeek()) {
                    if (!\in_array($dt->toDateString(), $holidays)) {
                        $x++;
                    }
                }

            } else {
                return \verta($dt)->formatDate();
            }
        }

    }

    private static function now($from)
    {
        return $from ?: Carbon::now('Asia/Tehran')->toDateString();
    }

    private static function getHolidays($from = null)
    {
        $from = self::now($from);

        return Holiday::where('date', '>', $from)->pluck('date')->map(function ($query) {
            return Carbon::parse($query)->toDateString();
        })->toArray();

    }

    private static function getWeekend($index = 0)
    {
        return collect(config('persian-workdays.weekend'))->map(function ($query) {
            return 'is' . ucfirst($query);
        })->toArray()[$index];
    }

    public static function nextHours($hour = 25, $from = null)
    {
        $from = self::now($from);
        ini_set('max_execution_time', 3000);
        $holidays = self::getHolidays();
        $x = 0;
        $betweenTime = config('persian-workdays.work_end') - config('persian-workdays.work_start');
        $days = (int)round($hour / $betweenTime);

        $firstEndOfWeek = self::getWeekend();
        $endEndOfWeek = self::getWeekend(1);

        for ($i = 0; $i <= 20; $i++) {
            if ($x < $days) {
                $dt = Carbon::parse($from)->addDays($i);
                if (!$dt->$firstEndOfWeek() && !$dt->$endEndOfWeek()) {
                    if (!\in_array($dt->toDateString(), $holidays)) {
                        $x++;
                    }
                }

            } else {
                return \verta($dt)->formatDate();
            }
        }

    }


}