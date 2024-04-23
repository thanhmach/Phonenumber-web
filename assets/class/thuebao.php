<?php
class thuebao extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    function viewTB()
    {
        $sql = "SELECT * FROM thuebao";
        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            echo "<table id='datatablesSimple'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>IDTB</th>";
            echo "<th>NameTB</th>";
            echo "<th>Date</th>";
            echo "<th>Point</th>";
            echo "<th>Edit</th>";
            echo "<th>Delete</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
                $edit = "<a href='editsub.php?MaTB=" . $row['MaTB'] . "' class='btn btn-primary btn-sm'>Edit</a>";
                $delete = "<a href='deletesub.php?MaTB=" . $row['MaTB'] . "' class='btn btn-danger btn-sm'>Delete</a>";
                echo "<tr>";
                echo "<td>" . $row["MaTB"] . "</td>";
                echo "<td>" . $row["TenTB"] . "</td>";
                echo "<td>" . $row["ThoiHan"] . "</td>";
                echo "<td>" . $row["Diem"] . "</td>";
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
    function addSub($MaTB, $TenTB, $ThoiHan, $Diem)
    {
        $sql = "INSERT INTO thuebao(MaTB, TenTB, ThoiHan, Diem) VALUES ('$MaTB', '$TenTB', '$ThoiHan', '$Diem')";
        if ($this->con->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Failed to insert record" . $this->con->error;
        }
    }
    public function getSub($MaTB)
    {
        $sql = "SELECT * FROM thuebao WHERE `MaTB` = '$MaTB'";
        $result = $this->con->query($sql);

        if ($result != null) {
            $item = mysqli_fetch_array($result);
            return $item;
        } else {
            return false;
        }
    }
    function updateSub($MaTB, $TenTB, $ThoiHan, $Diem)
    {
        $sql = "UPDATE thuebao SET TenTB = '$TenTB', ThoiHan = '$ThoiHan', Diem = '$Diem' WHERE MaTB = '$MaTB'";

        if ($this->con->query($sql) == TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Failed to update record: " . $this->con->error;
        }
    }
    function delSub($MaTB)
    {
        $sql = "DELETE FROM thuebao WHERE `MaTB` = '$MaTB'";
        $result = $this->con->query($sql);

        if ($result) {
            echo "Deleted subscriptions with ID: " . $MaTB;
        } else {
            echo "Subscriptions not found";
        }
    }
    function totalSub()
    {
        $sql = "SELECT COUNT(*) AS TotalSubscriptions FROM thuebao;";
        $result = $this->con->query($sql);

        $row = $result->fetch_assoc();
        $TotalSubscriptions = $row['TotalSubscriptions'];

        echo $TotalSubscriptions;
    }
    function createMaTBComboBox()
    {
        $sql = "SELECT MaTB FROM thuebao";
        $result = $this->con->query($sql);
        $options = "";
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='" . $row['MaTB'] . "' class='form-control'>" . $row['MaTB'] . "</option>";
        }

        $comboBox = "<select name='MaTB' class='form-control form-control-sm'>";
        $comboBox .= $options;
        $comboBox .= "</select>";

        return $comboBox;
    }
    public function getPoint($MaTB)
    {
        $sql = "SELECT Diem FROM thuebao WHERE `MaTB` = '$MaTB'";
        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['Diem'];
        } else {
            return false;
        }
    }
    public function getTerm($MaTB)
    {
        $sql = "SELECT ThoiHan FROM thuebao WHERE `MaTB` = '$MaTB'";
        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['ThoiHan'];
        } else {
            return false;
        }
    }
}
