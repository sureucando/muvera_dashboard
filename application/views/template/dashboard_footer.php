					<!-- Footer Bar -->
					<div id="footer">
						<div class="footer-container">
							<div class="footer-left">
								<a href="#">About MUVERA</a>
								<a href="#">IOU & Privacy</a>
								<a href="">Help</a>
							</div>
							<div class="footer-right">
								powered by MUVERA
							</div>
						</div>
					</div>
				</div>

				<script src="assets/js/jquery-1.12.3.js"></script>
				<script src="assets/js/jquery-ui.js"></script>
				<script src="assets/js/assets.js"></script>
				<script type="text/javascript"> 
					function search(){
						var url = "<?php echo base_url('query/ajax_refresh')?>";
						$.ajax({
							url: url,
							type : "POST",
							data :$('#search-form').serialize(),
							dataType : "JSON",
							success : function(data){
								if (data.status){
									alert(data.message+", keyword pertama: "+data.word1)
								}
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error !');
							}
						});
					}
				</script>
</body>
</html>