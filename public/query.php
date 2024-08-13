<?php
class Query {
    // Hàm thêm mới dữ liệu
    public function ThemMoi($table, $fields, $data) {
        // Kết nối đến cơ sở dữ liệu
        $conn = new mysqli("localhost", "root", "", "laravel-jobsdb");

        // // Kiểm tra kết nối
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }

        // Xây dựng câu SQL INSERT
        $fieldList = implode(", ", $fields);
        $valueList = implode("', '", $data);

        $sql = "INSERT INTO $table ($fieldList) VALUES ('$valueList')";

        // Thực hiện truy vấn SQL
        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
}
?>