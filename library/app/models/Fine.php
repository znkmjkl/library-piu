<?php

class Fine extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fine';

    public static $rules = array('fine_amount'=>'required|numeric|min:1');

}