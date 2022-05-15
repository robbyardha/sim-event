<!-- Content START -->
<div class="content">
    <div class="main">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="row">
                        <h1>Example QR Code</h1>

                        <form action="" method="post">
                            <label for="event_id">Event</label>
                            <input type="text" class="form-control" name="event_id">
                            <label for="event_id">User</label>
                            <input type="text" class="form-control" name="users_id">
                            <label for="event_id">Status</label>
                            <select class="form-control" name="status_kehadiran" id="status_kehadiran">
                                <option value="Hadir">Hadir</option>
                                <option value="Tidak Hadir">Tidak Hadir</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Overview</h4>
                        <div class="row">
                            <div class="col-6 col-md-3">
                                <div class="text-center py-3 border-end">
                                    <h5>$43,669</h5>
                                    <span class="text-muted">Total Earning</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="text-center py-3 border-end">
                                    <h5>$3,639</h5>
                                    <span class="text-muted">Average Earning</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="text-center py-3 border-end">
                                    <h5>$30,277</h5>
                                    <span class="text-muted">Total Expense </span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="text-center py-3">
                                    <h5>$2,523</h5>
                                    <span class="text-muted">Average Expense</span>
                                </div>
                            </div>
                        </div>
                        <div id="overview-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h4 class="mb-0">Recent Transaction</h4>
                            <button class="btn btn-outline-secondary btn-sm">All Transaction</button>
                        </div>
                        <table class="table table-hover mt-2">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cursor-pointer">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-circle avatar-image" style="width: 35px; height: 35px;">
                                                <img src="<?= base_url() ?>assets/images/avatars/thumb-1.jpg">
                                            </div>
                                            <div class="ms-2">
                                                <div class="fw-bolder text-dark">Julio Baker</div>
                                                <div class="text-muted fw-semibold">ID: 135</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>06 Mar</td>
                                    <td>
                                        <div class="badge-dot bg-success"></div>
                                        <span class="ms-2">Approved</span>
                                    </td>
                                </tr>
                                <tr class="cursor-pointer">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-circle avatar-image" style="width: 35px; height: 35px;">
                                                <img src="<?= base_url() ?>assets/images/avatars/thumb-2.jpg">
                                            </div>
                                            <div class="ms-2">
                                                <div class="fw-bolder text-dark">Robert Mitchell</div>
                                                <div class="text-muted fw-semibold">ID: 138</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>23 Feb</td>
                                    <td>
                                        <div class="badge-dot bg-warning"></div>
                                        <span class="ms-2">Pending</span>
                                    </td>
                                </tr>
                                <tr class="cursor-pointer">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-circle avatar-image" style="width: 35px; height: 35px;">
                                                <img src="<?= base_url() ?>assets/images/avatars/thumb-3.jpg">
                                            </div>
                                            <div class="ms-2">
                                                <div class="fw-bolder text-dark">David Powell</div>
                                                <div class="text-muted fw-semibold">ID: 115</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>02 Mar</td>
                                    <td>
                                        <div class="badge-dot bg-danger"></div>
                                        <span class="ms-2">Rejected</span>
                                    </td>
                                </tr>
                                <tr class="cursor-pointer">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-circle avatar-image" style="width: 35px; height: 35px;">
                                                <img src="<?= base_url() ?>assets/images/avatars/thumb-4.jpg">
                                            </div>
                                            <div class="ms-2">
                                                <div class="fw-bolder text-dark">Christina Morrison</div>
                                                <div class="text-muted fw-semibold">ID: 112</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>16 Jan</td>
                                    <td>
                                        <div class="badge-dot bg-warning"></div>
                                        <span class="ms-2">Pending</span>
                                    </td>
                                </tr>
                                <tr class="cursor-pointer">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-circle avatar-image" style="width: 35px; height: 35px;">
                                                <img src="<?= base_url() ?>assets/images/avatars/thumb-5.jpg">
                                            </div>
                                            <div class="ms-2">
                                                <div class="fw-bolder text-dark">Calvin Reid</div>
                                                <div class="text-muted fw-semibold">ID: 108</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>23 Feb</td>
                                    <td>
                                        <div class="badge-dot bg-success"></div>
                                        <span class="ms-2">Approved</span>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4>Recent Review</h4>
                            <button class="btn btn-sm btn-outline-secondary">All Review</button>
                        </div>
                        <div class="scrollable position-relative" style="height: 365px;">
                            <div class="my-3 border-bottom">
                                <div class="d-flex pe-3">
                                    <div class="mt-1">
                                        <div class="avatar avatar-circle avatar-image" style="width: 35px; height: 35px; line-height: 35px;">
                                            <img src="<?= base_url() ?>assets/images/avatars/thumb-6.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ms-2 w-100">
                                        <div class="mb-2 d-md-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="fw-bolder text-dark">Devon Hughes</div>
                                                <div class="text-muted fw-semibold">02 Mar 2020</div>
                                            </div>
                                            <div>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                            </div>
                                        </div>
                                        <p class="mb-3">My neighbor Georgie has one of these. She works as a busboy and she says it looks brown.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3 border-bottom">
                                <div class="d-flex pe-3">
                                    <div class="mt-1">
                                        <div class="avatar avatar-circle avatar-image" style="width: 35px; height: 35px; line-height: 35px;">
                                            <img src="<?= base_url() ?>assets/images/avatars/thumb-7.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ms-2 w-100">
                                        <div class="mb-2 d-md-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="fw-bolder text-dark">Tom Lucas</div>
                                                <div class="text-muted fw-semibold">27 Feb 2020</div>
                                            </div>
                                            <div>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                                <i class="font-size-lg la la-star-o text-muted"></i>
                                                <i class="font-size-lg la la-star-o text-muted"></i>
                                            </div>
                                        </div>
                                        <p class="mb-3">The box this comes in is 5 kilometer by 5 inch and weights 13 kilogram!!!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3 border-bottom">
                                <div class="d-flex pe-3">
                                    <div class="mt-1">
                                        <div class="avatar avatar-circle avatar-image" style="width: 35px; height: 35px; line-height: 35px;">
                                            <img src="<?= base_url() ?>assets/images/avatars/thumb-8.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ms-2 w-100">
                                        <div class="mb-2 d-md-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="fw-bolder text-dark">Wade Jenkins</div>
                                                <div class="text-muted fw-semibold">17 Jan 2020</div>
                                            </div>
                                            <div>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                                <i class="font-size-lg la la-star-o text-muted"></i>
                                                <i class="font-size-lg la la-star-o text-muted"></i>
                                                <i class="font-size-lg la la-star-o text-muted"></i>
                                            </div>
                                        </div>
                                        <p class="mb-3">I tried to impale it but got fudge all over it.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3 border-bottom">
                                <div class="d-flex pe-3">
                                    <div class="mt-1">
                                        <div class="avatar avatar-circle avatar-image" style="width: 35px; height: 35px; line-height: 35px;">
                                            <img src="<?= base_url() ?>assets/images/avatars/thumb-9.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ms-2 w-100">
                                        <div class="mb-2 d-md-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="fw-bolder text-dark">Kathy Barnes</div>
                                                <div class="text-muted fw-semibold">18 Jan 2020</div>
                                            </div>
                                            <div>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                                <i class="font-size-lg la la-star text-warning"></i>
                                            </div>
                                        </div>
                                        <p class="mb-3">I will refer everyone I know.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Device Satistic</h4>
                        <div class="my-4">
                            <div class="row">
                                <div class="col-4">
                                    <h5>50%</h5>
                                    <span class="text-muted">Chrome</span>
                                </div>
                                <div class="col-4">
                                    <h5>30%</h5>
                                    <span class="text-muted">Firefox</span>
                                </div>
                                <div class="col-4">
                                    <h5>20%</h5>
                                    <span class="text-muted">Edge</span>
                                </div>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" style="width: 25%;"></div>
                            <div class="progress-bar bg-warning" style="width: 15%;"></div>
                            <div class="progress-bar bg-info" style="width: 50%;"></div>
                            <div class="progress-bar bg-primary" style="width: 10%;"></div>
                        </div>
                        <div class="mt-3">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center py-2">
                                                <span class="badge-dot bg-danger"></span>
                                                <span class="ms-2">Desktop</span>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="feather icon-user"></i>
                                            <span class="ms-1">5882</span>
                                        </td>
                                        <td>25%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center py-2">
                                                <span class="badge-dot bg-warning"></span>
                                                <span class="ms-2">Tablet</span>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="feather icon-user"></i>
                                            <span class="ms-1">3582</span>
                                        </td>
                                        <td>15%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center py-2">
                                                <span class="badge-dot bg-info"></span>
                                                <span class="ms-2">Mobile</span>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="feather icon-user"></i>
                                            <span class="ms-1">11582</span>
                                        </td>
                                        <td>50%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center py-2">
                                                <span class="badge-dot bg-primary"></span>
                                                <span class="ms-2">Other</span>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="feather icon-user"></i>
                                            <span class="ms-1">1845</span>
                                        </td>
                                        <td>10%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Top Countries</h4>
                        <div class="mt-3">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center my-2">
                                                <div class="avatar avatar-circle avatar-image" style="width: 30px; height: 30px; line-height: 30px;">
                                                    <img src="<?= base_url() ?>assets/images/thumbs/us.png" alt="">
                                                </div>
                                                <div class="ms-3">
                                                    <div class="fw-bolder text-dark">United State</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="feather icon-user"></i>
                                            <span class="ms-1">936</span>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center my-2">
                                                <div class="avatar avatar-circle avatar-image" style="width: 30px; height: 30px; line-height: 30px;">
                                                    <img src="<?= base_url() ?>assets/images/thumbs/german.png" alt="">
                                                </div>
                                                <div class="ms-3">
                                                    <div class="fw-bolder text-dark">German</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="feather icon-user"></i>
                                            <span class="ms-1">743</span>
                                        </td>
                                        <td>25%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center my-2">
                                                <div class="avatar avatar-circle avatar-image" style="width: 30px; height: 30px; line-height: 30px;">
                                                    <img src="<?= base_url() ?>assets/images/thumbs/japan.png" alt="">
                                                </div>
                                                <div class="ms-3">
                                                    <div class="fw-bolder text-dark">Japan</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="feather icon-user"></i>
                                            <span class="ms-1">699</span>
                                        </td>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center my-2">
                                                <div class="avatar avatar-circle avatar-image" style="width: 30px; height: 30px; line-height: 30px;">
                                                    <img src="<?= base_url() ?>assets/images/thumbs/italy.png" alt="">
                                                </div>
                                                <div class="ms-3">
                                                    <div class="fw-bolder text-dark">Italy</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="feather icon-user"></i>
                                            <span class="ms-1">328</span>
                                        </td>
                                        <td>15%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center my-2">
                                                <div class="avatar avatar-circle avatar-image" style="width: 30px; height: 30px; line-height: 30px;">
                                                    <img src="<?= base_url() ?>assets/images/thumbs/spain.png" alt="">
                                                </div>
                                                <div class="ms-3">
                                                    <div class="fw-bolder text-dark">Spain</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="feather icon-user"></i>
                                            <span class="ms-1">266</span>
                                        </td>
                                        <td>10%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer START -->
    <div class="footer">
        <div class="footer-content">
            <p class="mb-0">Copyright © 2021 Theme_Nate. All rights reserved.</p>
            <span>
                <a href="" class="text-gray me-3">Term &amp; Conditions</a>
                <a href="" class="text-gray">Privacy &amp; Policy</a>
            </span>
        </div>
    </div>
    <!-- Footer End -->
</div>
<!-- Content END -->