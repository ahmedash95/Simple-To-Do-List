<?php require "header.php" ?>
      <form action="edit.php" method="post">
                    <div class="head">
                        <h1>Edit Task</h1>
                    </div>
                    <div class="body">
                      <?php if(isset($_SESSION['error'])):  ?>                         
                          <p class="alert alert-danger"><?= $_SESSION['error']; ?></p>
                      <?php endif; ?>
                       <label for="task-name">Enter New Task Name :</label>
                       <input type="hidden" name="id" value="<?= $data->id ?>">
                       <input type="text" name="task_name" value="<?= $data->task_name ?>">
                    </div>
                    <div class="footer">
                    <a href="index.php" class="btn btn-default btn-xs">Back</a>
                    <input type="submit" name="edit" value="edit" class="btn btn-default btn-xs">
                    
                    </div>
     </form>
<?php require "footer.php" ?>