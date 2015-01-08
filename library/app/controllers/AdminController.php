<?php

class AdminController extends \BaseController {

	public function getAdmin()
    {
        $users = DB::table('user')
                                ->join('librarian', 'librarian.lbn_usr_id', '!=', 'user.id')
                                ->join('address', 'address.adr_id', '=', 'user.usr_adr_id')
                                ->get();

        $reservations = DB::table('reservation')
                                ->where('rvn_status', true)
                                ->join('book', 'book.bok_id', '=', 'reservation.rvn_bok_id')
                                ->join('user', 'user.id', '=', 'reservation.rvn_usr_id')
                                ->get();

        return View::make('admin.admin', array('users' => $users, 'reservations' => $reservations));
    }

}
