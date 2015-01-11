<?php

class Reservation extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reservation';


    protected static function isAvailable($bok_id)
    {
        $reservation = DB::table('reservation')->where('rvn_bok_id', $bok_id)
                                               ->first();

        if (!is_null($reservation))
            return $reservation->rvn_status;
    }


    protected static function setAvailable($bok_id, $rvn_usr_id)
    {
        DB::table('reservation')->where('rvn_bok_id', $bok_id)
                                ->update(array('rvn_status' => 0, 'rvn_usr_id' => $rvn_usr_id));

    }


    protected static function setReserved($bok_id, $rvn_usr_id)
    {
        DB::table('reservation')->where('rvn_bok_id', $bok_id)
                                ->update(array('rvn_status' => 1, 'rvn_usr_id' => $rvn_usr_id));

    }


    protected static function checkReservationNumber($rvn_usr_id)
    {
        return DB::table('reservation')->where('rvn_usr_id', $rvn_usr_id)
                                       ->where('rvn_status', 1)
                                       ->count();
    }

}
