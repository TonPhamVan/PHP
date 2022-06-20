<?php
// lay du lieu can xoa
$svid = $_GET['sid'];

//ket noi
require_once 'connect.php';

//cau lenh sql
$deletesql = "DELETE FROM sinhvien WHERE id=$svid ";

//thuc thi cau lenh
mysqli_query($conn, $deletesql);
// echo"<h1>Xoa thanh cong</h1>";
// tra ve trang danh sach
header("Location: read.php");
?>
