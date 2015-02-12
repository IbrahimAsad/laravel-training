<?php

class AdminDashboarCenterController extends \BaseController {

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

	public function getAllDrivers(){
		$drivers=DB::table('driver')->get();
		$response=array();
		foreach ($drivers as  $driv) {
			$tmp=array();
			$tmp['driver_id']=$driv->driver_id;
			$tmp['driver_name']=$driv->driver_name;
			$tmp['latitude']=$driv->latitude;
			$tmp['longitude']=$driv->longitude;
			$response[]=$tmp;

		}
		return Response::json($response);
	}



	public function assignTask(){
		$task_id=Input::get('task_id');
		$driver_id=Input::get('driver_id');
		$response=array();
		$response['error']=-1;
		$response['message']="";
		// $response['data']="";

		if(is_numeric($task_id) && is_numeric($driver_id)){
			$resp=DB::table('tasks')->
			where('task_id',$task_id)->
			update(array(
					'assign_to'=>$driver_id,
					'assign'=>true
					)
				);

			if($resp==1){
				$response['error']=100;
				$response['message']='Assigned successfully';
			}else{
				$response['error']=300;

				$response['message']='unable to assign Task';

			}

		}else{
			$response['error']=200;
			$response['message']="Invalid Task ID or Driver ID";
			
		}
		return Response::json($response);

	}

	public function getAdmins(){
		$result =DB::table('admin')
			->where('admin_type','!=','SUPER')
		 	->orderBy('admin_id','DESC')
			->get();		

			$response=array();
			$response['admin_count']=0;
			$response['admins']=array();

			foreach ($result as $admin) {
				$tmp=array();
				$tmp['admin_id']=$admin->admin_id;
				$tmp['admin_name']=$admin->admin_name;
				$tmp['tasks']=DB::table('tasks')->where('user_id','=',$admin->admin_id)->count();	
				$response['admin_count']++;
				$response['admins'][]=$tmp;

			}

			return Response::json($response);


	}
	public function getTasks(){
		$admin_id=Session::get('admin_id');

		$result =DB::table('tasks')
			->where('status','!=','COMPLETED')
			->where('user_id','=',$admin_id)
			->orderBy('task_id','DESC')
			->get();
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
				$temp['assign']=$task->assign;
				$temp['assign_to']=$task->assign_to;
				$response['tasks'][]=$temp;
			}
			$response['tasks_count']=sizeof($response['tasks']);
			return Response::json($response);
	}


	public function newDriver(){
		$driver_name=Input::get('driver_name');
		$driver_code=Input::get('driver_code');

		$cryp_driver_code=md5($driver_code);
		$response=array();
		$response['status']=-1;
		$response['message']="";
		$response['data']="";

		if($driver_name>'' && $driver_code >''){
			// DB::table('driver')
			$driver_id = DB::table('driver')->insertGetId(
				array('driver_name' =>$driver_name, 'driver_code' => $cryp_driver_code)
				);

			$response['status']=10;
			$response['message']='Added successfully !';
			$response['data']=array('driver_id'=>$driver_id);
		}else{
			$response['status']=-20;
			$response['message']="Invalid ,Driver Name or code is empty .. ";
		}

		return Response::json($response);



	}

	public function newAdmin(){
		$response=array();
		$response['status']=-1;
		$response['message']="";
		$response['data']="";

		$admin_name=Input::get('admin_name');
		$admin_code=Input::get('admin_code');
		$cryp_admin_code=md5($admin_code);
		if($admin_name>'' && $admin_code >'' && strlen($admin_code) >=5 ){
		 
			$admin_id= DB::table('admin')->insertGetId(array('admin_name'=> $admin_name , 'code'=>$cryp_admin_code,'admin_type'=>'USER'));

		
			$response['status']=10;
			$response['message']='Added successfully !';
			$response['data']=array('admin_id'=>$admin_id);
		}else{
			$response['status']=-20;
			$response['message']="Invalid admin name or admin code less than 5 characters";
		}

		return Response::json($response);

	}

	public function getHistoryTasks(){
		$admin_id=Session::get('admin_id');

		$result =DB::table('tasks')
			->where('user_id','=',$admin_id)
			->orderBy('task_id','DESC')
			->get();
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
				$temp['assign']=$task->assign;
				$temp['assign_to']=$task->assign_to;
				$temp['driver_name']="";
				if($task->assign_to >0){
					$driver=DB::table('driver')->
						where('driver_id','=',$task->assign_to)
						->get();
					if(sizeof($driver)==1)
						$temp['driver_name']=$driver[0]->driver_name;
				}

				$response['tasks'][]=$temp;
			}
			$response['tasks_count']=sizeof($response['tasks']);
			return Response::json($response);
	}

}



