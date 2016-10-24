							<?php echo '<div class="grid-item" id="grid-item-'. $item .'">' ?>
								<div class="grid-content">
									<div class="grid-closed">
										<div class="grid-header btn-grid-open">
											<i class="fa fa-angle-down" aria-hidden="true"></i>
										</div>
										<div class="grid-content-closed">
											<div class="btn btn-marker btn-rnd2"><img src="assets/images/grid-chart.png"></div>
											<div class="grid-main-key"><?php echo $rowdata['keyword'][0]; ?></div>
										</div>
									</div>
									<div class="grid-opened">
										<div class="grid-header btn-grid-close">
											<i class="fa fa-angle-up" aria-hidden="true"></i>
										</div>
										<div class="grid-content-open">
											<div class="grid-btn-cont border-bot">
												<div class="btn btn-orange btn-rnd" onclick='window.location.assign("<?php echo base_url('print_report/download/')?>"+"/generated_chart/"+"<?php echo $rowdata['filename'] ?>"+".png");'><img src="assets/images/file-png.png"></div>
												<div class="btn-rnd-desc"><p>Download<br />Chart Report<br /><b>PNG</b></p></div>
											</div>
											<div class="grid-btn-cont border-bot">
												<div class="btn btn-orange btn-rnd" onclick='window.location.assign("<?php echo base_url('print_report/download/')?>"+"/generated_report/"+"<?php echo $rowdata['filename'] ?>"+".pdf");'><img src="assets/images/file-pdf.png"></div>
												<div class="btn-rnd-desc"><p>Download<br />Chart Report<br /><b>PDF</b></p></div>
											</div>
											<div class="grid-btn-cont">
												<div class="btn btn-orange btn-rnd" onclick='window.location.assign("<?php echo base_url('print_report/download/')?>"+"/generated_file/"+"<?php echo $rowdata['filename'] ?>"+".csv");'><img src="assets/images/file-csv.png"></div>
												<div class="btn-rnd-desc"><p>Download<br />Excel Report<br /><b>CSV</b></p></div>
											</div>
											<div class="grid-page-cont">
												<i class="fa fa-angle-left" aria-hidden="true"></i>
												<i class="fa fa-angle-right" aria-hidden="true"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="grid-footer">
									<div class="grid-tanggal"><?php echo $rowdata['tanggal']; ?></div>
								</div>
							</div>