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
			</div>

				<!-- Aditional Div's -->
				<!-- Loading Div -->
				<div id="loading"><img src="assets/images/loader.gif"></div>

				<script src="https://d3js.org/d3.v3.min.js"></script>
				<script src="assets/js/jspdf.js"></script> 
				<script src="assets/js/addimage.js"></script> 
				<script src="assets/js/FileSaver.js"></script> 
				<script src="assets/js/png.js"></script> 
				<script src="assets/js/zlib.js"></script> 
				<script src="assets/js/xepOnline.jqPlugin.js"></script> 
				<script src="assets/js/png_support.js"></script> 
				<script src="assets/js/jquery-1.12.3.js"></script>
				<script src="assets/js/jquery-ui.js"></script>
				<script src="assets/js/assets.js"></script>
				<script type="text/javascript"> 
					
					
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
						
						$('#loading').show();
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
								$('#loading').hide();
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error !');
								$('#loading').hide();
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
						$('#loading').show();
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
								$('#loading').hide();
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error !');
								$('#loading').hide();
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
						$('#loading').show();
						ctx.clearRect(0, 0, canvas.width, canvas.height);
						ctx.drawImage(img1, parseInt(0), parseInt(0),img1.width,img1.height);
						ctx.drawImage(img2, parseInt(img1.width), 0);
						var img = canvas.toDataURL("image/png");
						var pdf = new jsPDF();
						pdf.addImage(img, 'PNG', 10, 10);
						pdf.save("download.pdf");
						$('#loading').hide();
					}
					
					function downloadXLS(){
						var valid = validateForm();
						if (valid){
							$('#loading').show();
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
									$('#loading').hide();
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alert('Error !');
									$('#loading').hide();
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
									$('#loading').hide();
								}
							});
							//$('.section-report').show();
							//$('.content-container').animate({height:'1700px'}, 'slow');
							//$(this).attr('style', 'pointer-events: none;');
							//$(this).addClass('selected');
						}
					}
					
				</script>
</body>
</html>