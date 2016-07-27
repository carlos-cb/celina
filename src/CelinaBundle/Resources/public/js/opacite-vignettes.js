	$(document).ready(function () {

		$('#content .box').hover(function () {
        
				//set the opacity of all siblings
				
				$(this).siblings().css({'opacity': '0.3'});	
				
				
				//set the opacity of current item to full, and add the effect class
				
				$(this).css({'opacity': '1.0'});
			});
		
		
        
		$('#content').mouseleave(function () {
			
			//reset all the opacity to full
			
			$(this).children().fadeTo("fast", 1.0);	
		});     
	});