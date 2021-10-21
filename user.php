<?php
    include 'header.php';
?>

    <main>
        <!-- Hiển thị BẢNG DỮ LIỆU DANH BẠ CÁ NHÂN -->
        <!-- Kết nối tới Server, truy vấn dữ liệu (SELECT) từ Bảng db_employees -->
        <!-- Quy trình 4 bước -->:
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã NV</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số di động</th>
                    <th scope="col">Cơ quan</th>
                </tr>
            </thead>
            <tbody>
                <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
                <?php
                    // Quy trình 4 bước
                    // Bước 01: Đã tạo sẵn, gọi lại thôi
                    include 'config.php';
                    // Bước 02: Thực hiện TRUY VẤN
                    $sql = "SELECT e.emp_id,e.emp_name,e.emp_position,e.emp_email,e.emp_mobile, o.office_name FROM db_employees e, db_office o
                    WHERE e.office_id = o.office_id";
                    $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result
                    // Bước 03: Phân tích và xử lý kết quả
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            echo '<tr>';
                            echo '<th scope="row">'.$row['emp_id'].'</th>';
                            echo '<td>'.$row['emp_name'].'</td>';
                            echo '<td>'.$row['emp_position'].'</td>';
                            echo '<td>'.$row['emp_email'].'</td>';
                            echo '<td>'.$row['emp_mobile'].'</td>';
                            echo '<td>'.$row['office_name'].'</td>';
                            echo '</tr>';
                        }
                    }
                ?>
                
                <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
            </tbody>
            </table>
    </main>
    
<?php
    include 'footer.php';
?>