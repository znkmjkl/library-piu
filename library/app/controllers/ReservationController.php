<?php

class ReservationController extends \BaseController {

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

	public function isAvailable($bok_id) // id or isbn?
	{
        $reservation = DB::table('reservation')->where('rvn_bok_id', $bok_id)
								  		 	   ->first();

		return $reservation->rvn_status;

	}


	public function setAvailable($bok_id) // id or isbn?
	{
		DB::table('reservation')->where('rvn_bok_id', $bok_id)
		            	  		->update(array('rvn_status' => 1));

	}


	public function setReserved($bok_id) // id or isbn?
	{
		DB::table('reservation')->where('rvn_bok_id', $bok_id)
		            	  		->update(array('rvn_status' => 0));

	}

}
