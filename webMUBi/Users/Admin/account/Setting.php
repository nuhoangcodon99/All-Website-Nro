<?php
include '../head.php';
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $target_dir = "../../../Assets/update/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    sql::update("Setting" , "img" , $_FILES["fileToUpload"]["name"] , "id" , 0);
                    sql::update("Setting" , "name" , $_POST['name'] , "id" , 0);
                    sql::update("Setting" , "vnd" , $_POST['vnd'] , "id" , 0);
                            echo'
 <script>
alert("Cập nhập thành công");
setTimeout(function() {
    location.href = ""
        }, 2000)
</script>'; 
                    
                } else {
                       echo'
 <script>
alert("Cập nhập thành công");
setTimeout(function() {
    location.href = ""
        }, 2000)
</script>';
                    sql::update("Setting" , "name" , $_POST['name'] , "id" , 0);
                    sql::update("Setting" , "vnd" , $_POST['vnd'] , "id" , 0);
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
													<span>Settings</span>
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
													<form method="POST" enctype="multipart/form-data">
													<p class="text-primary">Tên Web.</p>	
   <input value = "<?php echo sql::Select("Setting","id",0)['name']; ?>"name="name" class="form-control fs-18 font-weight-bold d-block" placeholder="Nhập Tên Sever">
   </br>
   <p class="text-primary">Vnđ Khi Tạo Acc</p>
   <input type="number" value = "<?php echo sql::Select("Setting","id",0)['vnd']; ?>" name="vnd" class="form-control fs-18 font-weight-bold d-block" placeholder="Vnd khi tạo tài khoản">
   </br>
      

            <p class="text-primary">Nếu để trống thì sử dụng img cũ</p>
           <input type="file" class="form-control"  id="fileToUpload" name="fileToUpload" >
   </br>
   <button class="btn btn-primary btn-lg font-weight-bold fs-18">Cập Nhập</button>
   
														</form>	
														</div>
																						</div>
												</div>
											</div>			
											
	
												</div>
												
												<div class="col-xl-6 col-sm-6">
												<div class="card">
													<div class="card-body d-flex px-4  justify-content-between">
													<p class="text-primary">Logo Hiện Tại.</p>
		<img style= "width : 100px" src="<?php echo until::domain("Assets/update/".sql::Select("Setting","id",0)['img']); ?>" class="img-fluid d-inline-block" alt="Logo">
   		<div>
											
											
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
            </div>
        </div>
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2021</p>
            </div>
        </div>
</body>
</html>