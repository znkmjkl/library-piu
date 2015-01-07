<?php

class Writer extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'writer';

    public static $rules = array('author_name'=>'required|alpha|min:2',
								 'author_surname'=>'required|alpha|min:2',
								 'birth_date'=>'required|date_format:"Y-m-d"');

}