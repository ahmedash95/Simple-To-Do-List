@extends('layout');
@section('content')
  <div class="head">
      <h1>Create New Task</h1>
  </div>
    {{ Form::open(array('route'=>'tasks.store')) }}
  <div class="body">
     @foreach($errors->all() as $error) 
        <p style="color:red">{{ $error }}</p>
     @endforeach
     <label for="task_name">Enter Task Name :</label>
     <input type="text" name="task_name" value="{{ Input::old('task_name')}}">
  </div>
  <div class="footer">
      <button class="btn btn-default btn-xs">Save Task</button>
  </div>
   {{ Form::close() }}
@endsection