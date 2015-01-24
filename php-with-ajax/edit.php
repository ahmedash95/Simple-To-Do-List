<div class="close">X</div>
<form action="edit.php" method="post">
    <div class="head">
        <h1>Edit Task</h1>
    </div>
    <div class="form-body">
    <p class="alert alert-danger" style="display:none"></p>
    <label for="task-name">Enter New Task Name :</label>
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <input type="text" name="task_name" value="">
    </div>
<div class="footer">
<input type="submit" name="edit" value="edit" class="btn btn-default btn-xs">
</div>
</form>
<script>
    
  
    
    $.ajax({
        url : 'code.php?get=<?php echo $_GET['id'] ?>',
        success : function(data){
        $('form').attr('action','edit.php').find('input[name="task_name"]')
                                            .attr('value',data);    
        }
    });
    
    $('form').attr('action','edit.php').submit(function(){
        var attr = $(this);
        var formData = $(this).serialize();
        $.ajax({
            url : "code.php?page=edit",
            type : "post",
            data : formData,
            dataType : "json",
            success : function(data){
                if(data.error){
                    $('.form-body').find('p').empty().show().append(data.error);
                } 
                if (data.success){
                    $('.form-body').find('p')
                            .empty()
                            .removeClass('alert-danger')
                            .addClass('alert-success')
                            .show()
                            .append(data.success);
                    $('.form').fadeOut(2000,function(){
                        $('.form').empty();
                        $.loadData();  
                    });
                }
            }
        });
        return false;
    });

</script>