<?php
// lay du lieu can sua
$svid = $_GET['sid'];

//ket noi
require_once 'connect.php';

//thuc thi sql de lay thong tin ve sinh vien co id = $svid
$editsql = "SELECT * FROM sinhvien WHERE id=$svid";
$result = mysqli_query($conn, $editsql);
$row = mysqli_fetch_assoc($result);
?>
<!-- hien thi thong tin len form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them sinh vien</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container" style="background-color: #9ccc; border-radius: 5px;">
        <h1 style="text-align: center;">Update sinh vien</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="sid" value="<?php echo $svid;?>" id="">
            <div class="form-group">
                <label for="hoten">Ho ten</label>
                <input type="text" id="hoten" class="form-control" name="hoten" value="<?php echo $row['hoten']?>">
            </div>
            <div class="form-group">
                <label for="masv">Ma sinh vien</label>
                <input type="text" name="masv" id="masv" class="form-control" value="<?php echo $row['masv']?>">
            </div>
            <div class="form-group">
                <label for="lop">Lop</label>
                <input type="text" name="lop" id="lop" class="form-control" value="<?php echo $row['lop']?>">
            </div>
            <button class="btn btn-primary" style="margin: 0 0 10px 0;">Update sinh vien</button>
        </form>
    </div>
</body>
</html>