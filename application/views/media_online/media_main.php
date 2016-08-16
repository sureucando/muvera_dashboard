


	<!-- Content -->
	<div class="content">
		<!-- Banner -->
		<!--<div class="banner">
			<div class="banner-top">
				Media Monitoring - Muvera
				<div class="btn btn-sm btn-orange">Learn More</div>
			</div>
			<div class="banner-bot">
			</div>
		</div>-->
		<div class="content-container">
			<!-- Search Config Section -->
			<form id="search-form" name="search-form">
				<div class="section-search">
					<h1 class="content-title">SCRAP</h1>
					<h3>Media Intelligence</h3>
					<div id="search-container">
						<input type="text" class="search-keyword search-keyword-main" placeholder="+ Add Word" name="main-word" >
						<div class="label-word">Main Word</div>
						<input type="text" class="search-keyword search-keyword-tax tax1" placeholder="+ Add Word" name="first-tax">
						<div class="label-word">Taxonomy 1</div>
						<input type="text" class="search-keyword search-keyword-tax tax2" placeholder="+ Add Word" name="second-tax">
						<div class="label-word">Taxonomy 2</div>
						<input type="text" class="search-keyword search-keyword-tax tax3" placeholder="+ Add Word" name="third-tax">
						<div class="label-word">Taxonomy 3</div>
						<input type="text" class="search-keyword search-keyword-tax tax4" placeholder="+ Add Word" name="fourth-tax">
						<div class="label-word">Taxonomy 1</div>
					</div>
					<div class="get-time">
						<div id="datepicker-container">
							<div class="datepicker-from">
								<label for="from">From</label>
								<input type="text" class="from from-date datepicker" name="date-from" value="mm/dd/yyyy">
							</div>
							<div class="datepicker-to">
								<label for="to">to</label>
								<input type="text" class="to to-date datepicker" name="date-to" value="mm/dd/yyyy">
							</div>
						</div>
						<div id="timepicker-container">
							<div class="timepicker-from">
								<!--<label for="from">From</label>
								<input type="time" class="from from-time" name="time-from">-->
								<input type="number" class="from from-time" name="hour-from" placeholder="00" min="0" max="12" maxlength="2" value=12> : <input type="number" class="from from-time" name="minute-from" placeholder="00" min="0" max="59" maxlength="2" value=0>
								<select name="from-period" class="from from-period" id="period-from">
									<option value="am" selected>AM</option>
									<option value="pm">PM</option>
								</select>
							</div>
							<div class="timepicker-to">
								<!--<label for="to">to</label>
								<input type="time" class="to to-time" name="time-to">-->
								<input type="number" class="to to-time" name="hour-to" placeholder="00" min="0" max="12" maxlength="2" value=12> : <input type="number" class="to to-time" name="minute-to" placeholder="00" min="0" max="59" maxlength="2" value=0>
								<select name="to-period" class="to to-period" id="period-to">
									<option value="am" selected>AM</option>
									<option value="pm">PM</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="section-choice">
					<div class="media-container">
						<div class="media-box">
							<div class="media-box-img" iA">A</div>
							<div class="media-box-cont">
								<input id="Antara" type="checkbox" name="media[]" value="antaranews_data" >
								<label for="Antara">Antara</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">B</div>
							<div class="media-box-cont">
								<input id="BeritaSatu" type="checkbox" name="media[]" value="beritasatu_data">
								<label for="BeritaSatu">Berita Satu</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">C</div>
							<div class="media-box-cont">
								<input id="CNNIdn" type="checkbox" name="media[]" value="cnnindo_data" >
								<label for="CNNIdn">CNN Indonesia</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">D</div>
							<div class="media-box-cont">
								<input id="Detik" type="checkbox" name="media[]" value="detik_data" >
								<label for="Detik">Detik</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">E</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">F</div>
							<div class="media-box-cont">
								<input id="Fajar" type="checkbox" name="media[]" value="fajar_data" >
								<label for="Fajar">Fajar</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">G</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">H</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">I</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">J</div>
							<div class="media-box-cont">
								<input id="Jakarta Post" type="checkbox" name="media[]" value="jakpost_data" >
								<label for="Jakarta Post">Jakarta Post</label>
							</div>
							<div class="media-box-cont">
								<input id="JPNN" type="checkbox" name="media[]" value="jpnn_data" >
								<label for="JPNN">JPNN</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">K</div>
							<div class="media-box-cont">
								<input id="Kompas" type="checkbox" name="media[]" value="kompas_data" >
								<label for="Kompas">Kompas</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">L</div>
							<div class="media-box-cont">
								<input id="Liputan6" type="checkbox" name="media[]" value="liputan6_data" >
								<label for="Liputan6">Liputan6</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">M</div>
							<div class="media-box-cont">
								<input id="Merdeka" type="checkbox" name="media[]" value="merdeka_data" >
								<label for="Merdeka">Merdeka</label>
							</div>
							<div class="media-box-cont">
								<input id="MetroTV" type="checkbox" name="media[]" value="metrotvnews_data" >
								<label for="MetroTV">Metro TV</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">N</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">O</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">P</div>
							<div class="media-box-cont">
								<input id="PojokSatu" type="checkbox" name="media[]" value="pojoksatu_data" >
								<label for="PojokSatu">Pojok Satu</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">Q</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">R</div>
							<div class="media-box-cont">
								<input id="Republika" type="checkbox" name="media[]" value="republika_data" >
								<label for="Republika">Republika</label>
							</div>
							<div class="media-box-cont">
								<input id="Rima" type="checkbox" name="media[]" value="rimanews_data" >
								<label for="Rima">Rima</label>
							</div>
							<div class="media-box-cont">
								<input id="RMOL" type="checkbox" name="media[]" value="rmol_data" >
								<label for="RMOL">RMOL</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">S</div>
							<div class="media-box-cont">
								<input id="Sindo" type="checkbox" name="media[]" value="sindonews_data" >
								<label for="Sindo">Sindo</label>
							</div>
							<div class="media-box-cont">
								<input id="Suara" type="checkbox" name="media[]" value="suara_data" >
								<label for="Suara">Suara</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">T</div>
							<div class="media-box-cont">
								<input id="Tempo" type="checkbox" name="media[]" value="tempo_data" >
								<label for="Tempo">Tempo</label>
							</div>
							<div class="media-box-cont">
								<input id="TeropongSenayan" type="checkbox" name="media[]" value="teropongsenayan_data" >
								<label for="TeropongSenayan">Teropong Senayan</label>
							</div>
							<div class="media-box-cont">
								<input id="Tribun" type="checkbox" name="media[]" value="tribunnews_data" >
								<label for="Tribun">Tribun</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">U</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">V</div>
							<div class="media-box-cont">
								<input id="Viva" type="checkbox" name="media[]" value="viva_data" >
								<label for="Viva">Viva</label>
							</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">W</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">X</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">Y</div>
						</div>
						<div class="media-box">
							<div class="media-box-img">Z</div>
						</div>
					</div>
					<div id="btn-generate" class="btn btn-orange btn-lg-rnd" onclick="search()">Generate Report</div>
				</form>
			</div>
			
