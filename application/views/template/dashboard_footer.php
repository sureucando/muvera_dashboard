					<!-- Footer Bar -->
					<div id="footer">
						<div class="footer-container">
							<div class="footer-left">
								<a href="#">About MUVERA</a>
								<a href="#">IOU & Privacy</a>
								<a href="">Help</a>
							</div>
							<div class="footer-right">
								powered by MUVERA
							</div>
						</div>
					</div>
				</div>

				<!-- Aditional Div's -->
				<!-- Loading Div -->
				<div id="loading"></div>

				<script src="assets/js/jquery-1.12.3.js"></script>
				<script src="assets/js/jquery-ui.js"></script>
				<script src="assets/js/assets.js"></script>
				<script src="https://d3js.org/d3.v3.min.js"></script>
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
										showPieChart(data.count);
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