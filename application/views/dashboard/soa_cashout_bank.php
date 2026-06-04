<?php $this->load->view('dash-partial/header.php'); ?>
<?php $this->load->view('dash-partial/sidebar.php'); ?>
<?php $this->load->view('dash-partial/nav.php'); ?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cash Out</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="line-home-tab" data-bs-toggle="pill" href="#line-home"
                                    role="tab" aria-controls="line-home" aria-selected="true">SOA</a>
                            <li class="nav-item">
                                <a class="nav-link" id="line-profile-tab" data-bs-toggle="pill" href="#line-profile"
                                    role="tab" aria-controls="line-profile" aria-selected="false">Check Reference</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3 mb-3" id="line-tabContent">
                            <!-- SOA tab -->
                            <div class="tab-pane fade show active" id="line-home" role="tabpanel"
                                aria-labelledby="line-home-tab">
                                <!-- Date and Filter Form -->
                                <div class="row mb-3">
                                    <form method="POST" action="banks" class="col-md-12 d-flex flex-wrap">
                                        <div class="col-md-3 mb-3">
                                            <label for="start-date">Start Date: </label>
                                            <div class="input-group">
                                                <input type="text" id="start-date" name="start-date"
                                                    class="form-control date-range-filter" placeholder="yyyy-mm-dd" required>
                                                <span class="input-group-text" id="startDateIcon"><i
                                                        class="fas fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="end-date">End Date: </label>
                                            <div class="input-group">
                                                <input type="text" id="end-date" name="end-date"
                                                    class="form-control date-range-filter" placeholder="yyyy-mm-dd" required>
                                                <span class="input-group-text" id="endDateIcon"><i
                                                        class="fas fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-3 d-flex align-items-end">
                                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                                        </div>
                                    </form>
                                </div>


                                <div class="table-responsive">
                                    <!-- <form method="POST"> -->
                                    <!-- Custom Search Section -->
                                    <!-- <div class="col-md-4 d-flex justify-content-end align-items-end ms-auto">

                                            <label style="display: flex; align-items: center; gap: 5px;">Search:
                                                <input type="search" id="search-input" name="search_data" class="form-control" aria-controls="dataTables" required>
                                            </label>

                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </button>

                                        </div>
                                    </form> -->
                                    <table id="multi-filter-select" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>TRANDID</th>
                                                <th>BANKREFERENCE</th>
                                                <th>ACCOUNTNUMBER</th>
                                                <th>TRANDATE</th>
                                                <th>TRANAMOUNT</th>
                                                <th>RUNNINGBALANCE</th>
                                                <th>TRANTYPE</th>
                                                <th>REFERENCE</th>
                                                <th>SENDERFID</th>
                                                <th>TRANDESCRIPTION</th>
                                                <th>TRANCODE</th>
                                                <th>IBFTSTATUS</th>

                                            </tr>

                                        </thead>
                                        <tbody>
                                            <!-- <?php foreach ($values as $row): ?>
                                                <tr>
                                                    <?php foreach ($row as $val): ?>
                                                        <td><?= htmlspecialchars($val) ?></td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            <?php endforeach; ?> -->

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <!-- Check Reference tab -->
                            <div class="tab-pane fade" id="line-profile" role="tabpanel"
                                aria-labelledby="line-profile-tab">
                                <div class="row mb-3">

                                    <form id="referenceForm" class="col-md-12 d-flex flex-wrap">

                                        <div class="col-md-3 mb-3">
                                            <label for="merchant-type">Merchant Type: </label>
                                            <select name="merchant-type" id="merchant-type" class="form-control" required>
                                                <option value="">Select Type</option>
                                                <option value="test">Test</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="merch-ref">Merchant Number: </label>
                                            <div class="input-group">
                                                <input type="text" name="merch-ref" id="merch-ref"
                                                    class="form-control date-range-filter" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-3 d-flex align-items-end">
                                            <button type="submit" class="btn submit-btn btn-primary w-100">Submit</button>
                                        </div>

                                    </form>



                                </div>

                                <!-- End of Reference Tab -->
                            </div>

                            <!-- CheckReference Modal -->
                            <div class="modal fade" id="CheckReferenceModal" tabindex="-1" aria-labelledby="CheckReferenceModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header text-white" style="background: #05113b;">
                                            <h5 class="modal-title" id="CheckReferenceModalLabel">
                                                Check Reference Details
                                            </h5>
                                            <button type="button" data-dismiss="modal" aria-label="Close" style="background: red; padding-bottom:4px; border:none!important;">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" width="16" height="16">
                                                    <path d="M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="modalBody">
                                            <div class="row mb-3">
                                                <div class="col-12"><strong>Merchant Reference:</strong> <span id="merch-id"></span></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-12"><strong>Status:</strong> <span id="merch-status"></span></div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!-- No data Found Modal -->
                            <div class="modal fade" id="NoDataFoundModal" tabindex="-1" aria-labelledby="NoDataFoundModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header text-white" style="background: #05113b;">
                                            <h5 class="modal-title" id="NoDataFoundModalLabel">
                                                Check Reference Details
                                            </h5>
                                            <button type="button" data-dismiss="modal" aria-label="Close" style="background: red; padding-bottom:4px; border:none!important;">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" width="16" height="16">
                                                    <path d="M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="modalBody" style="text-align: center;">
                                            <p>No data was found matching your request.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('dash-partial/footer.php'); ?>
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

        <script>
            $('.submit-btn').on('click', function(event) {
                event.preventDefault();

                var merchId = document.getElementById("merch-ref").value;

                const myHeaders = new Headers();


                const formdata = new FormData();
                formdata.append("sess-id", "<?= $this->session->userdata("session_id") ?>");
                formdata.append("merch-ref", merchId);

                const requestOptions = {
                    method: "POST",
                    headers: myHeaders,
                    body: formdata,
                    redirect: "follow"
                };

                // Trigger fetch request
                fetch("<?= base_url() ?>/check_ref_bank", requestOptions)
                    .then((response) => response.json())
                    .then((result) => {
                        console.log(result.status);
                        console.log(result.data.merc_token);
                        if (result.status) {

                            document.getElementById("merch-id").innerHTML = result.data.merc_token;
                            document.getElementById("merch-status").innerHTML = result.data.ErrorMsg;
                            let myModal = new bootstrap.Modal(document.getElementById('CheckReferenceModal'));
                            myModal.show();
                        } else {
                            let myModal = new bootstrap.Modal(document.getElementById('NoDataFoundModal'));
                            myModal.show();
                        }


                    })
                    .catch((error) => console.error('Error:', error));
            });
        </script>

        <script>
            $(document).ready(function() {

                // Initialize datepicker
                $('#start-date, #end-date, #start-date-cashin, #end-date-cashin').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
                    clearBtn: true,
                    orientation: 'bottom'
                });

                // Initialize DataTables
                var transactionTable = $("#multi-filter-select").DataTable({
                    pageLength: 5,
                    scrollX: true,
                    scrollX: '100%',
                    responsive: true,
                    autoWidth: false,
                    dom: 'Bfrt<"bottom justify-content-between align-items-center"lip><"clear">',
                    buttons: [{
                        extend: 'collection',
                        text: '<i class="fa fa-download"></i> Export ',
                        className: 'btn dropdown-toggle',
                        buttons: [{
                                extend: 'excelHtml5',
                                text: 'Export to Excel',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':not(:last-child)',
                                },
                            },
                            {
                                extend: 'csvHtml5',
                                text: 'Export to CSV',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':not(:last-child)',
                                },
                            },
                        ]
                    }],

                });

                function toggleExportButton() {
                    var rowCount = transactionTable.rows().count();
                    var exportButton = transactionTable.button(
                        0); // The index 0 refers to the first button (Export button)

                    if (rowCount === 0) {
                        exportButton.disable(); // Disable the button if there are no rows
                    } else {
                        exportButton.enable(); // Enable the button if there are rows
                    }
                }

                // Call the function initially to set the correct button state
                toggleExportButton();

                // Call the function every time the table is redrawn (e.g., after filtering)
                transactionTable.on('draw', function() {
                    toggleExportButton();
                });
                $(window).on('resize', function() {
                    transactionTable.columns.adjust().draw();
                });

                var cashInTable = $("#cashin-datatables").DataTable({
                    pageLength: 5,
                    scrollX: true,
                    scrollX: '100%',
                    responsive: true,
                    autoWidth: false,
                    dom: 'rt<"bottom d-flex justify-content-between align-items-center"lip><"clear">',
                });
                $(window).on('resize', function() {
                    cashInTable.columns.adjust().draw();
                });
                // Event listener to the date range filtering inputs to redraw on input
                $('#start-date, #end-date').change(function() {
                    transactionTable.draw();
                });

                $('#start-date-cashin, #end-date-cashin').change(function() {
                    cashInTable.draw();
                });
            });


            $(document).ready(function() {
                $("#startDateIcon").click(function() {
                    $("#start-date").focus();
                });

                $("#endDateIcon").click(function() {
                    $("#end-date").focus();
                });
                $("#startDateCashinIcon").click(function() {
                    $("#start-date-cashin").focus();
                });

                $("#endDateCashinIcon").click(function() {
                    $("#end-date-cashin").focus();
                });
            });
        </script>
        <!-- <script>
        document.getElementById('referenceForm').addEventListener('submit', function(event) {
            event.preventDefault();

            if (this.checkValidity()) {
                let myModal = new bootstrap.Modal(document.getElementById('CheckReferenceModal'));
                myModal.show();
            } else {
                this.reportValidity();
            }
        });
    </script> -->

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const myHeaders = new Headers();

                const formdata = new FormData();
                formdata.append("session-id", <?= $this->session->userdata("session_id") ?>);

                const requestOptions = {
                    method: "POST",
                    headers: myHeaders,
                    body: formdata,
                    redirect: "follow"
                };

                fetch("<?= base_url() ?>/dashboard/dashboard_data", requestOptions)
                    .then((response) => response.json())
                    .then((result) => console.log(result))
                    .catch((error) => console.error(error));

            });
        </script>