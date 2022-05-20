<div class="auth-full-height container d-flex flex-column justify-content-center">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card row mx-0 flex-row overflow-hidden">
                <div class="col-md-4 bg-size-cover d-flex align-items-center p-4" style="background-image: url('assets/images/others/bg-2.jpg');">
                    <div>
                        <div class="mb-5">
                            <div class="logo">
                                <img alt="logo" class="img-fluid" src="assets/images/logo/logo-white.png" style="height: 50px;">
                            </div>
                        </div>
                        <h3 class="text-white">Make your work easier</h3>
                        <p class="text-white mt-4 mb-5 o-75">Climb leg rub face on everything give attitude under the bed.</p>
                    </div>
                </div>
                <div class="col-md-8 px-0">
                    <div class="card-body">
                        <div class="my-5 mx-auto" style="max-width: 350px;">
                            <div class="mb-3">
                                <h3>Login</h3>
                            </div>
                            <?= $this->session->flashdata('message') ?>
                            <form method="POST">
                                <div class="form-group mb-3">
                                    <label class="form-label">Username</label>
                                    <input class="form-control" name="username" />
                                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label d-flex justify-content-between">
                                        <span>Password</span>
                                        <a href="" class="text-primary font">Forget Password?</a>
                                    </label>
                                    <div class="form-group input-affix flex-column">
                                        <label class="d-none">Password</label>
                                        <input name="password" id="password" class="form-control" type="password">
                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                        <!-- <i class="far fa-eye" id="togglePassword"></i> -->
                                        <!-- <i class="suffix-icon feather cursor-pointer text-dark icon-eye" id="togglePassword" onclick="showHidePass()" ng-reflect-ng-class="icon-eye"></i> -->
                                        <div class="form-check mt-1">
                                            <input class="form-check-input" type="checkbox" id="showpass" onclick="showHidePassLog()">
                                            <script>
                                                function showHidePassLog() {
                                                    var pas = document.getElementById("password");
                                                    if (pas.type === "password") {
                                                        pas.type = "text";
                                                    } else {
                                                        pas.type = "password";
                                                    }
                                                }
                                            </script>
                                            <label class="form-check-label ms-2" for="showpass">
                                                Show Password
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary w-100">Log In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>