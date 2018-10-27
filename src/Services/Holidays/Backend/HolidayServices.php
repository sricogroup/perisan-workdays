<?php
/**
 * Created by PhpStorm.
 * User: Unlimited
 * Date: 5/6/2018
 * Time: 11:48 AM
 */

namespace Persianworkdays\Services\Holidays\Backend;


use Persianworkdays\Models\Holiday;


class HolidayServices
{

    public function all()
    {
        return Holiday::all();

    }

    public function store($data, $id = null)
    {
        if (!empty($id)) {
            $record = $this->find($id);
        } else {
            $record = new Holiday();
        }
        $record->fill($data->all());
        $record->save();

    }

    public function find($id)
    {
        return Holiday::findOrFail($id);
    }

    public function paginate($data = null)
    {
        return Holiday::when($data->filled('date'), function ($query) use ($data) {
            return $query->where('date', $data['date']);
        })
            ->when($data->filled('sort'), function ($query) use ($data) {
                return $query->orderBy('id', $data['sort']);
            })
            ->unless($data->filled('sort'), function ($query) {
                return $query->orderBy('id', 'desc');
            })
            ->paginate(20);

    }

    public function destroy($id)
    {
        $this->find($id)->delete();
    }
}