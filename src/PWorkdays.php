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
use Illuminate\Support\Facades\Log;
use Persianworkdays\Models\Holiday;


class PWorkdays
{
    public static function nextDays($count = 4, $from = null)
    {
        $from = self::now($from);
        ini_set('max_execution_time', 3000);
        $holidays = self::getHolidays();
        $x = 0;
        for ($i = 0; $i <= 20; $i++) {
            if ($x < $count) {
                $dt = Carbon::parse($from)->addDays($i);
//                Log::info('X is lower or equal to $count |||| $i => ' . $i . ' $x = ' . $x . ' $dt =' . $dt->toDateString());
                if (!$dt->isThursday() && !$dt->isFriday()) {
//                    Log::info('pass not weekend |||| $i => ' . $i . ' $x = ' . $x . ' $dt =' . $dt->toDateString());
                    if (!in_array($dt->toDateString(), self::getHolidays())) {
//                        Log::info('pass not holiday |||| $i => ' . $i . ' $x = ' . $x . ' $dt =' . $dt->toDateString());
                        $x++;
                    }
                }

            } else {
//                Log::info('X bigger than count |||| $i => ' . $i . ' $x = ' . $x . ' $dt =' . $dt->toDateString());
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


}