<?php
// nhan du lieu tu form
$ht = $_POST['hoten'];
$masv = $_POST['masv'];
$lop = $_POST['lop'];
$svid = $_POST['sid'];
//ket noi csdl
require_once 'connect.php';

//viet lenh sql de update du lieu
$updatesql = "UPDATE sinhvien SET masv='$masv', hoten='$ht', lop='$lop' 
WHERE id=$svid";

// thuc thi cau lẹnh them
if (mysqli_query($conn, $updatesql) ) {
    header("Location: read.php");
}
?>