<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="addclient.php">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label">Mã khách hàng</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-sm" name="MaKH">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label">Tên khách hàng</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-sm" name="TenKH">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label">Địa chỉ</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-sm" name="DiaChi">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label">Căn cước</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-sm" name="CCCD">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label">Mã nhân viên</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-sm" name="MaNV" value="<?= $_SESSION['auth_user']['user_id'] ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label">Tên tài khoản</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-sm" name="TenTK">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label">Mật khẩu</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-sm" name="MatKhau">
                                </div>
                            </div>
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