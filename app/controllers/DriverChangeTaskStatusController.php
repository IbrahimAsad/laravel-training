<?php

class DriverChangeTaskStatusController extends \BaseController {

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


	private function isValidStatus($status){
		if($status=='NOT STARTED' || $status == 'COMPLETED' || $status == 'IN PROGRESS')
			return true;

		return false;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$driver_id=$id;
		$response=array();
		$response['status']="";
		$response['data']=array();

		if(is_numeric($driver_id)){
			$status=Input::get('status');
			$task_id=Input::get('task_id');
			if($this->isValidStatus($status)==false){
				$response['status']="ERROR";
				$response['message']="Invalid Status";
				return Response::json($response);
			}

			$affected=DB::table('tasks')->
			where('task_id',$task_id)->
			update(
				array('status'=>$status,'last_change'=>date("Y-m-d H:i:s"))
				);


			if($affected==1){
				$response['status']="OK";
			}else{
				$response['status']="NOT_UPDATED";
			}	

		}else{
			$response['status']="ERROR";
			$response['message']="Invalid driver id";
			
		}

		return Response::json($response);


		//
	}

	// private function get


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
