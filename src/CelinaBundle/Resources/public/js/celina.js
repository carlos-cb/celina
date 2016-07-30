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
