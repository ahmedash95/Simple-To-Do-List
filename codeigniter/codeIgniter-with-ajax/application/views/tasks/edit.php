<div class="close">X</div>
<form action="<?php echo base_url('tasks/update/'.$this->uri->segment(3)); ?>" method="post">
    <div class="head">
        <h1>Edit Task</h1>
    </div>
    <div class="form-body">
    <p class="alert alert-danger" style="display:none"></p>
    <label for="task-name">Enter New Task Name :</label>
    <input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
    <input type="text" name="task_name" value="">
    </div>
<div class="footer">
<input type="submit" name="edit" value="edit" class="btn btn-default btn-xs">
</div>
</form>
<script>
    
  
    
    $.ajax({
        url : '<?php echo base_url("tasks/find/".$this->uri->segment(3)); ?>',
        success : function(data){
        $('form').find('input[name="task_name"]')
                                            .attr('value',data);    
        }
    });
    
    $('form').submit(function(){
        var attr = $(this);
        var formData = $(this).serialize();
        $.ajax({
            url : attr.attr('action'),
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