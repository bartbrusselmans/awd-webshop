/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
	$(window).bind('scroll',function(e){
   		parallaxScroll();
   	});
 
   	function parallaxScroll(){
   		var scrolledY = $(window).scrollTop();
		$('#banner-container').css('top','-'+((scrolledY*0.5))+'px');
		
   	}

$('.thumbnail').click(function(){
  $('#largeImage').fadeIn();
});


});

function changeImage(source){
  document.getElementById('largeImage').src = source;

}

function updateSpinner(button){
    var spinner = document.getElementById("spinner");
    var value = parseInt(spinner.value);
    
    if(button.id === "min") {
        value--;
    } else {
        value++;
    }
    
    spinner.value = value;
            
    if(spinner.value < 1) {
        spinner.value = 1;
    }
}



