<?php
/**
 * Created by PhpStorm.
 * User: alireza
 * Date: 10/6/18
 * Time: 1:38 PM
 */

namespace Persianworkdays\Facades;


use Illuminate\Support\Facades\Facade;

class PWorkdays extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'PWorkdays';
    }

}