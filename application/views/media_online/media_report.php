						<div class="report-chart" id="report-2">
							<h3 class="report-title"><img src="assets/images/icon-title2.png">Frequency Chart</h3>
							<div class="report-content-chart" id="pie_chart_visualisation">
							</div>
								<label><input type="checkbox" id="sort_bar" style="float: left;"> Sort values</label>
							<canvas id="canvas" width="900" height="400" style="display:none"></canvas>
						</div>
						<div class="btn btn-orange btn-lg" id="report-dl">Download Report</div>
						<div id="btn-dl-cont">
							<div class="btn-cont-share border-right">
								<div class="btn btn-orange btn-rnd" onclick="downloadPNG()"><img src="assets/images/file-png.png"></div>
								<div class="btn-rnd-desc"><p>Download<br />Chart Report<br /><b>PDF</b></p></div>
							</div>
							<div class="btn-cont-share border-right">
								<div class="btn btn-orange btn-rnd" onclick="downloadPDF()"><img src="assets/images/file-pdf.png"></div>
								<div class="btn-rnd-desc"><p>Download<br />Chart Report<br /><b>PNG</b></p></div>
							</div>
							<div class="btn-cont-share">
								<div class="btn btn-orange btn-rnd" onclick="downloadXLS()"><img src="assets/images/file-csv.png"></div>
								<div class="btn-rnd-desc"><p>Download<br />Excel Report<br /><b>CSV</b></p></div>
							</div>
						</div>
						<div class="btn btn-orange btn-lg" id="report-sh">Share Report</div>
						<div id="share-cont">
							<form id="share-form" name="share-form">
								<input type="text" name="email" placeholder="Insert Email Here..." id="email-share">
								<div class="btn btn-green btn-md" onclick="sendemail()">Share</div>
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
				<div id="reset-btn">
					<div class="btn btn-orange btn-rnd"><img src="assets/images/reset-icon.png"></div>
					<div class="label-reset">New Report</div>
				</div>

			</div>