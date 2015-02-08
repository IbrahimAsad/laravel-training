<?php

class DriverLoginController extends \BaseController {

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
	 * @param  int  $id/?code=
	 * @return Response
	 * driver/login/1?code=1991 {"status":"OK","data":{"driver_id":1,"driver_name":"Ibrahim Asad"}}
	 * driver/login/1?code=199133  {"status":"UNABLE_TO_LOG","data":[]}
	 * driver/login/1a?code=1991 {"status":"ERROR","data":[]}
	 */
	public function show($id)
	{
		
		$response=array();
		$response['status']='OK';
		$response['data']=array();
		if(is_numeric($id)){
			$code=Input::get('code');
			$code=md5($code);
			$driver=DB::table('driver')->
			where([
				'driver_id'=>$id,
				'driver_code'=>$code
				])
			->get();
			if(sizeof($driver)==1){
				// var_dump($driver[0]);
				$response['data']['driver_id']=$driver[0]->driver_id;
				$response['data']['driver_name']=$driver[0]->driver_name; 
			}else{
				$response['status']="UNABLE_TO_LOG";
			}
		
		}else{
			$response['status']="ERROR";
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
