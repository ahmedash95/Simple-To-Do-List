<?php require "header.php" ?>
      <form action="new.php" method="post">
                    <div class="head">
                        <h1>Create New Task</h1>
                    </div>
                    <div class="body">
                      <?php if(isset($error)):  ?>
                          <p class="alert alert-danger"><?= $error ?></p>
                      <?php endif; ?>
                       <label for="task-name">Enter Task Name :</label>
                       <input type="text" name="task_name" value="<?= @$task_name ?>">
                    </div>
                    <div class="footer">
                    <input type="submit" name="save" value="save" class="btn btn-default btn-xs">
                    </div>
     </form>
<?php require "footer.php" ?>