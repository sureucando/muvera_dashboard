/* Global Variable */
var query;
var content;
var content1;
var content2;
var detik;

/* Start Of Function */

$(document).ready(function(){

	/* Search Keyword */
	$('.search-keyword-main').click(function(){
		$('.search-keyword-tax').css('display', 'inline-block');
	});

  /* Show Media */
  $('input.to-time').click(function () {
    $('.content-container').animate({height:'1095px'}, 500);
    $('#search-form').animate({height:'1095px'}, 500);
    $('.section-choice').show();

    /* Generate Report */
    $('#btn-generate').click(function(){
      $('#search-form').submit();
      $('.section-report').show();
      $('.content-container').animate({height:'2860px'}, 500);
      $(this).attr('style', 'pointer-events: none;');
      $(this).addClass('selected');
    });
  });
});

/* Search Form */
  $("#search-form").submit(function() {

    var url = "media_online/search_word"; // the script where you handle the form input.

    $.ajax({
        type: "POST",
        url: url,
        data: $("#search-form").serialize(), // serializes the form's elements.
        success: function(data) {
             // 'data' is the response from the php script.
             // Update <div id="change"> here.
        }
    });
    return false; // avoid to execute the actual submit of the form. (This stops the URL changing).
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