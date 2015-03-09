jQuery(document).ready(function($){
  // Hide the answers using jQuery
  $('.nav-content').hide();
  
  // If you want the first one to show as a visual hint to the user, uncomment the next line
  //  $('.faq-block:first-of-type .answer').show();
  
  $('.nav-title').click( function() {
    // if you want to have all others close when you click to open an item, uncomment the next line
    // $('.answer').hide();
    
    $(this).next().animate({
      
      // The combo of height and opacity gives a nice open-and-fade effect
      height: 'toggle',
      opacity: 'toggle',
  
    });
  });
  
});

jQuery(document).ready(function($){
  $('.bxslider').bxSlider({
    slideWidth: 600,
    minSlides: 1,
    maxSlides: 2,
    moveSlides: 1,
    slideMargin: 0,
    infiniteLoop: false
  });
});