<div class="auth-full-height container d-flex flex-column justify-content-center">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card row mx-0 flex-row overflow-hidden">
                <div class="col-md-4 bg-size-cover d-flex align-items-center p-4" style="background-image: url('<?= base_url() ?>assets/images/others/bg-3.jpg');">
                    <div>
                        <div class="mb-5">
                            <div class="logo">
                                <img alt="logo" class="img-fluid" src="<?= base_url() ?>assets/images/logo/logo-white.png" style="height: 50px;">
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
                                <h3 class="mb-3">Forgot Password</h3>
                                <?= $this->session->flashdata('fp') ?>
                                <form method="POST">
                                    <div class="form-group mb-2">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control no-validation-icon no-success-validation" name="email">
                                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <button class="btn btn-primary d-block w-100" type="submit">Send Email</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>