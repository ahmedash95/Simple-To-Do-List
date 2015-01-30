<form action="<?php echo base_url('tasks/update/'.$row['id']) ?>" method="post">
  <div class="head">
      <h1>Create New Task</h1>
  </div>
  <div class="body">
    <?php if(isset($error)):  ?>
        <p class="alert alert-danger"></p>
    <?php endif; ?>
     <label for="task-name">Enter Task Name :</label>
     <input type="text" name="task_name" value="<?php echo $row['task_name'] ?>">
  </div>
  <div class="footer">
  <input type="submit" name="save" value="save" class="btn btn-default btn-xs">
  </div>
 </form>