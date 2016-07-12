


	<!-- Content -->
	<div class="content">
		<!-- Banner -->
		<div class="banner">
			<div class="banner-top">
				Lorem Ipsum Dolor
				<div class="btn btn-sm btn-orange">Learn More</div>
			</div>
			<div class="banner-bot">
			</div>
		</div>
		<div class="content-container">
			<!-- Search Config Section -->
			<div class="section-search">
				<h1 class="content-title">MEDIA</h1>
				<div id="search-container">
					<input type="text" class="search-keyword search-keyword-main" placeholder="+ Add Word">
					<input type="text" class="search-keyword search-keyword-tax tax1" placeholder="+ Add Word">
					<input type="text" class="search-keyword search-keyword-tax tax2" placeholder="+ Add Word">
					<input type="text" class="search-keyword search-keyword-tax tax3" placeholder="+ Add Word">
					<input type="text" class="search-keyword search-keyword-tax tax4" placeholder="+ Add Word">
				</div>
				<div class="get-time">
					<div id="datepicker-container">
						<div class="datepicker-from">
							<label for="from">From</label>
							<input type="date" class="from from-date" name="from">
						</div>
						<div class="datepicker-to">
							<label for="to">to</label>
							<input type="date" class="to to-date" name="to">
						</div>
					</div>
					<div id="timepicker-container">
						<div class="timepicker-from">
							<label for="from">From</label>
							<input type="time" class="from from-time" name="from">
						</div>
						<div class="timepicker-to">
							<label for="to">to</label>
							<input type="time" class="to to-time" name="to">
						</div>
					</div>
				</div>
			</div>
			<div class="section-choice">
				<div class="btn-media-container">
					<div class="btn btn-media">
						<input id="CNNIdn" type="checkbox" value="CNNIdn">
						<label for="CNNIdn">CNN Idn</label>
					</div>
					<div class="btn btn-media">
						<input id="Detik" type="checkbox" value="Detik">
						<label for="Detik">Detik</label>
					</div>
					<div class="btn btn-media">
						<input id="Kompas" type="checkbox" value="Kompas">
						<label for="Kompas">Kompas</label>
					</div>
					<div class="btn btn-media">
						<input id="Liputan6" type="checkbox" value="Liputan6">
						<label for="Liputan6">Liputan6</label>
					</div>
					<div class="btn btn-media">
						<input id="Merdeka" type="checkbox" value="Merdeka">
						<label for="Merdeka">Merdeka</label>
					</div>
					<div class="btn btn-media">
						<input id="Republika" type="checkbox" value="Republika">
						<label for="Republika">Republika</label>
					</div>
					<div class="btn btn-media">
						<input id="Sindo" type="checkbox" value="Sindo">
						<label for="Sindo">Sindo</label>
					</div>
					<div class="btn btn-media">
						<input id="Tempo" type="checkbox" value="Tempo">
						<label for="Tempo">Tempo</label>
					</div>
					<div class="btn btn-media">
						<input id="Tribun" type="checkbox" value="Tribun">
						<label for="Tribun">Tribun</label>
					</div>
					<div class="btn btn-media">
						<input id="Viva" type="checkbox" value="Viva">
						<label for="Viva">Viva</label>
					</div>
				</div>
				<div id="btn-generate" class="btn btn-orange btn-lg-rnd">Generate Report</div>
			</div>
			<div class="section-report">
				<div class="chart-container">
					<div class="report-chart">
						<h3 class="report-title">
							<img src="assets/images/icon-title2.png">Chart Report</h3>
							<div class="report-content-chart">
								<table>
									<thead>
										<tr>
											<th>Media</th>
											<th>Counter</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($count_cnnidn as $object) {echo '<tr><td>CNN Indonesia</td><td>' . $object->total . '</td></tr>';} ?>
									<?php foreach ($count_detik as $object) {echo '<tr><td>Detik</td><td>' . $object->total . '</td></tr>';} ?>
									<?php foreach ($count_kompas as $object) {echo '<tr><td>Kompas</td><td>' . $object->total . '</td></tr>';} ?>
									<?php foreach ($count_liputan6 as $object) {echo '<tr><td>Liputan 6</td><td>' . $object->total . '</td></tr>';} ?>
									<?php foreach ($count_merdeka as $object) {echo '<tr><td>Merdeka</td><td>' . $object->total . '</td></tr>';} ?>
									<?php foreach ($count_republika as $object) {echo '<tr><td>Republika</td><td>' . $object->total . '</td></tr>';} ?>
									<?php foreach ($count_sindo as $object) {echo '<tr><td>Sindonews</td><td>' . $object->total . '</td></tr>';} ?>
									<?php foreach ($count_tempo as $object) {echo '<tr><td>Tempo</td><td>' . $object->total . '</td></tr>';} ?>
									<?php foreach ($count_tribun as $object) {echo '<tr><td>Tribunnews</td><td>' . $object->total . '</td></tr>';} ?>
									<?php foreach ($count_viva as $object) {echo '<tr><td>Viva</td><td>' . $object->total . '</td></tr>';} ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="report-chart">
							<h3 class="report-title">
								<img src="assets/images/icon-title2.png">Chart Report</h3>
								<div class="report-content-chart">
								</div>
							</div>
							<div class="btn btn-orange btn-lg">Download Chart Report</div>
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
