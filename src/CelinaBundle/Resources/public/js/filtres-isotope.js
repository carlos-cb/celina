$(document).ready(function(){

		var $container = $('#content');

$container.isotope({

	filter: '*',

	animationOptions: {
     duration: 750,
     easing: 'linear',
     queue: false,
	}

});



$('.filteroptions a').click(function(){
	
  var selector = $(this).attr('data-filter');
    $container.isotope({ 
	filter: selector,
	animationOptions: {
     duration: 750,
     easing: 'linear',
     queue: false,
   }
  });	
  

   var $this = $(this);
      // don't proceed if already selected
      if ( $this.hasClass('active') ) {
        return ;
      }
      
      var $optionSet = $this.parents('.option-set');
      // change selected class
      $optionSet.find('.active').removeClass('active');
      $this.addClass('active');


  return false;

});

});


        