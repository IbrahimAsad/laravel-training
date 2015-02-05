<?php

class AdminGetTasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$result =DB::table('tasks')->get();
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
				$response['tasks'][]=$temp;
			}
			$response['tasks_count']=sizeof($response['tasks']);
			return Response::json($response);

	}

	public function Hello(){
		return "HELLLO";
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
