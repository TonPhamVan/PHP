<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liet ke danh sach sinh vien</title>
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
        <h1 style="text-align: center;">Danh sach sinh vien</h1>
        <!-- <a href="add.html" >
            <button type="button" style="margin:0 0 10px 0;" class="btn btn-success">
                add sinh vien
            </button>
        </a> -->
        <!-- form them sinh vien -->
        <button type="button" style="margin:0 0 10px 0;" class="btn btn-success" data-toggle="modal" data-target="#myModal">
            Add sinh vien
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add sinh vien</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="add.php" method="post">
                    <div class="form-group">
                        <label for="hoten">Ho ten</label>
                        <input type="text" id="hoten" class="form-control" name="hoten">
                    </div>
                    <div class="form-group">
                        <label for="masv">Ma sinh vien</label>
                        <input type="text" name="masv" id="masv" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lop">Lop</label>
                        <input type="text" name="lop" id="lop" class="form-control">
                    </div>
                    <button class="btn btn-success">Them sinh vien</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
        </div>
        <!-- modal them sinh vien -->
        <!-- tìm kiếm -->
        <form action="" method="get">
            <input type="text" name="s" class="form-control" 
            style="margin: 0 0 10px 0;" placeholder="tìm kiếm theo tên">
        </form>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Ma sinh vien</th>
                    <th>Ho ten</th>
                    <th>Lop</th>
                    <th>Hanh dong</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // ket noi
                require_once 'connect.php';

                //cau lenh
                if(isset($_GET['s']) && $_GET['s'] != '') {
                    $readsql = "SELECT*FROM sinhvien WHERE hoten LIKE '%".$_GET['s']."%' ";
                } else {
                    $readsql = "SELECT*FROM sinhvien";
                }
                
                //thuc thi cau lenh
                $result = mysqli_query($conn, $readsql);
                
                //duyet qua rerult va in ra
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['masv'] ?></td>
                        <td><?php echo $row['hoten'] ?></td>
                        <td><?php echo $row['lop'] ?></td>
                        <td>
                            <a style="text-decoration:none;" href="edit.php?sid=<?php echo $row['id'] ?>">
                                <button type="button" class="btn btn-warning">Update</button>
                            </a> 
                            <a onclick="return confirm('ban co muon xoa k ?');" href="delete.php?sid=<?php echo $row['id'] ?>">
                                <button type="button" class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>