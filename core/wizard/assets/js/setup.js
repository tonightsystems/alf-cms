$(function(){
    $('#themes input:radio').on('change', function(e){
        var span = $(this).parent().find('span');
        $('#themes').find('span.active').not(span).removeClass('active');
    });
});