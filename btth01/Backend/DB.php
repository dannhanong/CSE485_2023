<?php
class DB
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    // Hàm khởi tạo
    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "BTTH01_CSE485";
    }

    // Phương thức để thiết lập kết nối
    public function connect()
    {
        if ($this->conn && $this->conn->ping()) {
            return;
        }

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Kiểm tra kết nối
        if ($this->conn->connect_error) {
            throw new Exception("Kết nối không thành công: " . $this->conn->connect_error);
        }
    }

    // Phương thức để đóng kết nối
    public function close()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    // Phương thức để lấy đối tượng kết nối
    public function getConnection()
    {
        return $this->conn;
    }

    // Phương thức thực hiện truy vấn thêm dữ liệu
    public function insertData($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", $data) . "'";
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        if (!$this->conn->query($sql)) {
            throw new Exception("Lỗi thêm dữ liệu: " . $this->conn->error);
        }
    }

    // Phương thức thực hiện truy vấn sửa dữ liệu
    public function updateData($table, $data, $condition)
    {
        $setClause = "";
        foreach ($data as $key => $value) {
            $setClause .= "$key = '$value', ";
        }
        $setClause = rtrim($setClause, ", ");
        $sql = "UPDATE $table SET $setClause WHERE $condition";

        if (!$this->conn->query($sql)) {
            throw new Exception("Lỗi sửa dữ liệu: " . $this->conn->error);
        }
    }

    // Phương thức thực hiện truy vấn xóa dữ liệu
    public function deleteData($table, $condition)
    {
        $sql = "DELETE FROM $table WHERE $condition";
        
        if (!$this->conn->query($sql)) {
            throw new Exception("Lỗi xóa dữ liệu: " . $this->conn->error);
        } else{
            $this->resetAutoIncrement($table);
        }
    }
    // Phương thức thực hiện truy vấn lấy dữ liệu
    public function selectData($table, $columns = "*", $condition = "")
    {
        $sql = "SELECT $columns FROM $table";
        if (!empty($condition)) {
            $sql .= " WHERE $condition";
        }

        $result = $this->conn->query($sql);

        if (!$result) {
            throw new Exception("Lỗi truy vấn: " . $this->conn->error);
        }

        return $result;
    }
// Phương thức đếm số lượng dữ liệu
public function countData($table, $condition = "")
{
    $sql = "SELECT COUNT(*) as count FROM $table";

    // Nếu có điều kiện, thêm vào câu truy vấn
    if (!empty($condition)) {
        $sql .= " WHERE $condition";
    }

    $result = $this->conn->query($sql);

    if (!$result) {
        throw new Exception("Lỗi truy vấn đếm: " . $this->conn->error);
    }

    $row = $result->fetch_assoc();

    return $row['count'];
}

// Phương thức để đặt lại giá trị AUTO_INCREMENT của bảng
public function resetAutoIncrement($table)
{
    try {
        // Số lượng bản ghi trong bảng
        $recordCount = $this->countData($table);

        // Vòng lặp để đặt lại giá trị ID
        for ($i = 1; $i <= $recordCount; $i++) {
            $resetQuery = "ALTER TABLE $table AUTO_INCREMENT = $i";
            $this->conn->query($resetQuery);
        }
    } catch (Exception $e) {
        throw new Exception("Lỗi: " . $e->getMessage());
    }
}
}
?>
