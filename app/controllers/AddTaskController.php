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
 
		$latitude=Input::post('latitude');
		$longitude=Input::post('longitude');
		$task_title=Input::post('task_title');
		$address=Input::post('address');
		// $note_text=Input::post('note_text');	
		$phone=Input::post('phone');
		$first_name=Input::post('first_name');
		$last_name=Input::post('last_name');
 

 		$id = DB::table('tasks')->insertGetId(
			array(
				'latitude' => $latitude,
				'longitude' => $longitude,
				'task_title'=>'$task_title',
				'address'=>'$address',
				'assign'=>false,
				'phone'=>'$phone',
				'first_name'=>'$first_name',
				'last_name'=>'$last_name'
				)
			);

 		if($id==null){
 			return "<h1> Query Faild </h1>";
 		}else{
 			return "HEEEEEEEEEE";
 		}

} catch(\Illuminate\Database\QueryException $e){
	return "EEEEEEEEEEEEEERRRR";	

}



		return "<h1>aaa $id</h1>";
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
