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
													<span>QUẢN LÝ ITEMS</span>
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
                    <th>vnd</th>
                    <th>icon</th>
                    <th>slot</th>
                    <th>options</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
            $stt = 0;
             $result_xem_item = $conn->query("SELECT * FROM items_web");
if ($result_xem_item->num_rows > 0) {
    while ($row_xem_item = $result_xem_item->fetch_assoc()) {
      $stt ++;
      $items = sql::Select("item_template" , "id" , $row_xem_item['items']);
      $option = json_decode($row_xem_item['options'] , true);
      $opName = "";
      foreach ($option as $data) {
         $opName .= str_replace("#" , $data[1] ,sql::Select("item_option_template" , "id" , $data[0])['NAME']) . "</br>";
      }
      echo"<tr>
                    <td>".$stt."</td>
                    <td>".number_format($row_xem_item["vnd"], 0, '.', ',')."</td>
                                        <td><img style='width:50px' src='".until::domain('Assets/Icon/'.$items['icon_id'].'.png')."'/></td>
                    <td>".$row_xem_item["slot"]."</td>
                    <td>".$opName."</td>
                    <td><a href='".until::domain("ADMIN/ITEMS/EDIT/".$row_xem_item["id"])."'>Sửa |</a> <a href='".until::domain("ADMIN/ITEMS/DELETE/".$row_xem_item["id"])."'> xoá</a></td>";
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