<!-- Quick View START -->
<div class="modal modal-right fade quick-view" id="quick-view">
    <div class="modal-dialog right">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title pull-left">Theme Config</h4>
                <button type="button" class="close pull-right" data-bs-dismiss="modal">
                    <span>×</span>
                </button>
            </div>
            <div class="modal-body scrollable">
                <div class="mb-4">
                    <h5 class="mb-0">Header Color</h5>
                    <p>Config header background color</p>
                    <div class="theme-configurator d-flex mt-2">
                        <div class="radio">
                            <input id="header-default" name="header-theme" type="radio" checked value="#ffffff">
                            <label for="header-default"></label>
                        </div>
                        <div class="radio">
                            <input id="header-primary" name="header-theme" type="radio" value="#11a1fd">
                            <label for="header-primary"></label>
                        </div>
                        <div class="radio">
                            <input id="header-success" name="header-theme" type="radio" value="#00c569">
                            <label for="header-success"></label>
                        </div>
                        <div class="radio">
                            <input id="header-info" name="header-theme" type="radio" value="#5a75f9">
                            <label for="header-info"></label>
                        </div>
                        <div class="radio">
                            <input id="header-warning" name="header-theme" type="radio" value="#ffc833">
                            <label for="header-warning"></label>
                        </div>
                        <div class="radio">
                            <input id="header-danger" name="header-theme" type="radio" value="#f46363">
                            <label for="header-danger"></label>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <h5 class="mb-0">Side Nav Dark</h5>
                    <p>Change Side Nav to dark</p>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="side-nav-theme-toggle" id="side-nav-theme-toggle">
                        <label class="form-check-label" for="side-nav-theme-toggle"></label>
                    </div>
                </div>
                <hr>
                <div>
                    <h5 class="mb-0">Folded Menu</h5>
                    <p>Toggle Folded Menu</p>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                        <label class="form-check-label" for="side-nav-fold-toogle"></label>
                    </div>
                </div>
                <div>
                    <h5 class="mb-0">Horizontal Layout</h5>
                    <p>Set Horizontal Layout</p>
                    <div class="btn-group btn-group-sm">
                        <a href="#" class="btn btn-outline-primary active" aria-current="page">Vertical</a>
                        <a href="h-index.html" class="btn btn-outline-primary">Horizontal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick View END -->
</div>
</div>


<!-- Core Vendors JS -->
<script src="<?= base_url() ?>assets/js/vendors.min.js"></script>

<!-- Jquery -->


<!-- Moment JS -->
<script src="<?= base_url() ?>assets/vendors/daterange/moment.min.js"></script>
<!-- Daterange -->
<script src="<?= base_url() ?>assets/vendors/daterange/daterangepicker.js"></script>
<!-- FLATPICKR (DATE) -->
<script src="<?= base_url() ?>assets/vendors/flatpickr/flatpickr.js"></script>
<!-- SELECT2 -->
<script src="<?= base_url() ?>assets/vendors/select2/select2.js"></script>

<!-- DATATABLES -->
<script src="<?= base_url() ?>assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables/dataTables.bootstrap.min.js"></script>

<!-- page js -->
<script src="<?= base_url() ?>assets/vendors/apexcharts/dist/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/dashboard.js"></script>

<!-- Core JS -->
<script src="<?= base_url() ?>assets/js/app.min.js"></script>

<script>
    $(function() {
        $("#tgl").daterangepicker({
            locale: {
                format: 'DD/MMM/YYYY',
                singleDatePicker: true,
                showDropdowns: true
            }
        });
    });
</script>

<script>
    $(".flatpickr").flatpickr({
        dateFormat: "Y-m-d"
    });
    $(".timepickr").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i:s",
        time_24hr: true,
    });
</script>

<script>
    $('.data-table').DataTable({
        'columnDefs': [{
            'orderable': false,
            'targets': 0
        }]
    });
</script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

</body>

</html>