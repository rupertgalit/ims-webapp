<?php $this->load->view('dash-partial/header.php'); ?>
<?php $this->load->view('dash-partial/sidebar.php'); ?>
<?php $this->load->view('dash-partial/nav.php'); ?>
<style>
    .company-box {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 0.75rem;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .company-box:hover {
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="container">
    <div class="page-inner">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bank Deposit</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">

                        </div>
                        <div class="table-responsive">
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
                                        <th>API ID</th>
                                        <th>Company Name</th>
                                        <th>Date Created</th>
                                        <th>Update Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>

                                        <td>1</td>
                                        <td>ISELCO II</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button class="btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown">Top-Up
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a class="dropdown-item view-btn" href="#"
                                                            data-bs-toggle="modal" data-bs-target="#passwordModal">Bank Deposit</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td>1</td>
                                        <td>PCAB</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button class="btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown">Top-Up
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a class="dropdown-item view-btn" href="#"
                                                            data-bs-toggle="modal" data-bs-target="#passwordModal">bankDeposit</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </td>

                                    </tr>



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
                        <span class="text-danger fw-semibold">⚠️Error message</span>
                    </div>
                    <div class="mb-3 text-center">
                        <div class="p-3 rounded shadow-sm bg-light border">
                            <label class="form-label fw-semibold fs-5 mb-1">Company Name</label>
                            <p class="form-control-plaintext fs-4 fw-bold mb-0 text-primary">ISELCO II</p>
                        </div>
                    </div>



                    <div class="mb-3">
                        <label for="bankDepositPassword" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="bankDepositPassword" placeholder="Enter your password" required />
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('bankDepositPassword')">
                                👁️
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="passwordForm" class="btn btn-primary w-100">Submit</button>
            </div>
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
                            <p class="form-control-plaintext fs-4 fw-bold mb-0 text-primary">ISELCO II</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="amountInput" class="form-label fw-semibold">Amount (₱)</label>
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
<script>
    $(document).ready(function() {
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
</script>
<script>
    $(document).ready(function() {
        $('#passwordForm').on('submit', function(e) {
            e.preventDefault();
            $('#passwordModal').modal('hide');

            setTimeout(function() {
                $('#amountModal').modal('show');
            }, 300);
        });

        $('#amountForm').on('submit', function(e) {
            e.preventDefault();

            $('#amountModal').modal('hide');
        });
    });

    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>