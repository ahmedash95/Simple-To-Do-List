<?php require "header.php" ?>
      <form action="delete.php" method="post">
                    <div class="head">
                        <h1>Delete Task</h1>
                    </div>
                    <div class="body">
                    <input type="hidden" name="id" value="<?= $data->id ?>">
                    <p>Are you sure you want to delete the task</p>
                    <span class="label label-danger"><?= $data->task_name ?></span>
                    </div>
                    <div class="footer">
                    <input type="submit" name="delete" value="DELETE" class="btn btn-danger btn-xs">
                    <a href="index.php" class="btn btn-default btn-xs">Back</a>
                    </div>
     </form>
<?php require "footer.php" ?>