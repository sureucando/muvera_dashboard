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

  /* Initialize Datepicker */
  $('.datepicker').datepicker({
    showAnim: "fadeIn",
    showOtherMonths: true,
    selectOtherMonths: true,
    changeMonth: true,
    changeYear: true
    });

  /* Search Keyword */
  $('.search-keyword-main').click(function(){
    $('.search-keyword-tax').css('display', 'inline-block');
  });
  /*$('.tax1').click(function(){
    $('.tax2').css('display', 'inline-block');
  });
  $('.tax2').click(function(){
    $('.tax3').css('display', 'inline-block');
  });
  $('.tax3').click(function(){
    $('.tax4').css('display', 'inline-block');
  });

  $('.search-keyword-main').hover(function(){
    $('.tax1').css('display', 'inline-block');
  }), function(){
    $('.tax1').css('display', 'none');
  };
  $('.tax1').hover(function(){
    $('.tax2').css('display', 'inline-block');
  });
  $('.tax2').hover(function(){
    $('.tax3').css('display', 'inline-block');
  });
  $('.tax3').hover(function(){
    $('.tax4').css('display', 'inline-block');
  });*/

  /* Generate Report */
  /*$('#btn-generate').click(function(){
    //$('.section-report').show();
    //$('.content-container').animate({height:'2860px'}, 500);
    //$(this).attr('style', 'pointer-events: none;');
    //$(this).addClass('selected');
  });*/

  /*Download Button*/
  $('#report-dl').click(function(){
    var y = $('.content').scrollTop();  //your current y position on the page
    var cch = $('.content-container').height();
    var srh = $('.section-report').height();
    $('#btn-dl-cont').slideToggle();
    if(flagdl){
      $('.content-container').animate({height: cch+150}, 'slow');
      $('.section-report').animate({height: srh+150}, 'slow');
      $('.content').animate({scrollTop: y+150}, 'slow');
      flagdl = false;
    }
    else{
      $('.content-container').animate({height: cch-150}, 'slow');
      $('.section-report').animate({height: srh-150}, 'slow');
      $('.content').animate({scrollTop: y-150}, 'slow');
      flagdl = true; 
    };
  });

  $('#report-sh').click(function(){
    var y = $('.content').scrollTop();  //your current y position on the page
    var cch = $('.content-container').height();
    var srh = $('.section-report').height();
    $('#share-cont').slideToggle();
    if(flagsh){
      $('.content-container').animate({height: cch+225}, 'slow');
      $('.section-report').animate({height: srh+225}, 'slow');
      $('.content').animate({scrollTop: y+225}, 'slow');
      flagsh = false;
    }
    else{
      $('.content-container').animate({height: cch-225}, 'slow');
      $('.section-report').animate({height: srh-225}, 'slow');
      $('.content').animate({scrollTop: y-225}, 'slow');
      flagsh = true; 
    };
  });
});


/* Datepicker */
/*$(function() {
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
});*/

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

function showBarChart(data){
  d3.select("#pie_chart_visualisation").selectAll("svg").remove(); //remove all svg element
  var margin = {top: 50, right: 20, bottom: 50, left: 40},
  width = 900 - margin.left - margin.right,
  height = 350 - margin.top - margin.bottom;

  var formatPercent = d3.format(".0%");

  var x = d3.scale.ordinal()
  .rangeRoundBands([0, width], .1, 1);

  var y = d3.scale.linear()
  .range([height, 0]);

  var xAxis = d3.svg.axis()
  .scale(x)
  .orient("bottom")

  var yAxis = d3.svg.axis()
  .scale(y)
  .orient("left")
  //.tickFormat(formatPercent);

  var svg = d3.select("#pie_chart_visualisation").append("svg")
  .attr("width", width + margin.left + margin.right)
  .attr("height", height + margin.top + margin.bottom)
  .attr("id", 'ResultChart')
  .append("g")
  .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

  // Define the div for the tooltip
  var div = d3.select("#pie_chart_visualisation").append("div") 
  .attr("class", "tooltip")
  .attr("id", "tooltip-barchart")
  .style("opacity", 0);


  data.forEach(function(d) {
    d.total = +d.total;
  });

  x.domain(data.map(function(d) { return d.tablename; }));
  y.domain([0, d3.max(data, function(d) { return d.total; })]);

  svg.append("g")
  .attr("class", "x axis")
  .attr("transform", "translate(0," + height + ")")
  .call(xAxis)
  .selectAll("text")
  .attr("transform", "rotate(-25)")
  .attr("y", "20")
  .attr("x", "-10");

  svg.append("g")
  .attr("class", "y axis")
  .call(yAxis)
  .append("text")
  .attr("transform", "rotate(-90)")
  .attr("y", 6)
  .attr("dy", ".71em")
  .style("text-anchor", "end")
  .style('font', '10px "AvenirNext"')
  .text("Frequency");

  svg.selectAll(".bar")
  .data(data)
  .enter().append("rect")
  .attr("class", "bar")
  .style('fill','#00FFB3')
  .style('fill-opacity','9')
  .attr("x", function(d) { return x(d.tablename); })
  .attr("width", x.rangeBand())
  .attr("y", function(d) { return y(d.total); })
  .attr("height", function(d) { return height - y(d.total); })
  .on("mouseover", function(d) {    
    div.transition()    
    .duration(200)    
    .style("opacity", .9);    
    div .html(d.tablename + "<br/>"  + d.total)  
    .style("left", (d3.event.pageX - 200) + "px")   
    .style("top", (d3.event.pageY - 28) + "px");  
  })          
  .on("mouseout", function(d) {   
    div.transition()    
    .duration(500)    
    .style("opacity", 0); 
  });
  svg.selectAll('.axis line, .axis path')
  .style({'stroke': '#000', 'fill': 'none', 'shape-rendering': 'crispEdges'});
  svg.selectAll('.x.axis path')
  .style({'display': 'none'});
  svg.selectAll('.axis text')
  .style({'font': '10px "AvenirNext"'});
  d3.select("#sort_bar").on("change", change);

  var sortTimeout = setTimeout(function() {
    d3.select("#sort_bar").property("checked", true).each(change);
  }, 2000);

  function change() {
    clearTimeout(sortTimeout);

    // Copy-on-write since tweens are evaluated after a delay.
    var x0 = x.domain(data.sort(this.checked
      ? function(a, b) { return b.total - a.total; }
      : function(a, b) { return d3.ascending(a.tablename, b.tablename); })
    .map(function(d) { return d.tablename; }))
    .copy();

    svg.selectAll(".bar")
    .sort(function(a, b) { return x0(a.tablename) - x0(b.tablename); });

    var transition = svg.transition().duration(750),
    delay = function(d, i) { return i * 50; };

    transition.selectAll(".bar")
    .delay(delay)
    .attr("x", function(d) { return x0(d.tablename); });

    transition.select(".x.axis")
    .call(xAxis)
    .selectAll("g")
    .delay(delay)
    .selectAll("text")
    .attr("y", "20")
    .attr("x", "-10");
  }
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