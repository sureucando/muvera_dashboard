/* Global Variable */
var query;
var flag;

/* Start Of Function */

$(document).ready(function(){
  flag = true;

  /* Loading Screen */
  $('#loading').hide()
    .ajaxStart(function() {
      $(this).show();
    })
    .ajaxStop(function() {
      $(this).hide();
    });

	/* Search Keyword */
	$('.search-keyword-main').click(function(){
		$('.search-keyword-tax').css('display', 'inline-block');
	});

  /* Generate Report */
  $('#btn-generate').click(function(){
    //$('.section-report').show();
    //$('.content-container').animate({height:'2860px'}, 500);
    //$(this).attr('style', 'pointer-events: none;');
    //$(this).addClass('selected');
  });

  $('#report-dl').click(function(){
    var y = $('.content').scrollTop();  //your current y position on the page
    $('#btn-dl-cont').slideToggle();
    if(flag){
      $('.content-container').animate({height:'1800px'}, 'slow');
      $('.section-report').animate({height:'725px'}, 'slow');
      $('.content').animate({scrollTop: y+100}, 'slow');
      flag = false;
    }
    else{
      $('.content-container').animate({height:'1700px'}, 'slow');
      $('.section-report').animate({height:'625px'}, 'slow');
      $('.content').animate({scrollTop: y}, 'slow');
      flag = true; 
    };
  });
});


/* Datepicker */
$(function() {
  $( "#from" ).datepicker({
    defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 1,
    onClose: function( selectedDate ) {
      $( "#to" ).datepicker( "option", "minDate", selectedDate );
    }
  });
  $( "#to" ).datepicker({
    defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 1,
    onClose: function( selectedDate ) {
      $( "#from" ).datepicker( "option", "maxDate", selectedDate );
    }
  });
});