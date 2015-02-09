<ul>
<?php foreach ($data as $row) : ?>
<li class="<?php if($row->state == 1) { echo 'done'; } ?>">
<?php echo $row->task_name; ?>
<span>
<?php if($row->state != 1): ?>
<a href="<?php echo base_url('tasks/done/'.$row->id);  ?>"  class="fa fa-check" title="done"></a>
<?php endif; ?>
<a href="<?php echo base_url('tasks/edit/'.$row->id); ?>" form="edit" class="fa fa-pencil-square-o" title="edit"></a>
<form action="<?php echo base_url('tasks/delete/'.$row->id); ?>" method="post" style="display:inline-block">
<button style="border:none; color:#337ab7; background-color:#fff" class="fa fa-trash" title="delete"></button>
</form>
</span>
</li>
<?php endforeach; ?>
</ul>