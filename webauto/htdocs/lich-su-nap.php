<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lịch sử nạp thẻ</title>
</head>
<body>
    <?php
        include('connect.php');

        // Truy vấn cơ sở dữ liệu để lấy thông tin về lịch sử nạp thẻ
        $sql = "SELECT * FROM trans_log";
        $result = mysqli_query($conn, $sql);

        // Kiểm tra kết quả
        if (mysqli_num_rows($result) > 0) {
            // Hiển thị bảng chứa thông tin về lịch sử nạp thẻ
            echo "<table>";
            echo "<tr><th>Mã thẻ|</th><th>Số seri|</th><th>Mệnh giá|</th><th>Nhà mạng|</th><th>Thời gian</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {       
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Không có thông tin nạp thẻ.";
        }

        // Ngắt kết nối
        mysqli_close($conn);
    ?>
</body>
</html>
