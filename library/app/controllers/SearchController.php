<?php

class SearchController extends \BaseController {

    public function getSearch()
    {
        return View::make('home.search');
    }


    public function postBasicSearch()
    {
        $bok_title = Input::get('bok_title');

        $search_results = DB::table('book')->where('bok_title', 'LIKE', '%'. $bok_title . '%')
                                           ->get();

        return View::make('for_testing_purposes.search_results', array('search_results' => $search_results));
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

        $search_results = DB::table('book')->join('author', 'atr_bok_id', '=', 'book.bok_id')
                                           ->join('writer', 'wtr_id', '=', 'author.atr_wtr_id')
                                           ->join('language', 'lng_id', '=', 'book.bok_lng_id')
                                           ->join('kind', 'knd_id', '=', 'book.bok_knd_id')
                                           ->where('bok_isbn', 'LIKE', '%'. $bok_isbn . '%')
                                           ->where('bok_title', 'LIKE', '%'. $bok_title . '%')
                                           ->where('lng_name', 'LIKE', '%'. $bok_lng . '%')
                                           ->where('wtr_name', 'LIKE', '%'. $bok_atr . '%')
                                           ->where('knd_name', 'LIKE', '%'. $bok_knd . '%')
                                           ->where('bok_edition_date', 'LIKE', '%'. $bok_edition_date . '%')
                                           ->where('bok_edition_number', 'LIKE', '%'. $bok_edition_number . '%')
                                           ->get();

        return View::make('for_testing_purposes.search_results', array('search_results' => $search_results));
    }

}
