<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use App\Booking;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $bookings = Booking::whereIn('status_booking', ['Booking','Sewa'])->get();
        $booking_list = [];
        foreach ($bookings as $key => $event)
        {
            $kode = $event->kode_booking;
            $status = $event->status_booking;
            $info = $kode.' '.$status;
            $booking_list[] = Calendar::event(
                $info,
                true,
                new \DateTime($event->tgl_mulai),
                new \DateTime($event->tgl_selesai.'+1 day')
            );
        }
        $booking_detail = Calendar::addEvents($booking_list);
        return view('admin', compact('booking_detail'));
    }

}
