<?php
class nhanvien extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    function viewStaff()
    {
        $sql = "SELECT * FROM nhanvien";
        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            echo "<table id='datatablesSimple'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Phone</th>";
            echo "<th>Gmail</th>";
            echo "<th>Edit</th>";
            echo "<th>Delete</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
                $edit = "<a href='editstaff.php?MaNV=" . $row['MaNV'] . "' class='btn btn-primary btn-sm'><i class='fa-solid fa-pen-to-square fa-xl'></i></a>";
                $delete = "<a href='delstaff.php?MaNV=" . $row['MaNV'] . "' class='btn btn-danger btn-sm'><i class='fa-solid fa-trash fa-xl'></i></a>";
                echo "<tr>";
                echo "<td>" . $row["MaNV"] . "</td>";
                echo "<td>" . $row["TenNV"] . "</td>";
                echo "<td>" . $row["SDT"] . "</td>";
                echo "<td>" . $row["Gmail"] . "</td>";
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
    function addStaff($MaNV, $TenNV, $SDT, $Gmail)
    {
        $sql = "INSERT INTO nhanvien(MaNV, TenNV, SDT, Gmail) VALUES ('$MaNV', '$TenNV', '$SDT', '$Gmail')";

        if ($this->con->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Failed to insert record" . $this->con->error;
        }
    }
    function updateStaff($MaNV, $TenNV, $SDT, $Gmail)
    {
        $sql = "UPDATE nhanvien SET TenNV = '$TenNV', SDT = '$SDT', Gmail = '$Gmail' WHERE MaNV = '$MaNV'";

        if ($this->con->query($sql) == TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Failed to update record: " . $this->con->error;
        }
    }
    function delStaff($MaNV)
    {
        $sql = "DELETE FROM nhanvien WHERE `MaNV` = '$MaNV'";
        $result = $this->con->query($sql);

        if ($result) {
            echo "Deleted employee with ID: " . $MaNV;
        } else {
            echo "Employee not found";
        }
    }
    public function getStaff($MaNV)
    {
        $sql = "SELECT * FROM nhanvien WHERE `MaNV` = '$MaNV'";
        $result = $this->con->query($sql);

        if ($result != null) {
            $item = mysqli_fetch_array($result);
            return $item;
        } else {
            return false;
        }
    }
    function totalStaff()
    {
        $sql = "SELECT COUNT(*) AS TotalEmployees FROM nhanvien;";
        $result = $this->con->query($sql);

        $row = $result->fetch_assoc();
        $totalEmployees = $row['TotalEmployees'];

        echo $totalEmployees;
    }
}
