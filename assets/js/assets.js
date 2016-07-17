/* Global Variable */
var query;
var flagdl, flagsh;

/* Start Of Function */

$(document).ready(function(){
  flagdl = true;
  flagsh = true;

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

  /*Download Button*/
  $('#report-dl').click(function(){
    var y = $('.content').scrollTop();  //your current y position on the page
    var cch = $('.content-container').height();
    var srh = $('.section-report').height();
    $('#btn-dl-cont').slideToggle();
    if(flagdl){
      $('.content-container').animate({height: cch+100}, 'slow');
      $('.section-report').animate({height: srh+100}, 'slow');
      $('.content').animate({scrollTop: y+100}, 'slow');
      flagdl = false;
    }
    else{
      $('.content-container').animate({height: cch-100}, 'slow');
      $('.section-report').animate({height: srh-100}, 'slow');
      $('.content').animate({scrollTop: y}, 'slow');
      flagdl = true; 
    };
  });

  $('#report-sh').click(function(){
    var y = $('.content').scrollTop();  //your current y position on the page
    var cch = $('.content-container').height();
    var srh = $('.section-report').height();
    $('#share-cont').slideToggle();
    if(flagsh){
      $('.content-container').animate({height: cch+200}, 'slow');
      $('.section-report').animate({height: srh+200}, 'slow');
      $('.content').animate({scrollTop: y+200}, 'slow');
      flagsh = false;
    }
    else{
      $('.content-container').animate({height: cch-200}, 'slow');
      $('.section-report').animate({height: srh-200}, 'slow');
      $('.content').animate({scrollTop: y}, 'slow');
      flagsh = true; 
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