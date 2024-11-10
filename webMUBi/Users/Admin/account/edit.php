<?php
include '../head.php';
   $row = sql::Select("account","id",$_GET['id']);
   if(!$row){
      echo'<script> window.location.href = "'.until::domain("ADMIN/ACCOUNT").'" </script>';
      die();
   }
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    sql::update("account" , "username" , $_POST['username'] , "id" , $_GET['id']);
    sql::update("account" , "password" , $_POST['password'] , "id" , $_GET['id']);
    sql::update("account" , "vnd" , $_POST['vnd'] , "id" , $_GET['id']);
    sql::update("account" , "ban" , $_POST['ban'] , "id" , $_GET['id']);
      echo'
 <script>
alert("Chỉnh Sửa account Thành Công");
setTimeout(function() {
         window.location.href = "'.until::domain("ADMIN/ACCOUNT").'"
        }, 2000)
</script>
   ';
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
													<span>CHỈNH SỬA ACCOUNT</span>
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
													<p class="text-primary">Tài Khoản.</p>		
   <input value="<?php echo$row['username'];?>" name="username" class="form-control fs-18 font-weight-bold d-block" placeholder="Tài Khoản">
    <p class="text-primary">Mật Khẩu</p>
   </br>
   <input value="<?php echo$row['password'];?>" name="password" class="form-control fs-18 font-weight-bold d-block" placeholder="Mật Khẩu">
   </br>
    <p class="text-primary">Vnd</p>
   <input value="<?php echo$row['vnd'];?>" type="number" name="vnd" class="form-control fs-18 font-weight-bold d-block" placeholder="vnd">
   </br>
      <p class="text-primary">Is Ban</p>
    <div class="form-group">
                <select class="form-control" id="ban" name="ban" required>
                <?php 
                if($row['ban'] == 0){
                   echo' <option value="0">Hoạt Động</option>
                    <option value="1">Ban</option>';
                    } else {
                    echo'<option value="1">Ban</option>
                    <option value="0">Hoạt Động</option>';
                    }
                    ?>
                </select>
                </br>
   <button class="btn btn-primary btn-lg font-weight-bold fs-18">Đồng Ý</button>
   
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
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="../../index.htm" target="_blank">DexignLab</a> 2021</p>
            </div>
        </div>

</body>
</html>