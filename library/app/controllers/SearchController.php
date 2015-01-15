<?php

class SearchController extends \BaseController {

    public function getSearch()
    {
        $languages = Language::orderBy('lng_name')->lists('lng_name');

        $kinds = Kind::orderBy('knd_name')->lists('knd_name');

        return View::make('search.search', array('languages' => $languages,
                                                 'kinds' => $kinds));
    }


    public function postBasicSearch()
    {
        $bok_title = Input::get('bok_title');

        return Redirect::to('search/results')->withInput();
    }


    public function getBasicSearch()
    {
        $bok_title = Form::getValueAttribute('bok_title');

        // FIXME: DRY !!
        $search_results = DB::table('book')->join('author', 'atr_bok_id', '=', 'book.bok_id')
                                           ->join('writer', 'wtr_id', '=', 'author.atr_wtr_id')
                                           ->join('language', 'lng_id', '=', 'book.bok_lng_id')
                                           ->join('kind', 'knd_id', '=', 'book.bok_knd_id')
                                           ->leftJoin('reservation', 'rvn_bok_id', '=', 'book.bok_id')
                                           ->where('bok_title', 'LIKE', '%'. $bok_title . '%')
                                           ->groupBy('bok_isbn')
                                           ->get();

        if(!empty($search_results))
        $search_results = DB::table('book')->join('author', 'atr_bok_id', '=', 'book.bok_id')
                                           ->join('writer', 'wtr_id', '=', 'author.atr_wtr_id')
                                           ->join('language', 'lng_id', '=', 'book.bok_lng_id')
                                           ->join('kind', 'knd_id', '=', 'book.bok_knd_id')
                                           ->leftJoin('reservation', 'rvn_bok_id', '=', 'book.bok_id')
                                           ->where('bok_title', 'LIKE', '%'. $bok_title . '%')
                                           ->groupBy('bok_isbn')
                                           ->paginate(25);

        $languages = Language::orderBy('lng_name')->lists('lng_name');

        $kinds = Kind::orderBy('knd_name')->lists('knd_name');

        if(empty($search_results))
        {
          return Redirect::to('/search')->with('flash_message_danger', 'Niestety nic nie znaleziono... :(');
        }

        return View::make('search.search_results_ex', array('search_results' => $search_results,
                                                           'languages' => $languages,
                                                           'kinds' => $kinds));
    }


    public function postAdvancedSearch()
    {
        $bok_isbn           = Input::get('bok_isbn');
        $bok_title          = Input::get('bok_title');
        $bok_lng            = Input::get('bok_lng');
        $bok_atr_name       = Input::get('bok_atr_name');
        $bok_atr_surname    = Input::get('bok_atr_surname');
        $bok_knd            = Input::get('bok_knd');
        $bok_edition_date   = Input::get('bok_edition_date');
        $bok_edition_number = Input::get('bok_edition_number');

        return Redirect::to('search/results')->withInput();
    }


    public function getAdvancedSearch()
    {

        $bok_isbn           = Form::getValueAttribute('bok_isbn');
        $bok_title          = Form::getValueAttribute('bok_title');
        $bok_lng            = Form::getValueAttribute('bok_lng');
        $bok_atr_name       = Form::getValueAttribute('bok_atr_name');
        $bok_atr_surname    = Form::getValueAttribute('bok_atr_surname');
        $bok_knd            = Form::getValueAttribute('bok_knd');
        $bok_edition_date   = Form::getValueAttribute('bok_edition_date');
        $bok_edition_number = Form::getValueAttribute('bok_edition_number');

        if ($bok_knd == "default")
          $bok_knd = "";

        if ($bok_lng == "default")
          $bok_lng = "";

        // FIXME: DRY !!
        $search_results = DB::table('book')->join('author', 'atr_bok_id', '=', 'book.bok_id')
                                           ->join('writer', 'wtr_id', '=', 'author.atr_wtr_id')
                                           ->join('language', 'lng_id', '=', 'book.bok_lng_id')
                                           ->join('kind', 'knd_id', '=', 'book.bok_knd_id')
                                           ->leftJoin('reservation', 'rvn_bok_id', '=', 'book.bok_id')
                                           ->where('bok_isbn', 'LIKE', '%'. $bok_isbn . '%')
                                           ->where('bok_title', 'LIKE', '%'. $bok_title . '%')
                                           ->where('lng_name', 'LIKE', '%'. $bok_lng . '%')
                                           ->where('wtr_name', 'LIKE', '%'. $bok_atr_name . '%')
                                           ->where('wtr_surname', 'LIKE', '%'. $bok_atr_surname . '%')
                                           ->where('knd_name', 'LIKE', '%'. $bok_knd . '%')
                                           ->where('bok_edition_date', 'LIKE', '%'. $bok_edition_date . '%')
                                           ->where('bok_edition_number', 'LIKE', '%'. $bok_edition_number . '%')
                                           ->groupBy('bok_isbn')
                                           ->get();

        if(!empty($search_results))
        $search_results = DB::table('book')->join('author', 'atr_bok_id', '=', 'book.bok_id')
                                           ->join('writer', 'wtr_id', '=', 'author.atr_wtr_id')
                                           ->join('language', 'lng_id', '=', 'book.bok_lng_id')
                                           ->join('kind', 'knd_id', '=', 'book.bok_knd_id')
                                           ->leftJoin('reservation', 'rvn_bok_id', '=', 'book.bok_id')
                                           ->where('bok_isbn', 'LIKE', '%'. $bok_isbn . '%')
                                           ->where('bok_title', 'LIKE', '%'. $bok_title . '%')
                                           ->where('lng_name', 'LIKE', '%'. $bok_lng . '%')
                                           ->where('wtr_name', 'LIKE', '%'. $bok_atr_name . '%')
                                           ->where('wtr_surname', 'LIKE', '%'. $bok_atr_surname . '%')
                                           ->where('knd_name', 'LIKE', '%'. $bok_knd . '%')
                                           ->where('bok_edition_date', 'LIKE', '%'. $bok_edition_date . '%')
                                           ->where('bok_edition_number', 'LIKE', '%'. $bok_edition_number . '%')
                                           ->groupBy('bok_isbn')
                                           ->paginate(25);

        $languages = Language::orderBy('lng_name')->lists('lng_name');

        $kinds = Kind::orderBy('knd_name')->lists('knd_name');

        if(empty($search_results))
        {
          return Redirect::to('/search')->with('flash_message_danger', 'Niestety nic nie znaleziono... :(');
        }

        return View::make('search.search_results_ex', array('search_results' => $search_results,
                                                           'languages' => $languages,
                                                           'kinds' => $kinds));
    }

}
