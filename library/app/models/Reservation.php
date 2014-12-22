<?php

class Reservation extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reservation';


    //START : Check this methods
    public function scopeIsAvailable($query, $bok_id) // id or isbn?
    {
        return $query->where('rvn_bok_id', $bok_id);
    }


    public function setRvnStatusAttribute($value)
    {
        $this->attributes['rvn_status'] = $value;
    }


    public function getRvnStatusAttribute($value)
    {
        return ucfirst($value);
    }
    //STOP : Check this methods


    protected static function isAvailable($bok_id) // id or isbn?
    {
        $reservation = DB::table('reservation')->where('rvn_bok_id', $bok_id)
                                               ->first();

        return $reservation->rvn_status;
    }


    protected static function setAvailable($bok_id) // id or isbn?
    {
        DB::table('reservation')->where('rvn_bok_id', $bok_id)
                                ->update(array('rvn_status' => 1));

    }


    protected static function setReserved($bok_id) // id or isbn?
    {
        DB::table('reservation')->where('rvn_bok_id', $bok_id)
                                ->update(array('rvn_status' => 0));

    }

}
