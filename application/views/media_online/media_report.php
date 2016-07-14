
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