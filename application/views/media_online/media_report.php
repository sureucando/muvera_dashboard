						<div class="report-chart" id="report-2">
							<h3 class="report-title"><img src="assets/images/icon-title2.png">Chart Report</h3>
							<div class="report-content-chart" id="pie_chart_visualisation">
							
								<label><input type="checkbox" id="sort_bar"> Sort values</label>
							</div>
							<canvas width="900" height="400" id="canvas" style="display:none"></canvas>
						</div>
						<div class="btn btn-orange btn-lg" id="report-dl">Download Report</div>
						<div id="btn-dl-cont">
							<div class="btn btn-orange btn-rnd" onclick="downloadPNG()"><img src="assets/images/file-png.png"></div>
							<div class="btn btn-orange btn-rnd" onclick="downloadPDF()"><img src="assets/images/file-pdf.png"></div>
							<div class="btn btn-orange btn-rnd" onclick="downloadXLS()"><img src="assets/images/file-xlxs.png"></div>
						</div>
						<div class="btn btn-orange btn-lg" id="report-sh">Share Report</div>
						<div id="share-cont">
							<form id="share-form" name="share-form">
								<input type="text" placeholder="Insert Email Here...">
								<div class="btn btn-green btn-md">Share</div>
							</form>
						</div>
					</div>
					<!--<div class="file-container">
						<div class="report-file">
							<h3 class="report-title"><img src="assets/images/icon-title1.png">Excel Report</h3>
							<div class="report-content-file">
							<img src="assets/images/file-xlxs2.png" class="file">
							</div>
						</div>
						<div class="btn btn-orange btn-lg">Download Excel Report</div>
						<div class="btn btn-orange btn-lg">Share Excel Report</div>
					</div>-->
				</div>

			</div>