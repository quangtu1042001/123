<?php
include '../header.php';
    include '../config.php';
        if(isset($_GET['id'])){
             $id = $_GET['id'];
             
        }
?>

<?php
$id = $_GET['id'];
$sql = "select * from db_employees where emp_id = $id";
$res = mysqli_query($conn, $sql);
if ($res == true) {
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $emp_name = $row['emp_name'];
        $emp_position = $row['emp_position'];
        $emp_email = $row['emp_email'];
        $emp_mobile = $row['emp_mobile'];
        $office_id = $row['office_id'];
    }
    else 
    {
        header("location:index.php");
    }
}

?>

<?php
if(isset($_POST["edit"])){
    $emp_name = $row['emp_name'];
        $emp_position = $_POST['emp_position'];
        $emp_email = $_POST['emp_email'];
        $emp_mobile = $_POST['emp_mobile'];
        $office_id = $_POST['office'];
        if($emp_name != "" && $emp_position != "" &&$emp_email !="" && $emp_mobile !="" ){
            $sql = "UPDATE `db_employees` SET `emp_name`='$emp_name',`emp_position`='$emp_position',`emp_mobile`='$emp_mobile',`emp_email`='$emp_email' ,`office_id` = '$office_id' WHERE emp_id = $id";
            $result = mysqli_query($conn,$sql);
            header("location:index.php");
        }
}

?>

<main class="container">
        <h2>Thêm thông tin danh bạ Nhân viên</h2>
        <form action="" method="post">
        
        
    <div class="mb-3">
            <label for="empName" class="form-label">Tên nhân viên</label>
            <input type="text" class="form-control" name="emp_name" value="<?php echo $emp_name; ?>" >
        </div>
        <div class="mb-3">
            <label for="empPosition" class="form-label">Chức vụ</label>
            <input type="text" class="form-control" name="emp_position" value="<?php echo $emp_position; ?>">
        </div>
        <div class="mb-3">
            <label for="empEmail" class="form-label">Email</label>
            <input type="text" class="form-control" name="emp_email" value="<?php echo $emp_email; ?>">
        </div>
        <div class="mb-3">
            <label for="empMobile" class="form-label">Số điện thoại</label>
            <input type="tel" class="form-control" name="emp_mobile" value="<?php echo $emp_mobile; ?>">
        </div>
        <div class="mb-3">
            <label for="empMobile" class="col-sm-2 col-form-label">Tên cơ quan</label>
            <div class="col-sm-10">
                <select name="office" id="office">
                    <!-- Lấy dữ liệu từ bảng Office -->
                    <?php
                            $sql = "SELECT * FROM db_office ";
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)){
                                while($row=mysqli_fetch_assoc($result)){                      
                                   echo '<option value="'.$row['office_id'].'">'.$row['office_name'].'</option>';                                 
                                }
                            }
                        ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="edit" value="edit">Sửa</button>
    </form>
    </main>
    <?php
    include '../footer.php';
?>




