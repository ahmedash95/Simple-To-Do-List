<?php

class tasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks = Tasks::orderBy('id','DECS')->get();
		return View::make('index')
				->with('tasks',$tasks);
	}

	public function getData(){
		$tasks = Tasks::orderBy('id','DECS')->get();
		return View::make('data')
				->with('tasks',$tasks);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('new')->with('title','Create new task');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array( 'task_name'=>'required|min:3' );
		$v = Validator::make(Input::all(),$rules);
		if ($v->fails())
			return Response::json($v->getMessageBag()->toArray());

		$task = new Tasks();
		$task->task_name = Input::get('task_name');
		$task->save();
	
		return Response::json(['save'=>'Added Successfully']);
		 
	}


	/**
	 * Mark the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function done($id)
	{
		$task = Tasks::find($id);
		$task->state = 1;
		$task->save();
		return Redirect::to('tasks');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$task = Tasks::find($id);
		return View::make('edit')->with('task',$task);		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array( 'task_name'=>'required|min:3' );
		$v = Validator::make(Input::all(),$rules);
		if ($v->fails())
			return Response::json($v->getMessageBag()->toArray());

		$task = Tasks::find($id);
		$task->task_name = Input::get('task_name');
		$task->save();
	
		return Response::json(['update'=>'Updated Successfully']);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$task = Tasks::find($id);
		$task->delete();
		Session::flash('delete','Task Deleted');
		return Redirect::to('tasks');
	}


}
