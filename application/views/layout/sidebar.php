 <!-- Side Nav START -->

 <div class="side-nav vertical-menu nav-menu-light scrollable">
     <div class="nav-logo">
         <div class="w-100 logo">
             <img class="img-fluid" src="<?= base_url() ?>assets/images/logo/logo.png" style="max-height: 70px;" alt="logo">
         </div>
         <div class="mobile-close">
             <i class="icon-arrow-left feather"></i>
         </div>
     </div>
     <ul class="nav-menu">
         <?php if ($this->session->userdata('role_id') == 1) : ?>
             <li class="nav-group-title">Administrator Page</li>
             <li class="nav-menu-item router-link-<?php if ($this->uri->segment(1) == "dashboard" || $this->uri->segment(1) == "Dashboard") {
                                                        echo "active";
                                                    } ?>">
                 <a href="<?= base_url('dashboard') ?>">
                     <i class="feather icon-home"></i>
                     <span class="nav-menu-item-title">Dashboard</span>
                 </a>
             </li>

             <li class="nav-group-title">Master Data</li>
             <li class="nav-submenu">
                 <a class="nav-submenu-title ">
                     <i class="feather icon-box"></i>
                     <span>Master Data</span>
                     <i class="nav-submenu-arrow"></i>
                 </a>
                 <ul class="nav-menu menu-collapse">
                     <li class="nav-menu-item router-link-<?php if ($this->uri->segment(1) == "Users" || $this->uri->segment(1) == "users") {
                                                                echo "active";
                                                            } ?> ">
                         <a href="<?= base_url('users') ?>">Users</a>
                     </li>
                     <li class="nav-menu-item router-link-<?php if ($this->uri->segment(1) == "Event" || $this->uri->segment(1) == "event") {
                                                                echo "active";
                                                            } ?> ">
                         <a href="<?= base_url('event') ?>">Event</a>
                     </li>
                     <li class="nav-menu-item router-link-<?php if ($this->uri->segment(1) == "Peserta" || $this->uri->segment(1) == "peserta") {
                                                                echo "active";
                                                            } ?> ">
                         <a href="<?= base_url('peserta') ?>">Peserta</a>
                     </li>

                 </ul>

             </li>

             <li class="nav-group-title">Kehadiran Event</li>
             <li class="nav-submenu">
                 <a class="nav-submenu-title ">
                     <i class="feather icon-radio"></i>
                     <span>Kehadiran</span>
                     <i class="nav-submenu-arrow"></i>
                 </a>
                 <ul class="nav-menu menu-collapse">

                     <li class="nav-menu-item router-link-<?php if ($this->uri->segment(1) == "Kehadiran" || $this->uri->segment(1) == "kehadiran") {
                                                                echo "active";
                                                            } ?> ">
                         <a href="<?= base_url('kehadiran') ?>">Kehadiran</a>
                     </li>
                     <li class="nav-menu-item router-link-<?php if ($this->uri->segment(1) == "Scan" || $this->uri->segment(1) == "scan") {
                                                                echo "active";
                                                            } ?> ">
                         <a href="<?= base_url('scan') ?>">Scan Kehadiran</a>
                     </li>

                 </ul>
             </li>

             <li class="nav-group-title">Laporan</li>
             <li class="nav-submenu">
                 <a class="nav-submenu-title ">
                     <i class="feather icon-file-text"></i>
                     <span>Laporan</span>
                     <i class="nav-submenu-arrow"></i>
                 </a>
                 <ul class="nav-menu menu-collapse">
                     <li class="nav-menu-item router-link-<?php if ($this->uri->segment(1) == "Report" || $this->uri->segment(1) == "report") {
                                                                echo "active";
                                                            } ?> ">
                         <a href="<?= base_url('report') ?>">Kehadiran Event</a>
                     </li>
                     <li class="nav-menu-item router-link-<?php if ($this->uri->segment(2) == "dataqr" || $this->uri->segment(2) == "Dataqr") {
                                                                echo "active";
                                                            } ?> ">
                         <a href="<?= base_url('report/dataqr') ?>">Data QR Peserta</a>
                     </li>

                 </ul>
             </li>

             <li class="nav-group-title">Pendaftaran Event</li>
             <li class="nav-submenu">
                 <a class="nav-submenu-title ">
                     <i class="feather icon-file-text"></i>
                     <span>Pendaftaran Event</span>
                     <i class="nav-submenu-arrow"></i>
                 </a>
                 <ul class="nav-menu menu-collapse">
                     <li class="nav-menu-item router-link-<?php if ($this->uri->segment(1) == "Pendaftaran" || $this->uri->segment(1) == "pendaftaran") {
                                                                echo "active";
                                                            } ?> ">
                         <a href="<?= base_url('pendaftaran') ?>">Pendaftaran Peserta</a>
                     </li>
                     <li class="nav-menu-item router-link-<?php if ($this->uri->segment(1) == "Activity" || $this->uri->segment(1) == "activity") {
                                                                echo "active";
                                                            } ?> ">
                         <a href="<?= base_url('activity') ?>">My Activity Event</a>
                     </li>

                 </ul>
             </li>



         <?php elseif ($this->session->userdata('role_id') == 2) : ?>
             <li class="nav-group-title">Pendaftaran Event</li>
             <li class="nav-submenu">
                 <a class="nav-submenu-title ">
                     <i class="feather icon-file-text"></i>
                     <span>Pendaftaran Event</span>
                     <i class="nav-submenu-arrow"></i>
                 </a>
                 <ul class="nav-menu menu-collapse">
                     <li class="nav-menu-item router-link-<?php if ($this->uri->segment(1) == "Pendaftaran" || $this->uri->segment(1) == "pendaftaran") {
                                                                echo "active";
                                                            } ?> ">
                         <a href="<?= base_url('pendaftaran') ?>">Pendaftaran Peserta</a>
                     </li>
                     <li class="nav-menu-item router-link-<?php if ($this->uri->segment(1) == "Activity" || $this->uri->segment(1) == "activity") {
                                                                echo "active";
                                                            } ?> ">
                         <a href="<?= base_url('activity') ?>">My Activity Event</a>
                     </li>

                 </ul>
             </li>
         <?php endif ?>




















         <!-- <li class="nav-submenu">
             <a class="nav-submenu-title">
                 <i class="feather icon-package"></i>
                 <span>Components</span>
                 <i class="nav-submenu-arrow"></i>
             </a>
             <ul class="nav-menu menu-collapse">
                 <li class="nav-menu-item">
                     <a href="v-accordion.html">Accordion</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-carousel.html">Carousel</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-dropdown.html">Dropdown</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-modals.html">Modals</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-toasts.html">Toasts</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-popover.html">Popover</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-progress.html">Progress</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-tabs.html">Tabs</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-tooltips.html">Tooltips</a>
                 </li>
             </ul>
         </li>
         <li class="nav-submenu">
             <a class="nav-submenu-title">
                 <i class="feather icon-file-text"></i>
                 <span>Forms</span>
                 <i class="nav-submenu-arrow"></i>
             </a>
             <ul class="nav-menu menu-collapse">
                 <li class="nav-menu-item">
                     <a href="v-form-elements.html">Form Elements</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-form-layouts.html">Form Layouts</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-form-validation.html">Form Validation</a>
                 </li>
             </ul>
         </li>
         <li class="nav-submenu">
             <a class="nav-submenu-title">
                 <i class="feather icon-grid"></i>
                 <span>Tables</span>
                 <i class="nav-submenu-arrow"></i>
             </a>
             <ul class="nav-menu menu-collapse">
                 <li class="nav-menu-item">
                     <a href="v-basic-table.html">Basic Table</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-data-table.html">Data Table</a>
                 </li>
             </ul>
         </li>
         <li class="nav-menu-item">
             <a href="v-chart.html">
                 <i class="feather icon-bar-chart"></i>
                 <span class="nav-menu-item-title">Chart</span>
             </a>
         </li>
         <li class="nav-group-title">PAGES</li>
         <li class="nav-submenu">
             <a class="nav-submenu-title">
                 <i class="feather icon-settings"></i>
                 <span>Utility</span>
                 <i class="nav-submenu-arrow"></i>
             </a>
             <ul class="nav-menu menu-collapse">
                 <li class="nav-menu-item">
                     <a href="v-profile-personal.html">Profile</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-invoice.html">Invoice</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-faq.html">FAQ</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-pricing.html">Pricing</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="v-user-list.html">User List</a>
                 </li>
             </ul>
         </li>
         <li class="nav-submenu">
             <a class="nav-submenu-title">
                 <i class="feather icon-lock"></i>
                 <span>Auth</span>
                 <i class="nav-submenu-arrow"></i>
             </a>
             <ul class="nav-menu menu-collapse">
                 <li class="nav-menu-item">
                     <a href="login.html">Login</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="login-v2.html">Login v2</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="login-v3.html">Login v3</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="register.html">Register</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="register-v2.html">Register v2</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="register-v3.html">Register v3</a>
                 </li>
             </ul>
         </li>
         <li class="nav-submenu">
             <a class="nav-submenu-title">
                 <i class="feather icon-slash"></i>
                 <span>Errors</span>
                 <i class="nav-submenu-arrow"></i>
             </a>
             <ul class="nav-menu menu-collapse">
                 <li class="nav-menu-item">
                     <a href="error.html">Error 1</a>
                 </li>
                 <li class="nav-menu-item">
                     <a href="error-v2.html">Error 2</a>
                 </li>
             </ul>
         </li> -->
     </ul>
 </div>
 <!-- Side Nav END -->