<?php
class diem extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    function viewPoint()
    {
        $sql = "SELECT * FROM diem";
        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            echo "<table id='datatablesSimple'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>IDTB</th>";
            echo "<th>Point</th>";
            echo "<th>Edit</th>";
            echo "<th>Delete</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
                $edit = "<a href='editpoint.php?MaTB=" . $row['MaTB'] . "' class='btn btn-primary btn-sm'><i class='fa-solid fa-pen-to-square fa-xl'></i></a>";
                $delete = "<a href='delpoint.php?MaTB=" . $row['MaTB'] . "' class='btn btn-danger btn-sm'><i class='fa-solid fa-trash fa-xl'></i></a>";
                echo "<tr>";
                echo "<td>" . $row["MaTB"] . "</td>";
                echo "<td>" . $row["TongDiem"] . "</td>";
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
    function addPoint($MaTB, $TongDiem)
    {
        $sql = "INSERT INTO diem(MaTB, TongDiem) VALUES ('$MaTB', '$TongDiem')";
        if ($this->con->query($sql) === TRUE) {
            echo "Dữ liệu đã được thêm thành công";
        } else {
            echo "Lỗi: Không thể thêm dữ liệu" . $this->con->error;
        }
    }
    public function getPoint($MaTB)
    {
        $sql = "SELECT * FROM diem WHERE `MaTB` = '$MaTB'";
        $result = $this->con->query($sql);

        if ($result != null) {
            $item = mysqli_fetch_array($result);
            return $item;
        } else {
            return false;
        }
    }
    function updatePoint($MaTB, $TongDiem)
    {
        $sql = "UPDATE diem SET TongDiem = '$TongDiem' WHERE MaTB = '$MaTB'";

        if ($this->con->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Failed to update record: " . $this->con->error;
        }
    }
    function delPoint($MaTB)
    {
        $sql = "DELETE FROM diem WHERE `MaTB` = '$MaTB'";
        $result = $this->con->query($sql);

        if ($result) {
            echo "Deleted Point with ID: " . $MaTB;
        } else {
            echo "Point not found";
        }
    }
}
