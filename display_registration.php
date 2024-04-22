<?php 
    $conn = new mysqli('localhost','root','','pka_s');
    if ($conn->connect_error) {
        die("kết nối thất bại." . $conn->connect_error);
    }
    $sql = "SELECT `sinhvien`.`MSSV`, `sinhvien`.`HoTen`, `dangky`.`Ky`, `dangky`.`MaMH`
            FROM `sinhvien` 
            LEFT JOIN `dangky` ON `dangky`.`MSSV` = `sinhvien`.`MSSV`  ";

    $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị đăng ký môn học pka</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Danh sách sinh viên đăng ký môn học</h1>
    <?php 
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>MSSV</th><th>Họ Tên</th><th>Kỳ</th><th>Đăng Ký</th></tr>";

        while ($row = $result->fetch_assoc()) {
            
            echo "<tr>";
            echo "<td>" . $row['MSSV'] . "</td>";
            echo "<td>" . $row['HoTen'] . "</td>";
            echo "<td>" . $row['Ky'] . "</td>";
            echo "<td>" . $row['MaMH'] . "</td>";
            echo "</tr>";

        }
        echo "</table>";
        
    }else {
        echo "No student course registrations found.";
    }
    ?>
</body>
</html>