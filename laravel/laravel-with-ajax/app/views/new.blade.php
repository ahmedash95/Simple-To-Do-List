  <div class="close">X</div>
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

<script type="text/javascript">
  $('.form[page="new"]').find('form').submit(function(){
      var form = $(this);
      var action = form.attr('action');
      var formData = form.serialize();
      $.ajax({
        url : action,
        type : "post",
        dataType: "json",
        data : formData,
        success : function(data){
          if(data.task_name){
            form.find('p').remove();
            form.prepend('<p style="color:red">'+data.task_name+'</p>');
          } else {
            $.loadData();
            form.parent().hide().empty();
            alert(data.save);
          }
        }
      });
      return false;
  });
</script>