<?php
// include model.php
include 'model.php';

$obj = new Model();
// print_r($obj);

// insert records
if(isset($_POST['submit'])) {
    $obj->insertRecord($_POST);
}

// update records
if(isset($_POST['update'])) {
    $obj->updateRecord($_POST);
}

//delete records
if(isset($_GET['deleteid'])) {
    $delid = $_GET['deleteid'];
    $obj->deleteRecord($delid);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>CRUD OPP</title>
</head>
<body>
    
    <div class="container">
        <h2 class="text-center text-info">CRUD OPP </h2>
        <!-- xác nhận đã insert -->
        <?php
            if(isset($_GET['msg']) && $_GET['msg']=='ins') {
                ?>
                <div class="alert alert-primary" role="alert">
                    Record Inserted Successfully..!
                </div>
            <?php
            };
        ?>
        <!-- xác nhận đã update -->
        <?php
            if(isset($_GET['msg']) && $_GET['msg']=='ups') {
                ?>
                <div class="alert alert-primary" role="alert">
                    Record Updated Successfully..!
                </div>
            <?php
            };
        ?>
        <!-- xác nhận đã delete -->
        <?php
            if(isset($_GET['msg']) && $_GET['msg']=='del') {
                ?>
                <div class="alert alert-primary" role="alert">
                    Record Deleted Successfully..!
                </div>
            <?php
            };
        ?>
        <!-- close xác nhận  -->
        <?php
            if(isset($_GET['editid'])) {
                $editid = $_GET['editid'];
                $myrecord = $obj-> displayRecordById($editid);
            ?>
            <!-- update -->
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="enter your name" class="form-control"
                        value="<?php echo $myrecord['name'];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" placeholder="enter your email" class="form-control"
                        value="<?php echo $myrecord['email'];?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="hid" value="<?php echo $myrecord['id'];?>">
                        <input type="submit" name="update" value="Update" class="btn btn-info">
                    </div>
                </form>

            <?php
            }else {
        ?>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="enter your name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" placeholder="enter your email" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
        </form>
        <?php } // else close ?>

        <!-- tìm kiếm -->
        <form action="" method="get">
            <input type="text" name="s" class="form-control" 
            style="margin: 0 0 10px 0;" placeholder="tìm kiếm theo tên">
        </form>
        <!--close tìm kiếm -->

        <h4 class="text-center text-danger">Display Records</h4>
        <table class="table table-bordered">
            <tr class="bg-primary text-center">
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            // display record or display record search
            if(isset($_GET['s'])) {
                $data= $obj->displayRecordSearch($_GET['s']);
            } else {
                $data = $obj->displayRecord();
            }
            
            $sno = 1;
            foreach ($data as $value) {
                ?>
                <tr class="text-center">
                    <td><?php echo $sno++;?></td>
                    <td><?php echo $value['name'];?></td>
                    <td><?php echo $value['email'];?></td>
                    <td>
                        <a href="index.php?editid=<?php echo $value['id'];?>" class="btn btn-info">Edit</a>
                        <a href="index.php?deleteid=<?php echo $value['id'];?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>
</html>