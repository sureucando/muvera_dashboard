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

function validateForm() {
  var main_word = document.forms["search-form"]["main-word"].value;
  var date_from = document.forms["search-form"]["date-from"].value;
  var date_to = document.forms["search-form"]["date-to"].value;
  if (main_word == null || main_word == "" ) {
    alert("Search query must be filled out");
    return false;
  }
  if (date_from == null || date_from == "" ) {
    alert("Start date must be filled out");
    return false;
  }
  if (date_to == null || date_to == "" ) {
    alert("End date must be filled out");
    return false;
  }
  if ($("input[type=checkbox]:checked").length === 0) {
    alert("At least one media must be chosen");
    return false;
  }
  return true;
}



function downloadPDF(){
  var svgChart = new XMLSerializer().serializeToString(document.getElementById('ResultChart'));
  var svgLeged = new XMLSerializer().serializeToString(document.getElementById('ResultLegend'));
  var canvas = document.getElementById("canvas");
  var ctx = canvas.getContext("2d");
  var DOMURL = self.URL || self.webkitURL || self;
  var imgChart = new Image();
  var imgLegend = new Image();
  var svgCh = new Blob([svgChart], {type: "image/svg+xml;charset=utf-8"});
  var svgLg = new Blob([svgLeged], {type: "image/svg+xml;charset=utf-8"});
  var urlChart = DOMURL.createObjectURL(svgCh);
  var urlLegend = DOMURL.createObjectURL(svgLg);
  var count = 2;
  imgChart.onload = imgLegend.onload = function() {
    count --;
    if (count === 0) drawPDF(ctx, imgChart, imgLegend, canvas, DOMURL);
  };
  imgChart.src = urlChart;
  imgLegend.src = urlLegend;
}

function downloadPNG(){
  //return xepOnline.Formatter.Format('pie_chart_visualisation',{srctype:'svg', mimeType:'image/png', render:'download'});
  //saveSvgAsPng(document.getElementById("pie_chart_visualisation"), "diagram.png");
  var svgChart = new XMLSerializer().serializeToString(document.getElementById('ResultChart'));
  var svgLeged = new XMLSerializer().serializeToString(document.getElementById('ResultLegend'));
  var canvas = document.getElementById("canvas");
  var ctx = canvas.getContext("2d");
  var DOMURL = self.URL || self.webkitURL || self;
  var imgChart = new Image();
  var imgLegend = new Image();
  var svgCh = new Blob([svgChart], {type: "image/svg+xml;charset=utf-8"});
  var svgLg = new Blob([svgLeged], {type: "image/svg+xml;charset=utf-8"});
  var urlChart = DOMURL.createObjectURL(svgCh);
  var urlLegend = DOMURL.createObjectURL(svgLg);
  var count = 2;
  imgChart.onload = imgLegend.onload = function() {
    count --;
    if (count === 0) drawImages(ctx, imgChart, imgLegend, canvas, DOMURL);
  };
  imgChart.src = urlChart;
  imgLegend.src = urlLegend;
}

function drawImages(ctx, img1, img2,canvas, DOMURL){
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.drawImage(img1, 0, 0,500,300);
  ctx.drawImage(img2, 500, 0);
  var png = canvas.toDataURL("image/png");
  document.querySelector('#pngdataurl').innerHTML = '<img src="'+png+'"/>';
  DOMURL.revokeObjectURL(png);
  var a = document.createElement("a");
  a.download = "sample.png";
  a.href = png;
  document.body.appendChild(a);
  a.click();
}

function drawPDF(ctx, img1, img2,canvas, DOMURL){
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.drawImage(img1, parseInt(0), parseInt(0),img1.width,img1.height);
  ctx.drawImage(img2, parseInt(img1.width), 0);
  var img = canvas.toDataURL("image/png");
  var pdf = new jsPDF();
  pdf.addImage(img, 'PNG', 10, 10);
  pdf.save("download.pdf");
}



function showPieChart(data) {
  d3.select("#pie_chart_visualisation").selectAll("svg").remove(); //remove all svg element
  var width = 600,
  height = 350,
  radius = Math.min(width, height) / 2;

  var color = d3.scale.ordinal()
  .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b"]);

  var arc = d3.svg.arc()
  .outerRadius(radius - 10)
  .innerRadius(0);

  var labelArc = d3.svg.arc()
  .outerRadius(radius - 40)
  .innerRadius(radius - 40);

  var pie = d3.layout.pie()
  .sort(null)
  .value(function(d) { return d.total; });

  var svg = d3.select("#pie_chart_visualisation").append("svg")
  .attr("width", width)
  .attr("height", height)
  .attr("id", 'ResultChart')
  .append("g")
  .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

  var g = svg.selectAll(".arc")
  .data(pie(data))
  .enter().append("g")
  .attr("class", "arc");

  g.append("path")
  .attr("d", arc)
  .style("fill", function(d) { return color(d.data.tablename); });

  g.append("text")
  .attr("transform", function(d) { return "translate(" + labelArc.centroid(d) + ")"; })
  .attr("dy", ".35em")
  .text(function(d) { return d.data.tablename; });

  var legend = d3.select("#pie_chart_visualisation").append("svg")
  .attr("class", "legend")
  .attr("width", radius * 2)
  .attr("height", radius * 1.2)
  .attr("id", 'ResultLegend')
  .selectAll("g")
  .data(color.domain().slice().reverse())
  .enter().append("g")
  .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });

  legend.append("rect")
  .attr("width", 18)
  .attr("height", 18)
  .style("fill", color);

  legend.append("text")
  .attr("x", 24)
  .attr("y", 9)
  .attr("dy", ".35em")
  .text(function(d) {return d});
}

function type(d) {
  d.Frequent = +d.Frequent;
  return d;
}