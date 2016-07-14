					<div class="section-report">
						<div class="chart-container">
							<div class="report-chart">
								<h3 class="report-title">
									<img src="assets/images/icon-title2.png">Chart Report</h3>
									<div class="report-content-chart">
										<div id="search-input" style="display:none;">
										Main Keyword : <?php echo $_POST["main-word"] ?> <br>
										Taxonomy 1 : <?php echo $_POST["first-tax"] ?> <br>
										Taxonomy 2 : <?php echo $_POST["second-tax"] ?> <br>
										Taxonomy 3 : <?php echo $_POST["third-tax"] ?> <br>
										Taxonomy 4 : <?php echo $_POST["fourth-tax"] ?> <br>

										Get Date : <br>
										From : <?php echo $_POST["date-from"] . ' ' . $_POST["time-from"] ?> <br>
										To : <?php echo $_POST["date-to"] . ' ' . $_POST["time-to"] ?> <br>

										Chosen Media : <br>
										<?php 
										$media = $_POST["media"];
										foreach ($media as $media_data){echo $media_data . "<br />";} ?>
											
										</div>
										
									</div>
								</div>
