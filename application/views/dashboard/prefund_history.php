<?php $this->load->view('dash-partial/header.php'); ?>
<?php $this->load->view('dash-partial/sidebar.php'); ?>
<?php $this->load->view('dash-partial/nav.php'); ?>
<div class="container">
    <div class="page-inner">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Prefund History</h4>
                    </div>
                    <div class="card-body">
                        <!-- FORM -->
                        <form method="POST" action="prefund-history" class="col-md-12 d-flex flex-wrap">


                            <div class="col-md-3 mb-3">
                                <label for="start-date">Start Date: </label>
                                <div class="input-group">
                                    <input type="text" id="start-date" name="date-from"
                                        class="form-control date-range-filter" placeholder="Start Date" required
                                        value="">
                                    <span class="input-group-text" id="startDateIcon"><i
                                            class="fas fa-calendar-alt"></i></span>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="end-date">End Date: </label>
                                <div class="input-group">
                                    <input type="text" id="end-date" name="date-to"
                                        class="form-control date-range-filter" placeholder="End Date" required
                                        value="">
                                    <span class="input-group-text" id="endDateIcon"><i
                                            class="fas fa-calendar-alt"></i></span>
                                </div>
                            </div>


                            <!-- <div class="col-md-2 mb-3">
                                <label for="defaultSelect">Company Name</label>
                                <select class="form-select form-control" name="client" id="defaultSelect">
                                    <option value="all">ALL</option>

                                </select>

                            </div> -->

                             <?php if ($this->session->userdata('usertype') == 'CLIENT'): ?>
                                    <!-- Do nothing -->
                                <?php else: ?>

                                    <div class="col-md-2 mb-3">
                                        <label for="defaultSelect">Client</label>
                                        <?php
                                        $selected_client = $this->input->post('client') ?? 'all';
                                        ?>

                                        <select class="form-select form-control" name="client" id="defaultSelect">
                                            <option value="all" <?= $selected_client == 'all' ? 'selected' : '' ?>>ALL</option>
                                            <?php if (!empty($clients)): ?>
                                                <?php foreach ($clients as $client): ?>
                                                    <option value="<?= $client['company_id'] ?>" <?= $selected_client == $client['company_id'] ? 'selected' : '' ?>>
                                                        <?= $client['company_name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>

                                    </div>
                                <?php endif; ?>


                            <div class="col-md-2 mb-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>

                        </form>
                        <div class="table-responsive">
                            <div class="col-md-12 d-flex flex-wrap">


                                <!-- <div class="mb-3 d-flex align-items-end">
                                    <button id="openPasswordModal" class="btn btn-primary w-100">
                                        <i class="fas fa-money-bill-wave me-2"></i> Add Prefund
                                    </button>
                                </div> -->

                            </div>
                            <!-- <form method="POST"> -->
                            <!-- Custom Search Section -->
                            <div class="col-md-4 d-flex justify-content-end align-items-end ms-auto">

                                <label style="display: flex; align-items: center; gap: 5px;">Search:
                                    <input type="search" id="search-input" name="search_data" class="form-control" aria-controls="dataTables" required>
                                </label>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>

                            </div>

                            <table
                                id="multi-filter-select"
                                class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Reference #</th>
                                        <th>Company</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <!-- <th>Action</th> -->

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($prefund_data)): ?>
                                        <?php foreach ($prefund_data as $pdata): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($pdata['reference_number']) ?></td>
                                                <td><?= htmlspecialchars($pdata['company_name']) ?></td>
                                                <td>₱<?= number_format($pdata['amount'], 2) ?></td>
                                                <td><?= htmlspecialchars($pdata['status']) ?></td>
                                                <td><?= htmlspecialchars($pdata['created_at']) ?></td>
                                                <!-- <td>
                                                    <?php if ($pdata['status'] === 'PENDING'): ?>
                                                        <button
                                                            class="btn btn-sm btn-primary"
                                                            onclick="handleAction('<?= $pdata['reference_number'] ?>')">
                                                            Approve
                                                        </button>
                                                    <?php else: ?>
                                                        <span>-</span>
                                                    <?php endif; ?>
                                                </td> -->
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" style="text-align:center;">No prefund history found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- First Modal: Enter Password -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-sm border-0 rounded-3">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="passwordModalLabel">Authentication Required</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" style="background: red; padding-bottom:4px; border:none!important;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" width="16" height="16">
                        <path d="M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="passwordForm">
                    <div class="text-center mt-2 mb-2">
                        <span id="errorMessage" class="text-danger fw-semibold" style="display:none;"></span>
                    </div>
                    <div class="mb-3 text-center">
                        <div class="p-3 rounded shadow-sm bg-light border">
                            <label class="form-label fw-semibold fs-5 mb-1">Company Name</label>
                            <p class="form-control-plaintext fs-4 fw-bold mb-0 text-primary"><?= $this->session->userdata('company_name') ?></p>
                        </div>
                    </div>



                    <div class="mb-3">
                        <label for="bankDepositPassword" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="bankDepositPassword" placeholder="Enter your password" required />
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('bankDepositPassword')">
                                👁️
                            </button>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" form="passwordForm" class="btn btn-primary w-100">Submit</button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Second Modal: Enter Amount -->
