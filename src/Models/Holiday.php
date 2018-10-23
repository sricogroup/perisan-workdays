<?php
/**
 * Created by PhpStorm.
 * User: Unlimited
 * Date: 10/23/2018
 * Time: 9:53 AM
 */

namespace PersianWorkdays\Models;


use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $casts = ['date' => 'date'];

    protected $fillable = ['date', 'title'];

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Verta::parse($value)->formatGregorian('Y-m-d');
    }

    public function getDateAttribute($value)
    {
        return \verta($value)->formatDate();
    }
}