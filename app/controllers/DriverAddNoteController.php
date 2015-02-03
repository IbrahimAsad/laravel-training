<?php

class DriverAddNoteController extends \BaseController {

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
	 * driver/addNote/1?note=Helllo&task_id=5 {"status":"OK","data":{"note_id":5,"note_date":"2015-02-03 12:16:20"},"message":"SUCCESS"}
	 * driver/addNote/1?note=Helllo&task_id=a5  {"status":"ERROR","data":[],"message":"Task id NOT vaild"}
	 * driver/addNote/1a?note=Helllo&task_id=2	{"status":"ERROR","data":[],"message":"Driver id NOT vaild"}
	 * 
	 */
	public function show($id)
	{
		//
		$driver_id=$id;

		$response=array();
		$response['status']='';
		$response['data']=array();;

		if(is_numeric($driver_id)){

			$note=Input::get('note');
			$task_id=Input::get('task_id');
			if(!is_numeric($task_id)){
				$response['status']='ERROR';
				$response['message']='Task id NOT vaild';
				return Response::json($response);
			}
			$note_date=date("Y-m-d H:i:s");
			$note_id=DB::table('tasks_note')
				->insertGetId(
					array(
					'task_id'=>$task_id,
					'note_text'=>$note,
					'note_date'=>$note_date,
					'user_id'=>$driver_id
					)
				);
			$response['data']['note_id']=$note_id;
			$response['data']['note_date']=$note_date;
			$response['status']="OK";
			$response['message']="SUCCESS";
			return Response::json($response);

		}else{
			$response['status']='ERROR';
			$response['message']='Driver id NOT vaild';
			return Response::json($response);
		}

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
