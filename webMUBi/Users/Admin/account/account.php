<?php
include '../head.php';
?>
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
													<span>QUẢN LÝ TÀI KHOẢN</span>
									</div>
												<div class="col-xl-5 col-sm-6">
									</div>
											</div>
										</div>
									</div>
									



<div class="col-xl-12 col-sm-12">
    <div class="card">
        <div class="card-body d-flex px-4 justify-content-between">
            <div class="w-100">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr class="text-left text-base">
                <tr class="text-left text-base">
                    <th>#ID</th>
                    <th>username</th>
                    <th>password</th>
                    <th>vnd</th>
                    <th>status</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
            $stt = 0;
             $result_xem_item = $conn->query("SELECT * FROM account");
if ($result_xem_item->num_rows > 0) {
    while ($row_xem_item = $result_xem_item->fetch_assoc()) {
    $stt ++;
    if($row_xem_item['ban'] == 0){
      $status = "hoạt động";
    } else {
      $status = "ban";
    }
      echo"<tr>
                    <td>".$stt."</td>
                    <td>".$row_xem_item['username']."</td>
                    <td>".md5($row_xem_item['password'])."</td>
                    <td>".number_format($row_xem_item["vnd"], 0, '.', ',')."</td>
                    <td>".$status."</td>
                    <td><a href='".until::domain("ADMIN/EDIT/".$row_xem_item["id"])."'>Sửa |</a> <a href='".until::domain("ADMIN/DELETE/".$row_xem_item["id"])."'> xoá</a></td>";
             }
          }
            ?>
            </tbody>
        </table>											</div>
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
	</div>
</body>
</html>