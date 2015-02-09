<?php

class AddTaskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		try {

 			// return "<h1> Query Faild-------- </h1>";
		//
		//SELECT * FROM `tasks` WHERE 1
		// $post=POST::all();
		// $result=DB::select('select * from tasks ');
		// return View::make('Tasks.addTask')->with('response',$result);

			$latitude=Input::get('latitude');
			$longitude=Input::get('longitude');
			$task_title=Input::get('task_title');
			$address=Input::get('address');
			$note_text=Input::get('note_text');	
			$phone=Input::get('phone');
			$first_name=Input::get('first_name');
			$last_name=Input::get('last_name');

			$user_id=Session::get('admin_id');

			$dbAarr=array(
				'latitude' => $latitude,
				'longitude' => $longitude,
				'task_title'=>$task_title,
				'address'=>$address,
				'assign'=>false,
				'phone'=>$phone,
				'first_name'=>$first_name,
				'last_name'=>$last_name,
				'task_date'=>date("Y-m-d H:i:s"),
				'status'=>'NOT STARTED',
				'user_id'=>$user_id
				);

			$task_id = DB::table('tasks')->insertGetId(
				$dbAarr
				); 
			$noteData=array(
				'task_id'=>$task_id,
				'note_text'=>$note_text,
				'user_id'=>$user_id,
				'note_date'=>date("Y-m-d H:i:s")
				);
			$note_id=DB::table('tasks_note')->insertGetId($noteData);

			// return "<h2> note id $note_id  .. task id  $task_id  </h2>";
			return 1;


		} catch(\Illuminate\Database\QueryException $e){
			return -1;	

		}


 
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
