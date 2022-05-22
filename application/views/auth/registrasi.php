<!-- <style>
    ::-webkit-scrollbar {
        width: 10px;
        height: 10px;
    }
</style> -->

<div class="auth-full-height container d-flex flex-column justify-content-center">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card row mx-0 flex-row overflow-hidden">
                <div class="col-md-4 bg-size-cover d-flex align-items-center p-4" style="background-image: url('<?= base_url() ?>assets/images/others/bg-3.jpg');">
                    <div>
                        <div class="mb-5">
                            <div class="logo">
                                <img alt="logo" class="img-fluid" src="<?= base_url() ?>assets/images/arcodes.png" style="height: 50px;">
                            </div>
                        </div>
                        <h3 class="text-white">MY EVENT</h3>
                        <p class="text-white mt-4 mb-5 o-75">Get Your Benefit, Let's Open Minded</p>
                    </div>
                </div>
                <div class="col-md-8 px-0">
                    <div class="card-body">
                        <div class="my-5 mx-auto" style="max-width: 350px;">
                            <div class="mb-3">
                                <h3 class="mb-3">Sign Up</h3>
                                <form method="POST">
                                    <div class="form-group mb-2">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control no-validation-icon no-success-validation" name="email">
                                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control no-validation-icon no-success-validation" name="username">
                                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control no-validation-icon no-success-validation" name="password" id="password">
                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control no-validation-icon no-success-validation" name="confirmpassword" id="confirmpassword">

                                        <?= form_error('confirmpassword', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control no-validation-icon no-success-validation" name="nama">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="showpass" onclick="showHidePass()">
                                        <script>
                                            function showHidePass() {
                                                var x = document.getElementById("password");
                                                var y = document.getElementById("confirmpassword");
                                                if (x.type === "password" && y.type === "password") {
                                                    x.type = "text";
                                                    y.type = "text";
                                                } else {
                                                    x.type = "password";
                                                    y.type = "password";
                                                }
                                            }
                                        </script>
                                        <label class="form-check-label ms-2" for="showpass">
                                            Show Password
                                        </label>
                                    </div>
                                    <button class="btn btn-primary d-block w-100" type="submit">Sign Up</button>
                                </form>
                                <div class="text-muted text-center mt-2">
                                    <p>Do You Have Account? <a href="<?= base_url('auth ') ?>">Sign in</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>