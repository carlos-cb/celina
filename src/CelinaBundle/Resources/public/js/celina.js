$(function(){
    $(".form-control").keyup(function(){
        $("table tbody tr")
            .hide()
            .filter(":contains('"+( $(this).val() )+"')")
            .show();
    }).keyup();
})

$(document).ready(function() {

    /* This is basic - uses default settings */
    $("#single_4").fancybox({
        helpers : {
            title : {
                type : 'over'
            }
        }
    });

    /* Using custom settings */

    $("a#inline").fancybox({
        helpers : {
            overlay : {
                css : {
                    'background' : 'rgba(40, 33, 27, 0.3)'
                }
            }
        },
        'hideOnContentClick': true
    });

    /* Apply fancybox to multiple items */

    $("a.group").fancybox({
        'transitionIn'	:	'elastic',
        'transitionOut'	:	'elastic',
        'speedIn'		:	600,
        'speedOut'		:	200,
        'overlayShow'	:	false
    });

});

window.onload = function(){
    function box(){
        var yifu1 = document.getElementById('zhanshi1');
        var yifu2 = document.getElementById('zhanshi2');
        var yifu3 = document.getElementById('zhanshi3');
        var yifu4 = document.getElementById('zhanshi4');
        var L1 = yifu1.offsetWidth;
        var H1 = yifu1.offsetHeight;

        var ww = document.documentElement.clientWidth*0.37;
        var hh = ww*1.42;
        yifu1.style.width = ww+'px';
        yifu1.style.height = hh+'px';
        yifu2.style.width = ww+'px';
        yifu2.style.height = hh+'px';
        yifu3.style.width = ww+'px';
        yifu3.style.height = hh+'px';
        yifu4.style.width = ww+'px';
        yifu4.style.height = hh+'px';
    }
    box();
    window.onresize = function(){
        box();
    }
};
