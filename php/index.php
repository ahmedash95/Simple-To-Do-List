<?php require "header.php" ?>
<div class="head">
    <h1>Simple To Do List</h1>
    <span>PHP</span>
    <br>
    <a href="new.php" class="btn btn-default btn-xs">
    <i class="fa fa-plus"></i>
    New Task
    </a>
</div>
<div class="body">
<ul>
   <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)): ?>
    <li class="<?php echo  $row->state == 1 ? 'done' : ''; ?>">
    <?= $row->task_name ?>
    <span>
    <?php if($row->state == 0) : ?>
    <a href="?id=<?= $row->id ?>&mark=done"  class="fa fa-check" title="done"></a>
    <?php  endif; ?>
    <a href="edit.php?id=<?= $row->id ?>"  class="fa fa-pencil-square-o" title="edit"></a>
    <a href="delete.php?id=<?= $row->id ?>"  class="fa fa-trash" title="delete"></a>
    </span>
    </li>
    <?php endwhile; ?>
</ul>
</div>
<?php require "footer.php" ?>