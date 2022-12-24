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
    $('#find').keyup(function(){
        var txt = $('#find').val();
        // alert(txt);
        $.post('inc/find.php', {data: txt}, function(data){
            $('.list-food').html(data);
            if(txt.lengh!=7){
                // alert('txt.lengh');
            location.hash = "#food";}
        })
    });
    $('.timkiem').keyup(function(){
        var txt = $('.timkiem').val();
        $.post('filter.php', {data: txt}, function(data){
            $('.de-class').html(data);
        });
    });
    
});
