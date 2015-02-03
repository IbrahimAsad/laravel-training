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
		// return "sadd$id";

		$lon=Input::get('longitude');
		$lat=Input::get('latitude');
		// $driver_id=Input::get('driver_id');

		// return $lon." ".$lat." ".$id;
		$response=array();
		$response['status']="error";


		if(is_numeric($lon) && is_numeric($lat) && is_numeric($id)){
			$affected=DB::table('driver')->
			where('driver_id',$id)->
			update(array('longitude'=>$lon,'latitude'=>$lat));


			if($affected==1){
				$response['status']="OK";
			}else{
				$response['status']="NO_CHANGE";
			}	
		}

		return Response::json($response);
		
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
		return "string $id";
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
