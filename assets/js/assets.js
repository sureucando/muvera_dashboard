/* Global Variable */
var query;
var flagdl, flagsh;

/* Start Of Function */

$(document).ready(function(){
  //var baseWidth = $(window).width();
  //var baseHeight = $(window).height();

  $('.content').css("height", "100%").css("height", "-=50px");
  //var whiteBG = $('.content-container').height();
  //$('#login-form').css("height", whiteBG);
  //$('#contact-us-form').css("height", whiteBG);
    

  $(window).on("resize", function () {
    //whiteBG = $('.content-container').height();
    //$('#login-form').css("height", whiteBG);
    //$('#contact-us-form').css("height", whiteBG);
    /*var imgDummy = $('.content-container').height();
    if (imgDummy > 550) {
      $('.img-dummy').css("height", imgDummy);
    } else {
      $('.img-dummy').css("height", "0");
    };*/
    $('.content').css("height", "100%").css("height", "-=50px");
  }).resize();

  flagdl = true;
  flagsh = true;

  //$('.section-product').css("width", baseWidth).css("height", baseHeight);

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
  $('.search-keyword-main').focus(function(){
    $('.tax1').css('display', 'inline-block');
//    $(this).blur(function(){
//      $('.tax1').css('display', 'none');
//    });
  });
  $('.tax1').focus(function(){
    $('.tax2').css('display', 'inline-block');
//    $(this).blur(function(){
//      $('.tax2').css('display', 'none');
//    });
  });
  $('.tax2').focus(function(){
    $('.tax3').css('display', 'inline-block');
//    $(this).blur(function(){
//      $('.tax3').css('display', 'none');
//    });
  });
  $('.tax3').focus(function(){
    $('.tax4').css('display', 'inline-block');
//    $(this).blur(function(){
//      $('.tax4').css('display', 'none');
//    });
  });

  /* Generate Report */
  /*$('#btn-generate').click(function(){
    //$('.section-report').show();
    //$('.content-container').animate({height:'2860px'}, 500);
    //$(this).attr('style', 'pointer-events: none;');
    //$(this).addClass('selected');
  });*/

  /* Get In Touch Button */
  $('#btn-git').click(function(){
    $('#get-in-touch').fadeOut(500, function(){
      $('.content-container').css('padding', '0');
      $('.section-cs').css('margin', '0').css('padding', '0');
      $('#contact-us-form').fadeIn(500);
    });
  });

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

  /* Media Chooser */
  $(".media-box").hover(function(){
    $(this).children(".media-box-img").css("display", "none");
  },
  function(){
    $(this).children(".media-box-img").css("display", "inline-block");
  });

  var checkflag = {A:0,B:0,C:0,D:0,E:0,F:0,G:0,H:0,I:0,J:0,K:0,L:0,M:0,N:0,O:0,P:0,Q:0,R:0,S:0,T:0,U:0,V:0,W:0,X:0,Y:0,Z:0};
  $("input[type='checkbox']").change(function(){
    var imgRandom = Math.floor(Math.random() * 2) + 1;
    var boxname = $(this).parent().siblings('.media-box-img').text();
    //console.log(boxname);
    if(this.checked){
      checkflag[boxname] = checkflag[boxname] + 1;
      $(this).parent().siblings('.media-box-img')
        .css("background", "#000000")
        .css("color", "#ffffff");
      //if(imgRandom == 1){
        //$(this).parent().siblings('.media-box-img')
          //.css("background-image", "url('assets/images/media1.jpg')")
          //.css("background-size", "100% 100%")
          //.css("background-repeat", "no-repeat")
          //.css("color", "#ffffff");
      //} 
      //else if (imgRandom == 2){
        //$(this).parent().siblings('.media-box-img')
          //.css("background-image", "url('assets/images/media2.jpg')")
          //.css("background-size", "100% 100%")
          //.css("background-repeat", "no-repeat")
          //.css("color", "#ffffff");
      //};
      //console.log(checkflag);
    }
    else {
      checkflag[boxname] = checkflag[boxname] - 1;
      if (checkflag[boxname] == 0){
        $(this).parent().siblings('.media-box-img')
          //.css("background-image", "none")
          .css("background", "#cdcdcd")
          .css("color", "#000000");
      };
      //console.log(checkflag);
    };
  });

  /* Input Placeholder */
  $('input').focus(function(){
    var placeholder = $(this).attr('placeholder');
    $(this).attr('placeholder', '');
    $('input').blur(function(){
      $(this).attr('placeholder', placeholder);
    });
  });
  /* Textarea Placeholder */
  $('textarea').focus(function(){
    var placeholder = $(this).attr('placeholder');
    $(this).attr('placeholder', '');
    $('textarea').blur(function(){
      $(this).attr('placeholder', placeholder);
    });
  });

  //$("#email-share").tokenfield();
  /* Select All Media */
  //select all checkboxes
  $("#select-all-media").change(function(){  //"select all" change
    if($(this).prop("checked")){ //if this item is unchecked
      $(".media-box-cont input[type='checkbox']").prop('checked', $(this).prop("checked")); //change all to checked status
      checkflag = {A:1,B:1,C:1,D:1,E:0,F:1,G:0,H:0,I:0,J:2,K:1,L:1,M:2,N:0,O:0,P:1,Q:0,R:3,S:2,T:3,U:0,V:1,W:0,X:0,Y:0,Z:0};
      $('.media-box-img.has-media')
        .css("background", "#000000")
        .css("color", "#ffffff");
    }
    else{
      $(".media-box-cont input[type='checkbox']").prop('checked', $(this).prop("checked")); //change all to checked status
      checkflag = {A:0,B:0,C:0,D:0,E:0,F:0,G:0,H:0,I:0,J:0,K:0,L:0,M:0,N:0,O:0,P:0,Q:0,R:0,S:0,T:0,U:0,V:0,W:0,X:0,Y:0,Z:0};
      $('.media-box-img.has-media')
        .css("background", "#cdcdcd")
        .css("color", "#000000");
    }
      //console.log(checkflag)
  });
  //uncheck "select all", if one of the listed checkbox item is unchecked
  $(".media-box-cont input[type='checkbox']").change(function(){ //".checkbox" change 
      if(false == $(this).prop("checked")){ //if this item is unchecked
          $("#select-all-media").prop('checked', $(this).prop("checked")); //change "select all" checked status to false
      }
  });

  /* Reset Button */
  $("#reset-btn").on("click", function(){
    $('.content').animate({scrollTop: 0}, 'slow');
    $(".search-keyword").val("");
    $('.search-keyword-tax').css("display", "none");
    $(".datepicker").val("mm/dd/yyyy");
    $(".hour").val("12");
    $(".minute").val("12");
    $(".minute").val("0");
    $("#period-from").val($("#period-from option:first").val());
    $("#period-to").val($("#period-to option:first").val());
    //$("#period-from").val(1);
    //$("#period-to").val(1);
    $(".media-box-cont input[type='checkbox']:checked").prop('checked', false);
    $("#select-all-media").prop('checked', false);
    $("#sort_bar").prop('checked', false);
    //$('input[type=checkbox]').attr('checked',false);
    checkflag = {A:0,B:0,C:0,D:0,E:0,F:0,G:0,H:0,I:0,J:0,K:0,L:0,M:0,N:0,O:0,P:0,Q:0,R:0,S:0,T:0,U:0,V:0,W:0,X:0,Y:0,Z:0};
    $('.media-box-img').css("background", "#cdcdcd").css("color", "#000000");
    $('.section-report').fadeOut();
    $(this).css("display", "none");
  });

});
/* End Of Window Function */

