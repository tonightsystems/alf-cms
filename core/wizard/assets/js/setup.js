$(function(){
    $('#btn-setup').on('click', function(e){
        e.preventDefault();
        $('.hero-unit:first').addClass('none');

        $('#steps')
            .removeClass('none')
            .find('#tabs a:first').tab('show');
    });

    $('#tabs a').on('click', function(e) {
      e.preventDefault();
      $(this).tab('show');
    });

    $('#themes input:radio').on('change', function(e){
        var span = $(this).parent().find('span');
        $('#themes').find('span.active').not(span).removeClass('active');
    });
});