<div class="modal fade" id="amountModal" tabindex="-1" aria-labelledby="amountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-sm border-0 rounded-3">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="amountModalLabel">Enter Amount</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" style="background: red; padding-bottom:4px; border:none!important;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" width="16" height="16">
                        <path d="M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="amountForm">
                    <div class="mb-3 text-center">
                        <div class="p-3 rounded shadow-sm bg-light border">
                            <label class="form-label fw-semibold fs-5 mb-1">Company Name</label>
                            <p class="form-control-plaintext fs-4 fw-bold mb-0 text-primary"><?= $this->session->userdata('company_name') ?></p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="amountInput" class="form-label fw-semibold">Amount (₱)</label>
                        <input type="text" class="form-control" id="companyInput" required />
                        <input type="number" min="0" class="form-control" id="amountInput" placeholder="Enter amount" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="amountForm" class="btn btn-primary w-100">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- End Custom template -->
</div>
<?php $this->load->view('dash-partial/footer.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize datepicker
        $('#start-date, #end-date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            clearBtn: true,
            orientation: 'bottom',
        }).on('changeDate', function(e) {

            const formattedDate = moment(e.date).format(
                'YYYY-MM-DD');
            $(this).val(formattedDate);
            transactionTable.draw();
        });
        // Initialize DataTable
        var table = $("#multi-filter-select").DataTable({
            pageLength: 5,
            scrollX: true,
            scrollX: '100%',
            searching: false,
            responsive: true,
            autoWidth: false,
            dom: 'frt<"bottom justify-content-between align-items-center"lip><"clear">',
            order: [
                [0, 'desc']
            ],
        });
        $(window).on('resize', function() {
            table.columns.adjust().draw();
        });
    });
    $('#start-date, #end-date').change(function() {
        table.draw();
    });

    // Datepicker icon click to open datepicker
    $("#startDateIcon").click(function() {
        $("#start-date").focus();
    });

    $("#endDateIcon").click(function() {
        $("#end-date").focus();
    });
</script>
<script>
    // $(document).ready(function() {
    //     $('#passwordForm').on('submit', function(e) {
    //         e.preventDefault();
    //         $('#passwordModal').modal('hide');

    //         setTimeout(function() {
    //             $('#amountModal').modal('show');
    //         }, 300);
    //     });

    //     $('#amountForm').on('submit', function(e) {
    //         e.preventDefault();

    //         $('#amountModal').modal('hide');
    //     });
    // });

    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>


<script>
    let passwordModal = new bootstrap.Modal(document.getElementById('passwordModal'));
    let amountModal = new bootstrap.Modal(document.getElementById('amountModal'));

    // Open password modal on button click
    document.getElementById('openPasswordModal').addEventListener('click', function() {
        passwordModal.show();
    });

    // Handle form submission inside password modal
    document.getElementById('passwordForm').addEventListener('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch('/dashboard/check_password', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                const errorMessage = document.getElementById('errorMessage');
                errorMessage.style.display = "none";

                if (data.status === true) {

                    this.reset();
                    companyInput
                    amountModal.show();


                    passwordModal.hide();
                } else {
                    errorMessage.textContent = "⚠️ " + data.message;
                    errorMessage.style.display = "inline";
                }
            })
            .catch(err => console.error("Error:", err));
    });
</script>


<script>
    function handleAction(pfId) {
        const formData = new FormData();
        formData.append("sess_id", <?= $this->session->userdata('session_id') ?>);
        formData.append("reference_number", pfId);

        Swal.fire({
            title: "Processing...",
            text: "Please wait while we approve the prefund.",
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        fetch("http://demo-webapp.test/dashboard/prefund_approval", {
                method: "POST",
                body: formData
            })
            .then((response) => response.json())
            .then((result) => {
                Swal.close();

                // Access inside "body"
                const body = result.body || {};

                if (body.status === true && body.status_code === 201) {
                    Swal.fire({
                        title: "Success ✅",
                        text: body.message, // "APPROVED"
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: "Error ❌",
                        text: body.message || "Something went wrong.",
                        icon: "error",
                        confirmButtonText: "Close"
                    });
                }
            })
            .catch((error) => {
                Swal.close();
                console.error(error);
                Swal.fire({
                    title: "Error",
                    text: "Request failed. Please try again.",
                    icon: "error",
                    confirmButtonText: "Close"
                });
            });
    }
</script>