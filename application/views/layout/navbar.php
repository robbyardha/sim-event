<!-- Header START -->
<div class="header-text-dark header-nav layout-vertical">
    <div class="header-nav-wrap">
        <div class="header-nav-left">
            <div class="header-nav-item desktop-toggle">
                <div class="header-nav-item-select cursor-pointer">
                    <i class="nav-icon feather icon-menu icon-arrow-right"></i>
                </div>
            </div>
            <div class="header-nav-item mobile-toggle">
                <div class="header-nav-item-select cursor-pointer">
                    <i class="nav-icon feather icon-menu icon-arrow-right"></i>
                </div>
            </div>
        </div>
        <div class="header-nav-right">

            <div class="header-nav-item">
                <div class="dropdown header-nav-item-select">
                    <div class="toggle-wrapper" id="nav-lang-dropdown" data-bs-toggle="dropdown">
                        <div class="avatar avatar-circle avatar-image" style="width: 22px; height: 22px; line-height: 22px;">
                            <img src="<?= base_url() ?>assets/images/thumbs/indothumbs.png" alt="">
                        </div>
                    </div>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:void(0)" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-circle avatar-image" style="width: 18px; height: 18px; line-height: 18px;">
                                    <img src="<?= base_url() ?>assets/images/thumbs/en_US.png" alt="">
                                </div>
                                <span class="ms-2">English</span>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
            <div class="header-nav-item">
                <div class="dropdown header-nav-item-select nav-profile">
                    <div class="toggle-wrapper" id="nav-profile-dropdown" data-bs-toggle="dropdown">
                        <div class="avatar avatar-circle avatar-image" style="width: 35px; height: 35px; line-height: 35px;">
                            <img src="<?= base_url() ?>assets/images/smile.png" alt="">
                        </div>
                        <span class="fw-bold mx-1"><?= $this->session->userdata('nama') ?></span>
                        <i class="feather icon-chevron-down"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="nav-profile-header">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-circle avatar-image">
                                    <img src="<?= base_url() ?>assets/images/smile.png" alt="">
                                </div>
                                <div class="d-flex flex-column ms-1">
                                    <span class="fw-bold text-dark"><?= $this->session->userdata('nama') ?></span>
                                    <span class="font-size-sm"><?= $this->session->userdata('email') ?></span>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('profile') ?>" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <i class="font-size-lg me-2 feather icon-user"></i>
                                <span>Profile</span>
                            </div>
                        </a>
                        <a href="<?= base_url('profile/changepassword') ?>" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <i class="font-size-lg me-2 feather icon-unlock"></i>
                                <span>Change Password</span>
                            </div>
                        </a>

                        <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                            <div class="d-flex align-items-center"><i class="font-size-lg me-2 feather icon-power"></i>
                                <span>Sign Out</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header END -->