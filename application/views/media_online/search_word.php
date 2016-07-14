					<div class="section-report">
						<div class="chart-container">
							<div class="report-chart">
								<h3 class="report-title">
									<img src="assets/images/icon-title2.png">Chart Report</h3>
									<div class="report-content-chart">
										Main Keyword : <?php echo $_GET["main-word"] ?> <br>
										Taxonomy 1 : <?php echo $_GET["first-tax"] ?> <br>
										Taxonomy 2 : <?php echo $_GET["second-tax"] ?> <br>
										Taxonomy 3 : <?php echo $_GET["third-tax"] ?> <br>
										Taxonomy 4 : <?php echo $_GET["fourth-tax"] ?> <br>

										Get Date : <br>
										From : <?php echo $_GET["date-from"] . ' ' . $_GET["time-from"] ?> <br>
										To : <?php echo $_GET["date-to"] . ' ' . $_GET["time-to"] ?> <br>

										Chosen Media : <br>
										<?php 
										$media = $_GET["media"];
										foreach ($media as $media_data){echo $media_data . "<br />";} ?>

									</div>
								</div>
