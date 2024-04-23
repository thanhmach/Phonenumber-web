<?php
class authprocess extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    function getlogin($TenTK, $MatKhau)
    {
        $login_query = "SELECT * FROM taikhoan WHERE TenTK = '$TenTK' AND MatKhau = '$MatKhau' LIMIT 1";
        $login_query_run = $this->con->query($login_query);

        if ($login_query_run && $login_query_run->num_rows > 0) {
            return $login_query_run;
        } else {
            return false;
        }
    }
    public function getAcStaff($MaNV)
    {
        $sql = "SELECT * FROM taikhoan WHERE `MaTK` = '$MaNV'";
        $result = $this->con->query($sql);

        if ($result != null) {
            $item = mysqli_fetch_array($result);
            return $item;
        } else {
            return false;
        }
    }
    function addAcStaff($MaNV, $TenTK, $MatKhau)
    {
        $sql = "INSERT INTO taikhoan(MaQuyen, MaTK, TenTK, MatKhau) VALUES ('1', '$MaNV', '$TenTK', '$MatKhau')";
        if ($this->con->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Failed to insert record " . $this->con->error;
        }
    }
    function addAcUser($MaKH, $TenTK, $MatKhau)
    {
        $sql = "INSERT INTO taikhoan(MaQuyen, MaTK, TenTK, MatKhau) VALUE ('2' , '$MaKH', '$TenTK', '$MatKhau')";
        if ($this->con->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Failed to insert record" . $this->con->error;
        }
    }
    function delAcStaff($MaNV)
    {
        $sql = "DELETE FROM taikhoan WHERE MaTK = '$MaNV'";
        if ($this->con->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Failed to delete record: " . $this->con->error;
        }
    }
    function delAcUser($MaKH)
    {
        $sql = "DELETE FROM taikhoan WHERE MaTK = '$MaKH'";
        if ($this->con->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Failed to delete record: " . $this->con->error;
        }
    }
    function updateAcStaff($MaNV, $TenTK, $MatKhau) {
        $sql = "UPDATE taikhoan SET TenTK = '$TenTK', MatKhau = '$MatKhau' WHERE MaTK = '$MaNV'";
        if ($this->con->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Failed to update record: " . $this->con->error;
        }
    }
    function updateAcUser($MaKH, $TenTK, $MatKhau) {
        $sql = "UPDATE taikhoan SET TenTK = '$TenTK', MatKhau = '$MatKhau' WHERE MaTK = '$MaKH'";
        if ($this->con->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Failed to update record: " . $this->con->error;
        }
    }
}
