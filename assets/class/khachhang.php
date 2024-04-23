<?php
class khachhang extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    function viewClient()
    {
        $sql = "SELECT * FROM khachhang";
        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            echo "<table id='datatablesSimple'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>IDNV</th>";
            echo "<th>Name</th>";
            echo "<th>Adress</th>";
            echo "<th>Citizen identification</th>";
            echo "<th>View</th>";
            echo "<th>Edit</th>";
            echo "<th>Delete</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
                $edit = "<a href='editclient.php?MaKH=" . $row['MaKH'] . "' class='btn btn-primary btn-sm'><i class='fa-solid fa-pen-to-square fa-xl'></i></a>";
                $delete = "<a href='delclient.php?MaKH=" . $row['MaKH'] . "' class='btn btn-danger btn-sm'><i class='fa-solid fa-trash fa-xl'></i></a>";
                $viewnumber = "<a href='viewnum.php?MaKH=" . $row['MaKH'] . "' class='btn btn-warning btn-sm'><i class='fa-solid fa-eye fa-xl'></i></a>";
                echo "<tr>";
                echo "<td>" . $row["MaKH"] . "</td>";
                echo "<td>" . $row["MaNV"] . "</td>";
                echo "<td>" . $row["TenKH"] . "</td>";
                echo "<td>" . $row["DiaChi"] . "</td>";
                echo "<td>" . $row["CCCD"] . "</td>";
                echo "<td>" . $viewnumber . "</td>";
                echo "<td>" . $edit . "</td>";
                echo "<td>" . $delete . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<h4 class='text-center'>None</h4>";
        }
    }
    function addUser($MaKH, $MaNV, $TenKH, $DiaChi, $CCCD)
    {
        $sql = "INSERT INTO khachhang (MaKH, MaNV, TenKH, DiaChi, CCCD) VALUES ('$MaKH', '$MaNV', '$TenKH', '$DiaChi', '$CCCD')";

        if ($this->con->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Failed to insert record: " . $this->con->error;
        }
    }
    function updateUser($MaKH, $TenKH, $DiaChi, $CCCD)
    {
        $sql = "UPDATE khachhang SET TenKH = '$TenKH', DiaChi = '$DiaChi', CCCD = '$CCCD' WHERE MaKH = '$MaKH'";

        if ($this->con->query($sql) == TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Failed to update record: " . $this->con->error;
        }
    }
    function delUser($MaKH)
    {
        $sql = "DELETE FROM khachhang WHERE `MaKH` = '$MaKH'";
        $result = $this->con->query($sql);

        if ($result) {
            echo "Deleted employee with ID: " . $MaKH;
        } else {
            echo "Employee not found";
        }
    }
    public function getUser($MaKH)
    {
        $sql = "SELECT * FROM khachhang WHERE `MaKH` = '$MaKH'";
        $result = $this->con->query($sql);

        if ($result != null) {
            $item = mysqli_fetch_array($result);
            return $item;
        } else {
            return false;
        }
    }
    function totalUser()
    {
        $sql = "SELECT COUNT(*) AS TotalCustomers FROM khachhang;";
        $result = $this->con->query($sql);

        $row = $result->fetch_assoc();
        $TotalCustomers = $row['TotalCustomers'];

        echo $TotalCustomers;
    }
}
