<?php
// nhan du lieu tu form
$ht = $_POST['hoten'];
$masv = $_POST['masv'];
$lop = $_POST['lop'];

//ket noi csdl
require_once 'connect.php';

//viet lenh sql de them du lieu
$addsql = "INSERT INTO sinhvien
(masv, hoten, lop) VALUES ('$masv', '$ht', '$lop')";
// echo $themsql; exit;

// thuc thi cau lẹnh them
if (mysqli_query($conn, $addsql) ) {
    header("Location: read.php");
}
?>
