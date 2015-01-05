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
}