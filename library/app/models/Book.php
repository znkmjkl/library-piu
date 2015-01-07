<?php

class Book extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'book';

     public static $rules = array('bok_isbn'=>'required|digits_between:13,13',
								 'bok_title'=>'required|min:2',
								 'writer'=>'required|array',
								 'language'=>'required|integer',
								 'kind'=>'required|integer',
								 'date'=>'required|date_format:"Y-m-d"',
								 'edition'=>'required|integer'	 
								 );
}