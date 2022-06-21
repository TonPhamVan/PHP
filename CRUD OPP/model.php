<?php
// db
class Model {
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'ignisit';
    private $conn;

    // hàm tạo
    function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, 
        $this->password, $this->dbname);
        if($this->conn->connect_error) {
            echo 'Connection Failed';
        } else {
            // echo 'connected';
            return $this->conn;
        }
    }
    // định nghĩa cho insert records
    public function insertRecord($post) {
        $name = $post['name'];
        $email = $post['email'];
        $sql = "INSERT INTO users(name,email) VALUES ('$name','$email')";
        $result = $this->conn->query($sql);
        if ($result) {
            header('location:index.php?msg=ins');
        }else {
            echo "Error ".$sql. "<br>" . $this->conn->error;
        }
    }
     // định nghĩa cho search display records
    public function displayRecordSearch($get) {
        $sql = "SELECT * FROM users WHERE name LIKE '%".$get."%'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result -> fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    // định nghĩa cho display records
    public function displayRecord() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result -> fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
     // định nghĩa cho display records từng id
    public function displayRecordById($editid){
        $sql = "SELECT*FROM users WHERE id = '$editid'";
        $result = $this->conn->query($sql);
        if ($result->num_rows==1) {
            $row = $result -> fetch_assoc();
            return $row;
        }
    }
     // định nghĩa cho update records
    public function updateRecord($post) {
        $name = $post['name'];
        $email = $post['email'];
        $editid = $post['hid'];
        $sql = "UPDATE users SET name='$name', email='$email' WHERE id = '$editid'";
        $result = $this->conn->query($sql);
        if ($result) {
            header('location:index.php?msg=ups');
        }else {
            echo "Error ".$sql. "<br>" . $this->conn->error;
        }
    }
     // định nghĩa cho delete records
    public function deleteRecord($delid) {
        $sql = "DELETE FROM users WHERE id = '$delid'";
        $result = $this->conn->query($sql);
        if($result) {
            header('location:index.php?msg=del');
        } else {
            echo "Error".$sql."<br>".$this->conn->error;
        }
    }
}//class close

?>