<?php

class Rental extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rental';

    protected static function extendEndDate($rtl_id){

        $rtl = DB::table('rental')->where('rtl_id', $rtl_id)->get();

        DB::table('rental')->where('rtl_id', $rtl_id)
                           ->update(array('rtl_end_date' =>
                           				date_add(
                           						date_create($rtl[0]->rtl_end_date),
                           						date_interval_create_from_date_string("30 days")
 												)
                           				)
                           			);

    }

    protected static function checkRentalNumber($rtl_usr_id)
    {
        return DB::table('rental')->where('rtl_usr_id', $rtl_usr_id)
                                  ->where('rtl_is_returned', 0)
                                  ->count();
    }

    protected static function isBookReturned($rtl_usr_id, $rtl_bok_id)
    {
        $rental_status = DB::table('rental')->where('rtl_usr_id', $rtl_usr_id)
                                            ->where('rtl_bok_id', $rtl_bok_id)
                                            ->first();

        if (is_null($rental_status))
          return 1;

        return $rental_status->rtl_is_returned;
    }

}