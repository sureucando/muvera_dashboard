			<!-- Footer Bar -->
			<div id="footer">
				<div class="footer-container">
					<div class="footer-left">
						<a href="#">About MUVERA</a>
						<a href="#">IOU & Privacy</a>
						<a href="#">Help</a>
					</div>
					<div class="footer-right">
						powered by MUVERA
					</div>
				</div>

				<!-- Aditional Div's -->
				<!-- Loading Div -->
				<div id="loading"></div>

				<script src="assets/js/jquery-1.12.3.js"></script>
				<script src="assets/js/jquery-ui.js"></script>
				<script src="assets/js/assets.js"></script>
				<script src="https://d3js.org/d3.v3.min.js"></script>
				<script src="assets/js/jspdf.js"></script> 
				<script src="assets/js/addimage.js"></script> 
				<script src="assets/js/FileSaver.js"></script> 
				<script src="assets/js/png.js"></script> 
				<script src="assets/js/zlib.js"></script> 
				<script src="assets/js/xepOnline.jqPlugin.js"></script> 
				<script src="assets/js/png_support.js"></script> 
				<script type="text/javascript"> 
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
						//can print pdf with low quality
						/*var svgChart = new XMLSerializer().serializeToString(document.getElementById('ResultChart'));
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
						imgLegend.src = urlLegend;*/
						
						var url = "<?php echo base_url('print_report/printpdf')?>";
						$.ajax({
							url: url,
							type : "POST",
							data :$('#pie_chart_visualisation').html(),
							contentType : "text",
							success : function(data){
								if (data && data.search('filename') != -1){
									var arrDispo = data.split(':');
									var filename = arrDispo[1].trim();
									//var filename = filename.replace(".","/");
									window.location.assign("<?php echo base_url('print_report/download/')?>"+"/"+filename);
								}
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error !');
								//$('#loading').toggle();
							}
						});
					}
					
					function downloadPNG(){
						//return xepOnline.Formatter.Format('pie_chart_visualisation',{srctype:'svg', mimeType:'image/png', render:'download'});
						//saveSvgAsPng(document.getElementById("pie_chart_visualisation"), "diagram.png");
						// can do but low quality
						var svgChart = new XMLSerializer().serializeToString(document.getElementById('ResultChart'));
						//var svgLeged = new XMLSerializer().serializeToString(document.getElementById('ResultLegend'));
						var canvas = document.getElementById("canvas");
						var ctx = canvas.getContext("2d");
						var DOMURL = self.URL || self.webkitURL || self;
						var imgChart = new Image();
						//var imgLegend = new Image();
						var svgCh = new Blob([svgChart], {type: "image/svg+xml;charset=utf-8"});
						//var svgLg = new Blob([svgLeged], {type: "image/svg+xml;charset=utf-8"});
						var urlChart = DOMURL.createObjectURL(svgCh);
						//var urlLegend = DOMURL.createObjectURL(svgLg);
						var count = 1;
						//imgChart.onload = imgLegend.onload = function() {
						imgChart.onload = function() {	
							count --;
							//if (count === 0) drawImages(ctx, imgChart, imgLegend, canvas, DOMURL);
							if (count === 0) drawImages(ctx, imgChart, imgChart, canvas, DOMURL);
						};
						imgChart.src = urlChart;
						//imgLegend.src = urlLegend;
						
						
					}
					
					function drawImages(ctx, img1, img2,canvas, DOMURL){
						ctx.clearRect(0, 0, canvas.width, canvas.height);
						ctx.drawImage(img1, 0, 0,500,300);
						//ctx.drawImage(img2, 500, 0);
						var png = canvas.toDataURL("image/png");
						var url = "<?php echo base_url('print_report/printpng')?>";
						$.ajax({
							url: url,
							type : "POST",
							data : png,
							contentType : "text",
							success : function(data){
								if (data && data.search('filename') != -1){
									var arrDispo = data.split(':');
									var filename = arrDispo[1].trim();
									//var filename = filename.replace(".","/");
									window.location.assign("<?php echo base_url('print_report/download/')?>"+"/"+filename);
								}
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error !');
								//$('#loading').toggle();
							}
						});
						/*document.querySelector('#pngdataurl').innerHTML = '<img src="'+png+'"/>';
						DOMURL.revokeObjectURL(png);
						var a = document.createElement("a");
						a.download = "sample.png";
						a.href = png;
						document.body.appendChild(a);
						a.click();*/
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
					
					function downloadXLS(){
						var valid = validateForm();
						if (valid){
							//$('#loading').show();
							var url = "<?php echo base_url('query/getxls')?>";
							$.ajax({
								url: url,
								type : "POST",
								data :$('#search-form').serialize(),
								success : function(data){
									if (data && data.search('filename') != -1){
										var arrDispo = data.split(':');
										console.log("here");
										var filename = arrDispo[1].trim();
										console.log(filename);
										//var filename = filename.replace(".","/");
										window.location.assign("<?php echo base_url('print_report/download/')?>"+"/"+filename);
									}
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alert('Error !');
									//$('#loading').toggle();
								}
							});
						}
					}
					
					function search(){
						var valid = validateForm();
						if (valid){
							$('#loading').show();
							var url = "<?php echo base_url('query/ajax_refresh')?>";
							$.ajax({
								url: url,
								type : "POST",
								data :$('#search-form').serialize(),
								dataType : "JSON",
								success : function(data){
									if (data.status){
										//alert(data.message+", Keyword pertama: "+data.word1+", Keyword kedua: "+data.word2+", Keyword ketiga: "+data.word3+", Keyword keempat: "+data.word4+", Keyword kelima: "+data.word5+", Waktu Mulai: "+data.datefrom+" "+data.timefrom+", Waktu Selesai: "+data.dateto+" "+data.timeto+", List Media: "+data.media);
										var countMedia = data.count;									
										document.getElementById('chart_count_report').innerHTML  = "";
										for(var i=0;i<countMedia.length;i++){
											document.getElementById('chart_count_report').innerHTML += '<tr><td>'.concat(countMedia[i].tablename,'</td><td>', countMedia[i].total, '</td></tr>');
										}
										//showPieChart(data.count);
										showBarChart(data.count);
									}
									$('.section-report').show();
									$('.content-container').animate({height:'1700px'}, 'slow');
									$('#loading').hide();
									var y = $('.content').scrollTop();
   									$('.content').animate({scrollTop: y + 725}, 'slow');
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alert('Error !');
									$('#loading').toggle();
								}
							});
							//$('.section-report').show();
							//$('.content-container').animate({height:'1700px'}, 'slow');
							//$(this).attr('style', 'pointer-events: none;');
							//$(this).addClass('selected');
						}
					}
					
					function showBarChart(data){
						d3.select("#pie_chart_visualisation").selectAll("svg").remove(); //remove all svg element
						var margin = {top: 20, right: 20, bottom: 30, left: 40},
							width = 600 - margin.left - margin.right,
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
							  .call(xAxis);

						  svg.append("g")
							  .attr("class", "y axis")
							  .call(yAxis)
							.append("text")
							  .attr("transform", "rotate(-90)")
							  .attr("y", 6)
							  .attr("dy", ".71em")
							  .style("text-anchor", "end")
							  .style('font', '10px sans-serif')
							  .text("Frequency");

						  svg.selectAll(".bar")
							  .data(data)
							.enter().append("rect")
							  .attr("class", "bar")
							  .style('fill','steelblue')
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
								.style({'font': '10px sans-serif'});
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
								.delay(delay);
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

				</script>
</body>
</html>