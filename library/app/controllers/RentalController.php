<?php

class RentalController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getRent()
	{
		return View::make('for_testing_purposes.rent');
	}


	public function postRent()//($rtl_bok_id, $rtl_usr_id)
	{
		$rental = new Rental;

		$rental->rtl_bok_id = Input::get('rtl_bok_id');
		$rental->rtl_usr_id = Input::get('rtl_usr_id');

		// $rental->rtl_bok_id = $rtl_bok_id;
		// $rental->rtl_usr_id = $rtl_usr_id;
		$rental->rtl_start_date = new DateTime('today');
		$rental->rtl_end_date = new DateTime('today');
		$rental->rtl_end_date->modify('+14 day');

		$rental->save();
        // return Redirect::intended('/')->with('flash_message1', 'Ksiązką została wypożyczona.');
        return "saved";

	}


}
