$(document).ready(function(){

      $('body').on('click','.close',function(){
        $(this).parent('.form').fadeOut();
        $('#overlay').remove();
    });
    
     $('body').on('click','a',function(){
    var element = $(this);
    var attr = $(this).attr('form');
    if (typeof attr !== typeof undefined && attr !== false) {
            $('.form').attr('form',attr).empty();
            $.ajax({
                url : element.attr('href'),
                success : function(data){
                $('.form').attr('form',attr).append(data);
                }
            });
            $('.form').attr('form',attr).fadeIn();
            return false;
        } 
    });

    
$('body').on('click','a',function(){
    var elment = $(this);
    var href = $(this).attr('href');
    var attr = $(this).attr('action');
    
    
    if (typeof attr !== typeof undefined && attr !== false && attr == 'delete') {

if (window.confirm('Do you want to remove this task?'))
{
    $.ajax({
        url : href,
        success : function(data){
            $.loadData();
        }
    });
}
    

        
        
        return false;
}
    
    
    if (typeof attr !== typeof undefined && attr !== false && attr == 'mark') {
        $.ajax({
            url : href,
            success : function(data){
                $.loadData();
            }
        });
        return false;
    }
    
});    

$.loadData = function()
{
    $.ajax({
        url: 'code.php?action=get',
        success : function(data){
            $('.content').find('.body:first').empty().append(data);
        }
    });
}     



});