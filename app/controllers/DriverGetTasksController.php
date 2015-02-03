<?php

class DriverGetTasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $driver_id=Input::get('driver');

		
		// assign_to

		
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
	 *  driver/getTasks/1 https://jsonblob.com/54d0ed7ce4b00003b0ee3e51
	 */
	public function show($id)
	{
		// get the current tasks for the driver .

		if(is_numeric($id)>0){
			$result =DB::table('tasks')->where(
			'assign_to',$id
			)
			->where('status',"!=",'COMPLETED')
			->get();

			// var_dump($result);
			/*
			   public 'task_id' => int 5
      public 'task_title' => string 'sa' (length=2)
      public 'first_name' => string 'asda' (length=4)
      public 'last_name' => string 'sa' (length=2)
      public 'phone' => string 'aa' (length=2)
      public 'longitude' => float -97.096481323242
      public 'latitude' => float 39.276915810296
      public 'address' => string 'Union, KS, USA' (length=14)
      public 'user_id' => int 1
      public 'status' => string 'NOT STARTED' (length=11)
      public 'task_date' => string '2015-02-02 08:15:13' (length=19)
      public 'assign' => int 0
      public 'assign_to' => int 2
			*/

			$response=array();

			$response['tasks_count']=0;
			$response['tasks']=array();
			foreach  ($result as $task){
				$temp=array();
				$temp['task_id']=$task->task_id;
				$temp['task_title']=$task->task_title;
				$temp['name']=$task->first_name." ".$task->last_name;
				$temp['phone']=$task->phone;
				$temp['longitude']=$task->longitude;
				$temp['latitude']=$task->latitude;
				$temp['task_date']=$task->task_date;
				$temp['address']=$task->address;
				$temp['status']=$task->status;
				$temp['notes']=array();
				$note_data=DB::table('tasks_note')->where(
					'task_id',$task->task_id
					)->get();
				//note_id
// task_id
// user_id
// note_text
// note_date

				foreach($note_data as $note){
					$noteTemp['task_id']=$note->task_id;
					$noteTemp['user_id']=$note->user_id;
					$noteTemp['note_text']=$note->note_text;
					$noteTemp['note_date']=$note->note_date;
					$noteTemp['ByAdmin']=$note->isAdmin;
					$temp['notes'][]=$noteTemp;
				}
				$response['tasks'][]=$temp;

			}
			$response['tasks_count']=sizeof($response['tasks']);
			// var_dump($response);
			return Response::json($response);
		}
		else{
			return "$id NOOOT";
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
