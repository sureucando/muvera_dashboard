			<!-- Footer Bar -->
			<div id="footer">
				<div class="footer-container">
					<div class="footer-left">
						<a href="#">About MUVERA</a>
						<a href="#">IOU & Privacy</a>
						<a href="#">Help</a>
					</div>
					<div class="footer-right">
						powered by MUVERA
					</div>
				</div>
			</div>
		</div>

		<!-- Aditional Div's -->
		<!-- Loading Div -->
		<div id="loading"></div>

		<script src="assets/js/jquery-1.12.3.js"></script>
		<script src="assets/js/jquery-ui.js"></script>
		<script src="assets/js/assets.js"></script>
		<script src="https://d3js.org/d3.v3.min.js"></script>
		<script src="assets/js/jspdf.js"></script> 
		<script src="assets/js/addimage.js"></script> 
		<script src="assets/js/FileSaver.js"></script> 
		<script src="assets/js/png.js"></script> 
		<script src="assets/js/zlib.js"></script> 
		<script src="assets/js/xepOnline.jqPlugin.js"></script> 
		<script src="assets/js/png_support.js"></script> 
		<script type="text/javascript"> 
			function search(){
				var valid = validateForm();
				if (valid){
					$('#loading').show();
					var url = "<?php echo base_url('query/ajax_refresh')?>";
					$.ajax({
						url: url,
						type : "POST",
						data :$('#search-form').serialize(),
						dataType : "JSON",
						success : function(data){
							if (data.status){
	           					//alert(data.message+", Keyword pertama: "+data.word1+", Keyword kedua: "+data.word2+", Keyword ketiga: "+data.word3+", Keyword keempat: "+data.word4+", Keyword kelima: "+data.word5+", Waktu Mulai: "+data.datefrom+" "+data.timefrom+", Waktu Selesai: "+data.dateto+" "+data.timeto+", List Media: "+data.media);
               					var countMedia = data.count;                  
               					document.getElementById('chart_count_report').innerHTML  = "";
               					for(var i=0;i<countMedia.length;i++){
               						document.getElementById('chart_count_report').innerHTML += '<tr><td>'.concat(countMedia[i].tablename,'</td><td>', countMedia[i].total, '</td></tr>');
               					}
               					showPieChart(data.count);
               				}
               				$('.section-report').show();
               				$('.content-container').animate({height:'1700px'}, 'slow');
               				$('#loading').hide();
               				var y = $('.content').scrollTop();
               				$('.content').animate({scrollTop: y + 725}, 'slow');
               			},
               			error: function (jqXHR, textStatus, errorThrown)
               			{
               				alert('Error !');
               				$('#loading').toggle();
               			}
               		});
            	//$('.section-report').show();
	            //$('.content-container').animate({height:'1700px'}, 'slow');
		        //$(this).attr('style', 'pointer-events: none;');
		        //$(this).addClass('selected');
		        }
		    }
		</script>
	</body>
</html>