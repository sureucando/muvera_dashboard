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

				<input type='hidden' id='pdffile' value=""></input> 
				<input type='hidden' id='pngfile' value=""></input> 
				<input type='hidden' id='xlsfile' value=""></input>
				<script src="assets/js/d3.v3.min.js"></script>
				<script src="assets/js/jspdf.js"></script> 
				<script src="assets/js/addimage.js"></script> 
				<script src="assets/js/FileSaver.js"></script> 
				<script src="assets/js/png.js"></script> 
				<script src="assets/js/zlib.js"></script> 
				<script src="assets/js/xepOnline.jqPlugin.js"></script> 
				<script src="assets/js/png_support.js"></script> 
				<!--<script src="assets/js/jquery-1.12.3.js"></script>-->
				<script src="assets/js/jquery-3.1.0.js"></script>
				<script src="assets/js/jquery-ui.js"></script>
				<script src="assets/js/assets.js"></script>
				<script type="text/javascript"> 
					
					
					function downloadPDF(){
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
					
					function downloadPDF2(){			
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
									document.getElementById('pdffile').value = filename;
									downloadPNG2();
								}
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error !');
							}
						});
					}
					
					function downloadPNG(){
						var svgChart = new XMLSerializer().serializeToString(document.getElementById('ResultChart'));
						console.log(svgChart);
						var canvas = document.getElementById("canvas");
						var ctx = canvas.getContext("2d");
						ctx.font = '10px "AvenirNext"';
						var DOMURL = self.URL || self.webkitURL || self;
						var imgChart = new Image();
						var svgCh = new Blob([svgChart], {type: "image/svg+xml;charset=utf-8"});
						console.log(svgCh);
						var urlChart = DOMURL.createObjectURL(svgCh);
						var count = 1;
						imgChart.onload = function() {	
							count --;
							if (count === 0) drawImages(ctx, imgChart, imgChart, canvas, DOMURL);
						};
						imgChart.src = urlChart;
					}
					
					function downloadPNG2(){
						var svgChart = new XMLSerializer().serializeToString(document.getElementById('ResultChart'));
						var canvas = document.getElementById("canvas");
						var ctx = canvas.getContext("2d");
						ctx.font = '10px "AvenirNext"';
						var DOMURL = self.URL || self.webkitURL || self;
						var imgChart = new Image();
						var svgCh = new Blob([svgChart], {type: "image/svg+xml;charset=utf-8"});
						var urlChart = DOMURL.createObjectURL(svgCh);
						var count = 1;
						imgChart.onload = function() {	
							count --;
							if (count === 0) drawImages2(ctx, imgChart, imgChart, canvas, DOMURL);
						};
						imgChart.src = urlChart;
					}
					
					function drawImages(ctx, img1, img2,canvas, DOMURL){
						$('#loading').show();
						ctx.clearRect(0, 0, canvas.width, canvas.height);
						ctx.drawImage(img1, x=0, y=0,width=canvas.width, height=canvas.height);
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
					
					function drawPDF(ctx, img1, img2,canvas, DOMURL){
						ctx.clearRect(0, 0, canvas.width, canvas.height);
						ctx.drawImage(img1, 0, 0,900,300);
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
									document.getElementById('pngfile').value = filename;
									downloadXLS2();
								}
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error !');
							}
						});
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
										var filename = arrDispo[1].trim();
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
					
					function downloadXLS2(){
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
										var filename = arrDispo[1].trim();
										document.getElementById('xlsfile').value = filename;
										send();
									}
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alert('Error !');
								}
							});
						}
					}
					
					function sendemail(){	
						$('#loading').show();
						downloadPDF2();					
					}

					function send(){
						
						var url = "<?php echo base_url('print_report/sendemail')?>"+"/"+document.getElementById('pdffile').value+"/"+document.getElementById('pngfile').value+"/"+document.getElementById('xlsfile').value;
						$.ajax({
								url: url,
								type : "POST",
								data :$('#share-form').serialize(),
								dataType : "JSON",
								success : function(data){
									if (data.status){
										alert("Email Sent!");
									}
									else{
										alert("Email Failed to Sent!");
									}
									$('#loading').hide();	
								},
								error: function (jqXHR, textStatus, errorThrown)
								{
									alert('Error in Server!');
									$('#loading').hide();	
								}
							});
						
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
					
					function drawImages2(ctx, img1, img2,canvas, DOMURL){
						ctx.clearRect(0, 0, canvas.width, canvas.height);
						ctx.drawImage(img1, 0, 0,500,300);
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
									document.getElementById('pngfile').value = filename;
									downloadXLS2();
								}
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error !');
							}
						});
					}
				</script>
	</body>
</html>