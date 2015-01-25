$(document).ready(function(){

      $('body').on('click','.close',function(){
        $(this).parent('.form').fadeOut();
        $('#overlay').remove();
    });
    
     $('body').on('click','a',function(){
    var element = $(this);
    var attr = $(this).attr('form');
    if (typeof attr !== typeof undefined && attr !== false) {
            $('.form[page="'+attr+'"]').empty();
            $.ajax({
                url : element.attr('href'),
                success : function(data){

                $('.form[page="'+attr+'"]').append(data);
                }
            });
            $('.form[page="'+attr+'"]').fadeIn();
            return false;
        } 
    });

    
$('.body').find('form').find('button').on('click',function(){
    var elment = $(this);
    var url = elment.parent().attr('action');
    var method = elment.parent().attr('method');
if (window.confirm('Do you want to remove this task?'))
{
    $.ajax({
        url : url,
        type : "post",
        data: {_method: 'delete'},
        success : function(data){
            alert('Task Deleted');
            elment.parents().eq(2).remove();
        }
    });
}
        return false;

});    

  
    
    $('.body').on('click','a[title="done"]',function(){
        var href = $(this).attr('href');
        $.ajax({
            url : href,
            success : function(data){
                $.loadData();
            }
        });
        return false;
    });
    


});