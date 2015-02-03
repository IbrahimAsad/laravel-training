<?php

class PingDriverLocationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * //driver/pingLocation?driver_id=1&longitude=-26&latitude=25
	 * @return Response
	 */
	public function index()
	{
		//
		$lon=Input::get('longitude');
		$lat=Input::get('latitude');
		$driver_id=Input::get('driver_id');

	// return $lon." ".$lat." ".$driver_id;

		DB::table('driver')->
			where('driver_id',$driver_id)->
			update(array('longitude'=>$lon,'latitude'=>$lat));




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


}
