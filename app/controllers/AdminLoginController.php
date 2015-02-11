<?php

class AdminLoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{ 
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
		$user_id=Input::get('user_id');
		$user_code=Input::get('user_code');
		$response=array();
		$response['status']=-1;
		$response['message']="";
		if(is_numeric($user_id)){
			$admin=DB::table('admin')->
				where(
					array(
					'admin_id'=>$user_id,
					'code'=>md5($user_code))
					)->
				get();
				// var_dump($admin);
				$response['status']=10;
				$response['message']="Welcome , ".$admin[0]->admin_name;
				Session::put('admin_id',$user_id);
				Session::put('admin_name',$admin[0]->admin_name);
				Session::put('admin_type',$admin[0]->admin_type);

		}else{
			$response['status']=-1;
			$response['message']="Wrong Admin ID or Code ";
		}

		return Response::json($response);

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
