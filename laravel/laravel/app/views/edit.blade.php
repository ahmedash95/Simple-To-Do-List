@extends('layout');
@section('content')
  <div class="head">
      <h1>Edit Task</h1>
  </div>
    {{ Form::open(array('route'=>array('tasks.update',$task->id),'method'=>'put')) }}
  <div class="body">
     @foreach($errors->all() as $error) 
        <p style="color:red">{{ $error }}</p>
     @endforeach
     <label for="task_name">Enter new Task Name :</label>
     <input type="text" name="task_name" value="{{ $task->task_name }}">
  </div>
  <div class="footer">
      <button class="btn btn-default btn-xs">Edit Task</button>
  </div>
   {{ Form::close() }}
@endsection