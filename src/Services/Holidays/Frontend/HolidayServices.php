<?php
/**
 * Created by PhpStorm.
 * User: Unlimited
 * Date: 5/6/2018
 * Time: 11:48 AM
 */

namespace Persianworkdays\Services\Holidays\Frontend;


use Persianworkdays\Models\Holiday;

class HolidayServices
{

    public function all()
    {
        return Holiday::all();

    }

    public function find($id)
    {
        return Holiday::findOrFail($id);
    }

    public function paginate($data)
    {
        return Holiday::when($data->filled('date'), function ($query) use ($data) {
            return $query->where('date', $data['date']);
        })
            ->latest()
            ->paginate(40);

    }
}