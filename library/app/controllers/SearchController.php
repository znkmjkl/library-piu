<?php

class SearchController extends \BaseController {

	public function getSearch()
	{
		return View::make('home.search');
	}

	public function postBasicSearch()
	{

        $bok_title = Input::get('bok_title');

        $query = DB::table('book')->where('bok_title', 'LIKE', '%'. $bok_title . '%')
								  ->get();

        return $query;

	}

	public function postAdvancedSearch()
	{

        $bok_isbn           = Input::get('bok_isbn');
        $bok_title          = Input::get('bok_title');
        $bok_lng            = Input::get('bok_lng');
        $bok_atr            = Input::get('bok_atr');
        $bok_knd            = Input::get('bok_knd');
        $bok_edition_date   = Input::get('bok_edition_date');
        $bok_edition_number = Input::get('bok_edition_number');

        $query = DB::table('book')->where('bok_isbn', 'LIKE', '%'. $bok_isbn . '%')
        						  ->where('bok_title', 'LIKE', '%'. $bok_title . '%')
        						  ->where('bok_lng_id', 'LIKE', '%'. $bok_lng . '%') //FIX ME: klucz obcy!
        						  ->where('bok_atr_id', 'LIKE', '%'. $bok_atr . '%') //FIX ME: klucz obcy!
        						  ->where('bok_knd_id', 'LIKE', '%'. $bok_knd . '%') //FIX ME: klucz obcy!
        						  ->where('bok_edition_date', 'LIKE', '%'. $bok_edition_date . '%')
        						  ->where('bok_edition_number', 'LIKE', '%'. $bok_edition_number . '%')
								  ->get();

        return $query; // zwracamy tablice obiektow;
		// var_dump($query);

	}

}
