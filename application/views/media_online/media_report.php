
						<div class="report-chart">
							<h3 class="report-title">
								<img src="assets/images/icon-title2.png">Chart Report</h3>
								<div class="report-content-chart" id="pie_chart_visualisation">
								</div>															
								<canvas id="canvas" width="960" height="500" style="display:none"></canvas>		
								<div id="svgdataurl" style="display:none"></div>
								<div id="pngdataurl" style="display:none"></div>
							</div>
							<div class="btn btn-orange btn-lg">Download Chart Report</div>
							<div class="btn-rnd-cont">
								<div class="btn btn-orange btn-rnd" id="downloadPDF" onclick="return xepOnline.Formatter.Format('resultChart',{srctype:'svg',render:'download',filename:'d3donut'});"><img src="assets/images/file-pdf.png"></div>
								<div class="btn btn-orange btn-rnd" id="downloadPNG" onclick="downloadPNG()"><img src="assets/images/file-png.png"></div>
							</div>
						</div>
						<div class="file-container">
							<div class="report-file">
								<h3 class="report-title">
									<img src="assets/images/icon-title1.png">Excel Report</h3>
									<div class="report-content-file">
										<img src="assets/images/file-xlxs2.png" class="file">
									</div>
								</div>
								<div class="btn btn-orange btn-lg">Download Excel Report</div>
								<div class="btn btn-orange btn-lg">Share Excel Report</div>
							</div>
						</div>

					</div>