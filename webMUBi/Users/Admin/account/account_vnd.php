<?php
include '../head.php';
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(!empty($_POST['name']) && !empty($_POST['vnd'])){
   $row = sql::Select("account","username",$_POST['name']);
   if($row){
  sql::update("account" , "vnd" , $row['vnd'] + $_POST['vnd'] , "id" , $row['id']);
  sql::update("account" , "tongnap" , $row['tongnap'] + $_POST['tongnap'] , "id" , $row['id']);
echo'
 <script>
alert("Cộng vnd thành công");
</script>';
   } else {
           echo'
 <script>
alert("Tài Khoản không tồn tại");
</script>';
         }
             }else{
         echo'
 <script>
alert("vui lòng nhập đầy đủ thông tin!");
</script>
   ';
         }
   }
?>

        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-6">
								<div class="row">
									<div class="col-xl-12">
										<div class="card tryal-gradient">
											<div class="card-body tryal row">
												<div class="col-xl-7 col-sm-6">
													<h2>DASHBOARD</h2>
													<span>CỘNG VNĐ</span>
									</div>
												<div class="col-xl-5 col-sm-6">
									</div>
											</div>
										</div>
									</div>
									

											<div class="col-xl-6 col-sm-6">
												<div class="card">
													<div class="card-body d-flex px-4  justify-content-between">
														<div>
													<form method="POST">					
   <input name="name" class="form-control fs-18 font-weight-bold d-block" placeholder="Nhập Tên Tài Khoản">
   </br>
   <input type="number" name="vnd" class="form-control fs-18 font-weight-bold d-block" placeholder="Số Lượng Vnđ">
   </br>
   <button class="btn btn-primary btn-lg font-weight-bold fs-18">Cộng Tiền</button>
   
														</form>	
														</div>
																						</div>
												</div>
											</div>			
											

											
											
										</div>
										
									</div>
		</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		


		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>
	<!-- Dashboard 1 -->
	<script src="js/dashboard/dashboard-1.js"></script>
	
	<script src="vendor/owl-carousel/owl.carousel.js"></script>
	
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
	<script>
		function cardsCenter()
		{
			
			/*  testimonial one function by = owl.carousel.js */
			
	
			
			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: true,
				navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					800:{
						items:1
					},			
					991:{
						items:1
					},
					1200:{
						items:1
					},
					1600:{
						items:1
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000); 
		});
		
	</script>

</body>
</html>