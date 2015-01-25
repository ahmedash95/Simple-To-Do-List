<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple To Do List @if(isset($title)) {{ ' - '.$title }} @endif</title>
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/font-awesome.css')  }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::script('js/jquery-1.7.2.min.js')}}
    {{ HTML::script('js/code.js')}}
</head>
<body>
            <div class="container">
                <div class="content">
                @yield('content')
                </div>
            </div>
<script type="text/javascript">
    $.loadData = function()
{
    $.ajax({
        url: "{{ URL::to('get/data') }}",
        success : function(data){
            $('.content').find('.body:first').empty().append(data);
        }
    });
}     
</script>
</body>
</html>