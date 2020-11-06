$(document).ready(function(){

    var $op1= $('.container .row .col-lg-9 #ruta');
    var $op2= $('.container .row .col-lg-9 #hibrida');
    var $op3= $('.container .row .col-lg-9 #urbanas');
    var $op4= $('.container .row .col-lg-9 #plegables');

    
    $('.container .row .col-lg-3 .list-group #op1').on('click',function(evt){
        evt.preventDefault();
        $op1.css({
            'display':'block',
            'display': 'flex',
        });
        $op2.css('display','none');
        $op3.css('display','none');
        $op4.css('display','none');
    });
    $('.container .row .col-lg-3 .list-group #op2').on('click',function(evt){
        evt.preventDefault();
        $op1.css('display','none');
        $op2.css({
            'display':'block',
            'display': 'flex',
        });
        $op3.css('display','none');
        $op4.css('display','none');
    });
    $('.container .row .col-lg-3 .list-group #op3').on('click',function(evt){
        evt.preventDefault();
        $op1.css('display','none');
        $op2.css('display','none');
        $op3.css({
            'display':'block',
            'display': 'flex',
        });
        $op4.css('display','none');
    });
    $('.container .row .col-lg-3 .list-group #op4').on('click',function(evt){
        evt.preventDefault();
        $op1.css('display','none');
        $op2.css('display','none');
        $op3.css('display','none');
        $op4.css({
            'display':'block',
            'display': 'flex',
        });
    });
});