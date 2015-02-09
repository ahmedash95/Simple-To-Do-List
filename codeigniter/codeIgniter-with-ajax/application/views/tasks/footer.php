</div>
            </div>

<script type="text/javascript">
    $.loadData = function()
{
    $.ajax({
        url: "<?php echo base_url('tasks/getdata'); ?>",
        success : function(data){
            $('.content:first').find('.body:first').empty().append(data);
        }
    });
}     
</script>
</body>
</html>