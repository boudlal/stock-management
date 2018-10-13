<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Notifications\StockNotifications;
use App\Orders;
use App\OrdersDetails;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Orders $orders, OrdersDetails $details, User $user)
    {
        $orders = $orders->orderBy('id', 'desc')->take(6)->get();
        return view('home', compact('orders'));
    }

    public function calendarIndex(Calendar $calendar)
    {
        return view('admin.calendar.index');
    }

    public function allCalendar(Calendar $calendar)
    {
        $calendar = $calendar->select('id', 'date', 'title', 'desc')->get()->toJson();
        return response($calendar);
    }

    public function deleteCalendar($id, Calendar $calendar)
    {
        $calendar->find($id)->delete();
    }

    public function storeCalendar(Calendar $calendar, Request $request)
    {
      $data = [
        'title' => $request->title,
        'desc' => $request->desc,
        'date' => $request->date,
      ];
      $calendar->create($data);
      return response($request);
    }

}
