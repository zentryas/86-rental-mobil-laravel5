<?php 

use App\User;
use App\Merek;
use App\Mobil;
use App\Booking;
use App\Payment;
use App\Sopir;

	
	function totalUser()
	{
		return User::count();
	}
	function totalMerek()
	{
		return Merek::count();
	}
	function totalMobil()
	{
		return Mobil::count();
	}



	function totalBooking()
	{
		$booking = Booking::where('status_booking','Booking')->get();
		return $booking->count();
	}
	function totalSewa()
	{
		$booking = Booking::where('status_booking','Sewa')->get();
		return $booking->count();
	}
	function totalSelesai()
	{
		$booking = Booking::where('status_booking','Selesai')->get();
		return $booking->count();
	}
	function totalBatal()
	{
		$booking = Booking::where('status_booking','Batal')->get();
		return $booking->count();
	}

	function totalPayment()
	{
		// $payment = \App\Payment::where('user_id', Auth::user()->id)->where('status','pending')->get();
		return Payment::count();
	}
	
	function totalSopir()
	{
		$sopir = \App\Sopir::where('status_sopir',1)->get();
		return $sopir->count();
	}

?>
