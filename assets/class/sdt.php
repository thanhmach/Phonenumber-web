<?php
class sdt extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    function viewNum($MaKH)
    {
        $sql = "SELECT * FROM sdt WHERE `MaKH` = '$MaKH'";
        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            echo "<table id='datatablesSimple'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>IDTB</th>";
            echo "<th>Number Phone</th>";
            echo "<th>Registration Date</th>";
            echo "<th>Expiration Date</th>";
            echo "<th>Total Point</th>";
            echo "<th>Edit</th>";
            echo "<th>Delete</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
                $edit = "<a href='editnum.php?SDT=" . $row['SDT'] . "' class='btn btn-primary btn-sm'><i class='fa-solid fa-pen-to-square fa-xl'></i></a>";
                $delete = "<a href='delnum.php?SDT=" . $row['SDT'] . "' class='btn btn-danger btn-sm'><i class='fa-solid fa-trash fa-xl'></i></a>";
                echo "<tr>";
                echo "<td>" . $row["MaTB"] . "</td>";
                echo "<td>" . $row["SDT"] . "</td>";
                echo "<td>" . $row["NgayDK"] . "</td>";
                echo "<td>" . $row["NgayHH"] . "</td>";
                echo "<td>" . $row["DiemTong"] . "</td>";
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
    function addNum($MaKH, $MaTB, $SDT, $NgayDK, $NgayHH, $DiemTong)
    {
        $sql = "INSERT INTO sdt(MaKH, MaTB, SDT, NgayDK, NgayHH, DiemTong) VALUES ('$MaKH', '$MaTB', '$SDT', '$NgayDK', '$NgayHH', '$DiemTong')";
        if ($this->con->query($sql) === TRUE) {
            echo "Dữ liệu đã được thêm thành công";
        } else {
            echo "Lỗi: Không thể thêm dữ liệu" . $this->con->error;
        }
    }
    public function getNum($SDT)
    {
        $sql = "SELECT * FROM sdt WHERE `SDT` = '$SDT'";
        $result = $this->con->query($sql);

        if ($result != null) {
            $item = mysqli_fetch_array($result);
            return $item;
        } else {
            return false;
        }
    }
    function updateNum($MaTB, $SDT, $NgayDK, $NgayHH, $DiemTong)
    {
        $sql = "UPDATE sdt SET MaTB = '$MaTB', NgayDK = '$NgayDK', NgayHH = '$NgayHH', DiemTong = '$DiemTong' WHERE SDT = '$SDT'";

        if ($this->con->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Failed to update record: " . $this->con->error;
        }
    }
    function delNum($SDT)
    {
        $sql = "DELETE FROM sdt WHERE `SDT` = '$SDT'";
        $result = $this->con->query($sql);

        if ($result) {
            echo "Deleted Number Phone with ID: " . $SDT;
        } else {
            echo "Number Phone not found";
        }
    }
    function calculateRegistrationDate()
    {
        $registrationDate = date('Y-m-d');

        return $registrationDate;
    }
    function calculateExpirationDate($ThoiHan, $NgayDK)
    {
        preg_match('/(\d+)\s*(\p{L}+)/u', $ThoiHan, $matches);
        $soThoiHan = $matches[1];
        $donViThoiHan = $matches[2];

        $NgayDKObj = new DateTime($NgayDK);

        if ($donViThoiHan == 'năm') {
            $NgayHHObj = $NgayDKObj->modify("+{$soThoiHan} years");
        } elseif ($donViThoiHan == 'tháng') {
            $NgayHHObj = $NgayDKObj->modify("+{$soThoiHan} months");
        } elseif ($donViThoiHan == 'ngày') {
            $NgayHHObj = $NgayDKObj->modify("+{$soThoiHan} days");
        } else {
            $NgayHHObj = null;
        }

        if ($NgayHHObj) {
            $expirationDate = $NgayHHObj->format('Y-m-d');
        } else {
            $expirationDate = null;
        }

        return $expirationDate;
    }
    function calculateTotalPoints($Diem)
    {
        $sql = "SELECT SUM(DiemTong) AS TongDiem FROM sdt";
        $result = $this->con->query($sql);
        $tongDiem = 0;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tongDiem = $row['TongDiem'];
        }

        $tongDiem += $Diem;

        return $tongDiem;
    }
}
