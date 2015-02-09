<div class="close">X</div>
<form action="<?php echo base_url('tasks/save') ?>" method="post">
    <div class="head">
        <h1>Create New Task</h1>
    </div>
    <div class="body">
        <p class="alert alert-danger" style="display:none"></p>
        <label for="task-name">Enter Task Name :</label>
        <input type="text" name="task_name">
    </div>
    <div class="footer">
        <input type="submit" name="save" value="save" class="btn btn-default btn-xs">
    </div>
</form>
<script> 
    
    $('form').attr('action','<?php echo base_url("tasks/save") ?>').submit(function(){
        var attr = $(this);
        var formData = $(this).serialize();
        $.ajax({
            url : "<?php echo base_url('tasks/save') ?>",
            type : "post",
            data : formData,
            dataType : "json",
            success : function(data){
                if(data.error){
                    $('.body').find('p').empty().show().append(data.error);
                } 
                if (data.success){   
                    $('.body').find('p')
                            .empty()
                            .removeClass('alert-danger')
                            .addClass('alert-success')
                            .show()
                            .append(data.success);
                     $('.form').fadeOut(1000,function(){
                        $(this).empty();
                         $.loadData();  

                    });
                }
            }
        });
        return false;
    });
</script>
