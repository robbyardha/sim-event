<?php
// OOKKK STATUS 

// var_dump($quotes->content);
// die;

?>
<!-- Content START -->
<div class="content">
    <div class="main">
        <?= $this->session->flashdata('message') ?>
        <div class="row">
            <div class="col-12">
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $currenttime = new DateTime();

                //initialization dini
                $startdini = new DateTime('00:00:00');
                $enddini = new DateTime('03:59:00');

                //initialization pagi
                $startpagi = new DateTime('03:59:60');
                $endpagi = new DateTime('11:59:00');

                //init siang
                $startsiang = new DateTime('12:00:00');
                $endsiang = new DateTime('14:59:00');

                //init sore
                $startsore = new DateTime('15:00:00');
                $endsore = new DateTime('18:59:00');
                //init malam
                $startmalam = new DateTime('19:00:00');
                $endmalam = new DateTime('23:59:60');
                ?>
                <!-- <h3>
                    <?php if ($currenttime >= $startdini && $currenttime <= $enddini) : ?>
                        <h4>Don't forget to take a rest!, <?= $this->session->userdata('nama') ?></h4>
                    <?php elseif ($currenttime >= $startpagi && $currenttime <= $endpagi) : ?>
                        <h4>Good Morning, <?= $this->session->userdata('nama') ?></h4>
                    <?php elseif ($currenttime >= $startsiang && $currenttime <= $endsore) : ?>
                        <h4>Good Afternoon, <?= $this->session->userdata('nama') ?></h4>
                    <?php elseif ($currenttime >= $startmalam && $currenttime <= $endmalam) : ?>
                        <h4>Good Night, <?= $this->session->userdata('nama') ?></h4>
                    <?php endif ?>

                </h3> -->
            </div>
            <!-- <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Learning</li>
                        <li class="breadcrumb-item active">Learning List</li>
                    </ol>
                </div> -->
        </div>
        <?php if ($this->session->userdata('role_id') == 1) : ?>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <h3>
                                <?php if ($currenttime >= $startdini && $currenttime <= $enddini) : ?>
                                    <h4>Don't forget to take a rest!, <?= $this->session->userdata('nama') ?></h4>
                                <?php elseif ($currenttime >= $startpagi && $currenttime <= $endpagi) : ?>
                                    <h4>Good Morning, <?= $this->session->userdata('nama') ?></h4>
                                <?php elseif ($currenttime >= $startsiang && $currenttime <= $endsore) : ?>
                                    <h4>Good Afternoon, <?= $this->session->userdata('nama') ?></h4>
                                <?php elseif ($currenttime >= $startmalam && $currenttime <= $endmalam) : ?>
                                    <h4>Good Night, <?= $this->session->userdata('nama') ?></h4>
                                <?php endif ?>
                            </h3>
                            <div class="mt-4">
                                <?php if ($currenttime >= $startdini && $currenttime <= $enddini) : ?>
                                    <div class="profile-vector"><img class="img-fluid" src="<?= base_url(); ?>assets/images/greeting/goodini.png" alt=""></div>
                                    <h4 class="f-w-600"><span id="greeting">Don't Forget To take a rest!</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <?php elseif ($currenttime >= $startpagi && $currenttime <= $endpagi) : ?>
                                    <div class="profile-vector"><img class="img-fluid" src="<?= base_url(); ?>assets/images/greeting/goodmorning.png" alt=""></div>
                                    <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <?php elseif ($currenttime >= $startsiang && $currenttime <= $endsore) : ?>
                                    <div class="profile-vector"><img class="img-fluid" src="<?= base_url(); ?>assets/images/greeting/goodafternoon.png" alt=""></div>
                                    <h4 class="f-w-600"><span id="greeting">Good Afternoon</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <?php elseif ($currenttime >= $startmalam && $currenttime <= $endmalam) : ?>
                                    <div class="profile-vector"><img class="img-fluid" src="<?= base_url(); ?>assets/images/greeting/goodnight.png" alt=""></div>
                                    <h4 class="f-w-600"><span id="greeting">Good Night</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <?php endif ?>
                                <p><span> <?= $this->session->userdata('nama') ?></span></p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <figure class="text-start ms-5">
                                <blockquote class="blockquote text-justify">
                                    <p><?= $quotes->content ?></p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    <?= $quotes->author ?>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3><?= $userscount ?></h3>
                                    <span class="text-muted fw-semibold">Total User Register</span>
                                </div>
                                <div class="text-success fw-bold font-size-lg">+18%</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3><?= $eventcount ?></h3>
                                    <span class="text-muted fw-semibold">Total Event Available</span>
                                </div>
                                <div class="text-success fw-bold font-size-lg">+18%</div>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3><?= $pesertacount ?></h3>
                                    <span class="text-muted fw-semibold">Total Participant</span>
                                </div>
                                <div class="text-success fw-bold font-size-lg">+18%</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h3>
                                <?php if ($currenttime >= $startdini && $currenttime <= $enddini) : ?>
                                    <h4>Don't forget to take a rest!, <?= $this->session->userdata('nama') ?></h4>
                                <?php elseif ($currenttime >= $startpagi && $currenttime <= $endpagi) : ?>
                                    <h4>Good Morning, <?= $this->session->userdata('nama') ?></h4>
                                <?php elseif ($currenttime >= $startsiang && $currenttime <= $endsore) : ?>
                                    <h4>Good Afternoon, <?= $this->session->userdata('nama') ?></h4>
                                <?php elseif ($currenttime >= $startmalam && $currenttime <= $endmalam) : ?>
                                    <h4>Good Night, <?= $this->session->userdata('nama') ?></h4>
                                <?php endif ?>
                            </h3>
                            <div class="mt-4">
                                <?php if ($currenttime >= $startdini && $currenttime <= $enddini) : ?>
                                    <div class="profile-vector"><img class="img-fluid" src="<?= base_url(); ?>assets/images/greeting/goodini.png" alt=""></div>
                                    <h4 class="f-w-600"><span id="greeting">Don't Forget To take a rest!</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <?php elseif ($currenttime >= $startpagi && $currenttime <= $endpagi) : ?>
                                    <div class="profile-vector"><img class="img-fluid" src="<?= base_url(); ?>assets/images/greeting/goodmorning.png" alt=""></div>
                                    <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <?php elseif ($currenttime >= $startsiang && $currenttime <= $endsore) : ?>
                                    <div class="profile-vector"><img class="img-fluid" src="<?= base_url(); ?>assets/images/greeting/goodafternoon.png" alt=""></div>
                                    <h4 class="f-w-600"><span id="greeting">Good Afternoon</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <?php elseif ($currenttime >= $startmalam && $currenttime <= $endmalam) : ?>
                                    <div class="profile-vector"><img class="img-fluid" src="<?= base_url(); ?>assets/images/greeting/goodnight.png" alt=""></div>
                                    <h4 class="f-w-600"><span id="greeting">Good Night</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <?php endif ?>
                                <p><span> <?= $this->session->userdata('nama') ?></span></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h3>Mini Random Quotes</h3>
                            <div class="d-flex align-items-center justify-content-between">
                                <figure class="text-start ms-5">
                                    <blockquote class="blockquote text-justify">
                                        <p><?= $quotes->content ?></p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        <?= $quotes->author ?>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php else : ?>


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h3>
                                <?php if ($currenttime >= $startdini && $currenttime <= $enddini) : ?>
                                    <h4>Don't forget to take a rest!, <?= $this->session->userdata('nama') ?></h4>
                                <?php elseif ($currenttime >= $startpagi && $currenttime <= $endpagi) : ?>
                                    <h4>Good Morning, <?= $this->session->userdata('nama') ?></h4>
                                <?php elseif ($currenttime >= $startsiang && $currenttime <= $endsore) : ?>
                                    <h4>Good Afternoon, <?= $this->session->userdata('nama') ?></h4>
                                <?php elseif ($currenttime >= $startmalam && $currenttime <= $endmalam) : ?>
                                    <h4>Good Night, <?= $this->session->userdata('nama') ?></h4>
                                <?php endif ?>
                            </h3>
                            <div class="mt-4">
                                <?php if ($currenttime >= $startdini && $currenttime <= $enddini) : ?>
                                    <div class="profile-vector"><img class="img-fluid" src="<?= base_url(); ?>assets/images/greeting/goodini.png" alt=""></div>
                                    <h4 class="f-w-600"><span id="greeting">Don't Forget To take a rest!</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <?php elseif ($currenttime >= $startpagi && $currenttime <= $endpagi) : ?>
                                    <div class="profile-vector"><img class="img-fluid" src="<?= base_url(); ?>assets/images/greeting/goodmorning.png" alt=""></div>
                                    <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <?php elseif ($currenttime >= $startsiang && $currenttime <= $endsore) : ?>
                                    <div class="profile-vector"><img class="img-fluid" src="<?= base_url(); ?>assets/images/greeting/goodafternoon.png" alt=""></div>
                                    <h4 class="f-w-600"><span id="greeting">Good Afternoon</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <?php elseif ($currenttime >= $startmalam && $currenttime <= $endmalam) : ?>
                                    <div class="profile-vector"><img class="img-fluid" src="<?= base_url(); ?>assets/images/greeting/goodnight.png" alt=""></div>
                                    <h4 class="f-w-600"><span id="greeting">Good Night</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                                <?php endif ?>
                                <p><span> <?= $this->session->userdata('nama') ?></span></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h3>Mini Random Quotes</h3>
                            <div class="d-flex align-items-center justify-content-between">
                                <figure class="text-start ms-5">
                                    <blockquote class="blockquote text-justify">
                                        <p><?= $quotes->content ?></p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        <?= $quotes->author ?>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>


    </div>
    <!-- Footer START -->
    <div class="footer">
        <div class="footer-content">
            <p class="mb-0">Copyright © 2022 Ardhacodes. All rights reserved.</p>
            <span>
                <a href="" class="text-gray me-3">Term &amp; Conditions</a>
                <a href="" class="text-gray">Privacy &amp; Policy</a>
            </span>
        </div>
    </div>
    <!-- Footer End -->
</div>
<!-- Content END -->