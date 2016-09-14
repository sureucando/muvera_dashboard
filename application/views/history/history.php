<!-- Content -->
	<div class="content">
		<!--<div class="banner">
			<div class="banner-top">
				Discover News
				<a class="btn-sm btn-orange" href="<?php //echo base_url('media_online'); ?>">Learn More</a>
			</div>
			<div class="banner-bot"></div>-->
			<div class="content-container">
				<div class="section-history">
					<div class="grid-title border-bot">
						<div class="btn btn-marker btn-rnd-sm"></div>
						<h3>Tag</h3>
					</div>
					<div class="grid">
						<?php 
							$rownumber1 = $item;
							$rownumber2 = $item - 1;
							$rownumber3 = $item - 2;	
						?>
						<div class="grid-col" id="grid-col-1">
							<!-- Item Col 1 -->
							<?php
							if (($item % 3) == 1){
								$col1 = (($item - 1) / 3) + 1;
								for ($i = 1; $i<=$col1; $i++){
									$data = array (
										'item' => $rownumber1,
										'rowdata' => $rowdata[$rownumber1-1]
									);
									$this->load->view('template/grid_item_history.php', $data);
									$rownumber1 = $rownumber1 - 3;
								}
							}
							else {
								$col1 = ($item + 2) / 3;
								for ($i = 1; $i<=$col1; $i++){
									$data = array (
										'item' => $rownumber1,
										'rowdata' => $rowdata[$rownumber1-1]
									);
									$this->load->view('template/grid_item_history.php', $data);
									$rownumber1 = $rownumber1 - 3;
								}
							} ?>
						</div>
						<div class="grid-col" id="grid-col-2">
							<!-- Item Col 2 -->
							<?php 
							if (($item % 3) == 2){
								$col2 = (($item - 2) / 3) + 1;
								for ($i = 1; $i<=$col2; $i++){
									$data = array (
										'item' => $rownumber2,
										'rowdata' => $rowdata[$rownumber2-1]
									);
									$this->load->view('template/grid_item_history.php', $data);
									$rownumber2 = $rownumber2 - 3;
								}
							}
							else {
								$col2 = ($item + 1) / 3;
								for ($i = 1; $i<=$col2; $i++){
									$data = array (
										'item' => $rownumber2,
										'rowdata' => $rowdata[$rownumber2-1]
									);
									$this->load->view('template/grid_item_history.php', $data);
									$rownumber2 = $rownumber2 - 3;
								}
							} ?>
						</div>
						<div class="grid-col" id="grid-col-3">
							<!-- Item Col 3 -->
							<?php
							$col3 = $item / 3;
							for ($i = 1; $i<=$col3; $i++){
									$data = array (
										'item' => $rownumber3,
										'rowdata' => $rowdata[$rownumber3-1]
									);
								$this->load->view('template/grid_item_history.php', $data);
								$rownumber3 = $rownumber3 - 3;
							} ?>
						</div>
					</div>
				</div>
			</div>