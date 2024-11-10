<?php
include '../head.php';
   $row = sql::Select("items_web" , "id",$_GET['id']);
   if(!$row){
      echo'<script> window.location.href = "'.until::domain("ADMIN/ACCOUNT").'" </script>';
      die();
   }
   $option = json_decode($row['options'] , true);
      $opData = "";
      foreach ($option as $data) {
         $opData .= 'i'.$data[0].'v'.$data[1];
      }
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $optionV = $_POST['options'];
    $data = [];
    preg_match_all('/i(\d+)v(\d+)/', $optionV, $matches);
    for ($i = 0; $i < count($matches[0]); $i++) {
      $data[] = [(int)$matches[1][$i],(int)$matches[2][$i]];
    }
    $options = json_encode($data , true);
    $vnd = $_POST['vnd'];
    $items = $_POST['items'];
    $slot = $_POST['slot'];
    sql::update("items_web" , "vnd" , $vnd , "id" , $_GET['id']);
    sql::update("items_web" , "items" , $items , "id" , $_GET['id']);
    sql::update("items_web" , "slot" , $slot , "id" , $_GET['id']);
    sql::update("items_web" , "options" , $options , "id" , $_GET['id']);
      echo'
 <script>
alert("Chỉnh Sửa items Thành Công");
setTimeout(function() {
         window.location.href = "'.until::domain("ADMIN/ITEMS").'"
        }, 2000)
</script>
   ';
   }
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
													<span>ĐĂNG BÁN ITEM</span>
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
<p class="text-primary">Số tiền</p>
   <input type="number" value="<?php echo$row['vnd'];?>" name="vnd" class="form-control fs-18 font-weight-bold d-block" placeholder="vnd">
    <p class="text-primary">Id Items</p>
   <input value="<?php echo$row['items'];?>" type="number" id="items" name="items" class="form-control fs-18 font-weight-bold d-block" placeholder="id item" oninput="getItems()">
   <p id="itemName"></p>
   <p class="text-primary">số lượng</p>
   <input value="<?php echo$row['slot'];?>" type="number" name="slot" class="form-control fs-18 font-weight-bold d-block" placeholder="slot">
    <p class="text-primary">Options</p>
   <input value="<?php echo$opData;?>" name="options" id="options" class="form-control fs-18 font-weight-bold d-block" placeholder="i id v param vd : i47v50i70v10" oninput="getOptions()">
   <p id="optionsData"></p>
                </br>
   <button class="btn btn-primary btn-lg font-weight-bold fs-18">Đồng Ý</button>
       </form>
      <script>
         getItems();
         getOptions();
         async function getItems() {
            var uid = document.getElementById("items").value;
            let status = JSON.parse(await _post('<?php echo until::domain("Api/ITEMS");?>' , {"uid" : uid , "type" : "itemInfo"}));
            if (status.error == 0){
               if (status.data.error_code == 0){
                  document.getElementById("itemName").innerHTML = "name: " + JSON.parse(status.data.items)['NAME'];
               } else {
                  document.getElementById("itemName").innerHTML = "error: " + status.data.error;
               }
            } else {
               document.getElementById("itemName").innerHTML = "error: chưa phát hiện";
            }
         }
         async function getOptions() {
             var options = document.getElementById("options").value;
             const pattern = /i(\d+)v(\d+)/g;
             const result = [];
             let match;
             while ((match = pattern.
             exec(options)) !== null) {
             result.push([parseInt(match[1]),
             parseInt(match[2])])}
             if (result.length > 0){
                 var options_ = "";
                 for (let i = 0; i < result.length; i++) {
                     let value1 = result[i][0];
                     let value2 = result[i][1];
                     let status = JSON.parse(await _post('<?php echo until::domain("Api/ITEMS");?>' , {"uid" : value1 , "type" : "optiInfo"}));
                     if (status.error == 0 && status.data.error_code == 0){
                        options_ += `${value1} => ${JSON.parse(status.data.items)['NAME'].replace("#" , value2)} </br>`;
                     } else {
                        options_ += `${value1} => error </br>`;
                     }
                  }
                 document.getElementById("optionsData").innerHTML = options_;
             } else {
                 document.getElementById("optionsData").innerHTML = "error: ****";
             }
             
         }
         </script>
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