/* Tokenizer */
//var tokenInput = $('input#email-share').tokenizer({ 
  /* options */
  //separators: [',',' ','.',';','  ']
//});

/* Compute Height */
/*var setElementHeight = function () {
  var conth = $('.window').height() - $('.header').height();
  $('.content').css('height', (conth));
  var height1 = $('.section-search').height() + $('.section-choice').height() + $('.header').height();
  $('#search-form').css('height', (height1));
  var height2 = $('#search-form').height() + $('.section-report').height();
  $('.content-container').css('height', (height2));
};

$(window).on("resize", function () {
  setElementHeight();
}).resize();*/

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
  if (date_from == null || date_from == "" || date_from == "mm/dd/yyyy" ) {
    alert("Start date must be filled out");
    return false;
  }
  if (date_to == null || date_to == "" || date_from == "mm/dd/yyyy" ) {
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

function showMultiLineChart(data){
	d3.select("#line-chart").selectAll("svg").remove();
	
  var margin = {top: 50, right: 20, bottom: 50, left: 40},
  width = 900 - margin.left - margin.right,
  height = 350 - margin.top - margin.bottom;
	
  var svg = d3.select("#line-chart").append("svg")
  .attr("width", width + margin.left + margin.right)
  .attr("height", height + margin.top + margin.bottom)
  .attr("id", 'ResultChart'),
    g = svg.append("g").attr("transform", "translate(" + margin.left + "," + margin.top + ")");

	var parseTime = d3.timeParse("%Y-%m-%d");

	/*var x = d3.scaleTime().range([0, width]),
		y = d3.scaleLinear().range([height, 0]),
		z = d3.scaleOrdinal(d3.schemeCategory20);

	var line = d3.line()
		.curve(d3.curveBasis)
		.x(function(d) { return x(d.date); })
		.y(function(d) { return y(d.temperature); });*/

	  //console.log(data);
	  var dates = Object.keys(data);
	  var listMedia = Object.keys(data[dates[0]]);
	  for (var media in listMedia){
		  return{
			  id:media,
			  
		  }
	  }
	  
	  console.log(array);
	  /*var cities = data.columns.slice(1).map(function(id) {
		return {
		  id: id,
		  values: data.map(function(d) {
			return {date: d.date, temperature: d[id]};
		  })
		};
	  });

	  x.domain(d3.extent(data, function(d) { return d.date; }));

	  y.domain([
		d3.min(cities, function(c) { return d3.min(c.values, function(d) { return d.temperature; }); }),
		d3.max(cities, function(c) { return d3.max(c.values, function(d) { return d.temperature; }); })
	  ]);

	  z.domain(cities.map(function(c) { return c.id; }));

	  g.append("g")
		  .attr("class", "axis axis--x")
		  .attr("transform", "translate(0," + height + ")")
		  .call(d3.axisBottom(x));

	  g.append("g")
		  .attr("class", "axis axis--y")
		  .call(d3.axisLeft(y))
		.append("text")
		  .attr("transform", "rotate(-90)")
		  .attr("y", 6)
		  .attr("dy", "0.71em")
		  .attr("fill", "#000")
		  .text("Temperature, ºF");

	  var city = g.selectAll(".city")
		.data(cities)
		.enter().append("g")
		  .attr("class", "city");

	  city.append("path")
		  .attr("class", "line")
		  .attr("d", function(d) { return line(d.values); })
		  .style("stroke", function(d) { return z(d.id); });

	  city.append("text")
		  .datum(function(d) { return {id: d.id, value: d.values[d.values.length - 1]}; })
		  .attr("transform", function(d) { return "translate(" + x(d.value.date) + "," + y(d.value.temperature) + ")"; })
		  .attr("x", 3)
		  .attr("dy", "0.35em")
		  .style("font", "10px sans-serif")
		  .text(function(d) { return d.id; });

	function type(d, _, columns) {
	  d.date = parseTime(d.date);
	  for (var i = 1, n = columns.length, c; i < n; ++i) d[c = columns[i]] = +d[c];
	  return d;
	}*/
}

function showBarChart(data){
    d3.select("#pie_chart_visualisation").selectAll("svg").remove(); //remove all svg element
    var margin = {top: 50, right: 20, bottom: 50, left: 40},
    width = $('.content-container').width() - $('.content-container').css('padding-left').replace('px','') - $('.content-container').css('padding-right').replace('px','');
    height = 350 - margin.top - margin.bottom;

    barOuterPad = 24;
    barPad = 24;

    //widthForBars = width - (barOuterPad * 2);
    barWidth = 24;
    //var formatPercent = d3.format(".0%");

    var x = d3.scale.ordinal()
    .rangeRoundBands([0, width], 0.5);

    //var x = (d, i) => (barWidth * i) + (i * barPad) + barOuterPad;

    var y = d3.scale.linear()
    .range([height, 0]);

    var xAxis = d3.svg.axis()
    .scale(x)
    //.attr("transform", "translate(#{barOuterPad}, 0)")
    .orient("bottom");

    var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left");
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
    //.style("text-anchor", "start")
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
    .style('font', '12px "AvenirNext"')
    .text("Frequency");

    svg.selectAll(".bar")
    .data(data)
    .enter().append("rect")
    .attr("class", "bar")
    .style('fill','#7381A5')
    .style('fill-opacity','9')
    .attr("x", function(d) { return x(d.tablename); })
    //.attr('x', (d, i) => (barWidth * i) + (i * barPad) + barOuterPad)
    .attr("width", /*barWidth'24px'*/x.rangeBand())
    .attr("y", function(d) { return y(d.total); })
    .attr("height", function(d) { return height - y(d.total); })
    .on("mouseover", function(d) {    
      div.transition()    
      .duration(200)    
      .style("opacity", .9);    
      div.html(d.tablename + "<br/>"  + d.total)
      .style("width", "auto")
      .style("height", "auto")
      .style("padding", "5px")
      .style("left", (event.pageX - ($('#tooltip-barchart').width() / 2)) + "px")   
      .style("top", (event.pageY - ($('#tooltip-barchart').height() / 2)) + "px");  
    })          
    .on("mouseout", function(d) {   
      div.transition()    
      .duration(500)    
      .style("opacity", 0); 
    });
    svg.selectAll('.axis path')
    .style({'stroke': '#000', 'fill': 'none', 'shape-rendering': 'crispEdges'});
    svg.selectAll('.x.axis path')
    .style({'display': 'inherit'});
    svg.selectAll('.axis text')
    .style({'font': '12px "AvenirNext"'});
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
      //.attr('x', (d, i) => (barWidth * i) + (i * barPad) + barOuterPad);

      transition.select(".x.axis")
      .call(xAxis)
      .selectAll("g")
      .delay(delay)
      .selectAll("text")
      .attr("y", "20")
      .attr("x", "-10");
    }
  };

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