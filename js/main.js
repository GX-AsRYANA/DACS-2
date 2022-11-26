$(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('open');
        $(this).toggleClass('fa-eye fa-eye-slash');
        if($(this).hasClass('open')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');
        }
    });
    $('#eye1').click(function(){
        $(this).toggleClass('open');
        $(this).toggleClass('fa-eye fa-eye-slash');
        if($(this).hasClass('open')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');
        }
    });

});