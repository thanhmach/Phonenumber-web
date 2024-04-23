<?php
include("./assets/class/thuebao.php");

$MaKH = $_GET['MaKH'];
echo '<input type="hidden" class="form-control form-control-sm" name="MaKH" value="' . $MaKH . '">';
?>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Add Number</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="addnum.php">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label">Mã khách hàng</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm" name="MaKH" value="<?php echo $MaKH ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label">Mã thuê bao</label>
                        <div class="col-md-9">
                            <?php
                            $thuebao = new thuebao();
                            $comboBoxMaTB = $thuebao->createMaTBComboBox();

                            echo $comboBoxMaTB;
                            ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label">Số điện thoại</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm" name="SDT">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>