<?php
$_title = "Top sức mạnh";
include_once 'head.php';
include_once 'config.php';

$alert = isset($alert) ? $alert : null;
?>
<style>
    .list-group-item.active {
        background-color: #f44336;
        border-color: #f44336;
    }

    a {
        text-decoration: none;
    }

    .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
        background-color: #f44336;
    }
</style>
 <section class="text-center container">
<h2 class="fw-light">TOP SỨC MẠNH</h2>
</section>
<main class="c-layout-page custom-slide mt-header">
<div class="container py-3">
    <div class="row">
        <div class="col-md-3 pb-3 pt-2">
            <div class="list-group d-none d-sm-block">
                <a href="index.php" class="list-group-item list-group-item-action ">
                    <i class="fas fa-user me-2"></i> Trang Chủ
                </a>
                <a href="Top-nap.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-coins me-2"></i> Top Nạp
                </a>
                <a href="Top-suc-manh.php" class="list-group-item list-group-item-action active">
                    <i class="fa fa-trophy me-2"></i> Sức Mạnh
                </a>
                <a href="#" class="list-group-item list-group-item-action ">
                    <i class="fas fa-sign-out-alt me-2"></i> Top Sự Kiện
                </a>
            </div>
        </div>

			<div class="col-md-9 pb-3 pt-2">
<div class="card-body">
<table class="table table-bordered blueTable my-table">
					<thead>
						<tr>
							<th>TOP</th>
							<th>Nhân vật</th>
							<th>Sức Mạnh</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$countTop=1;
						$data = mysqli_query($config,"SELECT name, JSON_EXTRACT(data_point, '$[1]') AS second_value
FROM player
ORDER BY CAST(JSON_EXTRACT(data_point, '$[1]') AS UNSIGNED) DESC
LIMIT 100;
");
						while ($row = mysqli_fetch_array($data)) {
						?>

							<tr class="top_<?php echo $countTop; ?>">
								<td><?php echo $countTop++; ?></td>
								<td><?php echo htmlspecialchars($row['name']); ?></td>
								<td><?php echo htmlspecialchars($row['second_value']); ?></td>
							</tr>

						<?php }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
						</div>
</main>

<?php
include_once 'end.php';
?>