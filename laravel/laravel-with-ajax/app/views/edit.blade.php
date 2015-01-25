  <div class="close">X</div>
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

<script type="text/javascript">
  $('.form[page="edit"]').find('form').submit(function(){
      var form = $(this);
      var action = form.attr('action');
      var method = form.attr('method');
      var formData = form.serialize();
      $.ajax({
        url : action,
        type : method,
        dataType: "json",
        data : formData,
        success : function(data){
          if(data.task_name){
            form.find('p').remove();
            form.prepend('<p style="color:red">'+data.task_name+'</p>');
          } else {
            $.loadData();
            form.parent().hide().empty();
            alert(data.update);
          }
        }
      });
      return false;
  });
</script>
