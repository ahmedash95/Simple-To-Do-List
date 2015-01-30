<div class="head">
    <h1>Simple To Do List</h1>
    <span>CodeIgniter</span>
    <br>
    <a href="<?php echo base_url('tasks/create'); ?>" class="btn btn-default btn-xs">
    <i class="fa fa-plus"></i>
    New Task
    </a>
</div>
<div class="body">
<ul>
<?php foreach ($data as $row) : ?>
   <li class="<?php if($row->state == 1) { echo 'done'; } ?>">
   <?php echo $row->task_name; ?>
    <span>
    <a href="<?php echo base_url('tasks/done/'.$row->id); ?>"  class="fa fa-check" title="done"></a>
    <a href="<?php echo base_url('tasks/edit/'.$row->id); ?>"  class="fa fa-pencil-square-o" title="edit"></a>
    <a href="<?php echo base_url('tasks/delete/'.$row->id); ?>"  class="fa fa-trash" title="delete"></a>
    </span>
    </li>
<?php endforeach; ?>
</ul>
</div>