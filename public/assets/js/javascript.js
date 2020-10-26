// menu for mobile show and hide 
$(function(){
    $('#bars,#drawer').click(function(){
        var c = $('#items-mobile').css('left');
        if(c=='0px') 
        { 
            $('body').css('overflow','auto');
            $('#items-mobile').css('left','-100%'); 
            $('#icon-bars').removeClass('fa-times');
            $('#icon-bars').addClass('fa-bars');
            setTimeout(() => {$('#main').css('z-index','1'); $('#items-mobile').css('z-index','0'); }, 700);
        }
        else 
        { 
            $('#main').css('z-index','0'); $('#items-mobile').css('z-index','1'); $('#items-mobile').css('left','0');
            $('body').css('overflow','hidden');
            $('#icon-bars').removeClass('fa-bars');
            $('#icon-bars').addClass('fa-times');

        }
    });
});
