<?php
/**
 * Created by PhpStorm.
 * User: Unlimited
 * Date: 10/23/2018
 * Time: 9:42 AM
 */

namespace PersianWorkdays\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PersianWorkdays\Http\Requests\HolidayRequest;
use PersianWorkdays\Services\Holidays\Backend\HolidayServices;

class HolidayController extends Controller
{
    /**
     * @var HolidayServices
     */
    protected $holidayServices;


    /**
     * HolidayController constructor.
     * @param HolidayServices $holidayServices
     */
    public function __construct(HolidayServices $holidayServices)
    {
        $this->holidayServices = $holidayServices;
    }

    public function index(Request $request)
    {
        $holidays = $this->holidayServices->paginate($request);
        return view('PersianWorkdays::holiday.index', compact('holidays'));
    }

    public function create()
    {
        return view('PersianWorkdays::holiday.create');
    }

    public function store(HolidayRequest $request)
    {
        $this->holidayServices->store($request);

        return redirect()->route(config('persian-workdays.as') . 'holiday.index');
    }

    public function edit($id)
    {
        $holiday = $this->holidayServices->find($id);
        return view('PersianWorkdays::holiday.edit', compact('holiday'));
    }

    public function update(HolidayRequest $request, $id)
    {
        $this->holidayServices->store($request, $id);

        return redirect()->route(config('persian-workdays.as') . 'holiday.index');
    }

    public function destroy($id)
    {
        $this->holidayServices->destroy($id);

        return redirect()->route(config('persian-workdays.as') . 'holiday.index');
    }
}