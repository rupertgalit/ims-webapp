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
                        <h4 class="card-title">Prefunding</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">

                      
                            <!-- <form method="POST" class="col-md-12 d-flex flex-wrap">


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



                                <?php if ($this->session->userdata('usertype') == 'CLIENT'): ?>
                               
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

                            </form> -->
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

                            </div> -->

                            <table
                                id="multi-filter-select"
                                class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Company Name</th>
                                        <th>Current Balance</th>
                                        <th>Previous Balance</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php if (!empty($companies)): ?>
                                        <?php $i = 1;
                                        foreach ($companies as $row): ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= isset($row['company_name']) ? $row['company_name'] : ''; ?></td>
                                                <td><?= isset($row['co_current_balance']) ? number_format($row['co_current_balance'], 2) : ''; ?></td>
                                                <td><?= isset($row['co_previous_amount']) ? number_format($row['co_previous_amount'], 2) : ''; ?></td>
                                                <td><?= isset($row['created_date']) ? $row['created_date'] : ''; ?></td>
                                                <td>
                                                    <button
                                                        class="btn btn-sm btn-primary view-btn"
                                                        type="button"
                                                        data-company="<?= $row['company_name']; ?>">
                                                        Prefund
                                                    </button>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No records found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>


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
<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-sm border-0 rounded-3">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="passwordModalLabel">Authentication Required</h5>
                <button type="button" onclick="closeModal()" aria-label="Close" style="background: red; padding-bottom:4px; border:none!important;">
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
                            <p class="form-control-plaintext fs-4 fw-bold mb-0 text-primary" id="modalCompanyName"></p>
                        </div>
                    </div>

                    <input type="hidden" name="company_name" id="companyInput" />

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
<!-- <div class="modal fade" id="amountModal" tabindex="-1" aria-labelledby="amountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-sm border-0 rounded-3">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="amountModalLabel">Enter Amount</h5>
                <button type="button" onclick="closeModal()" aria-label="Close" style="background: red; padding-bottom:4px; border:none!important;">
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
                            <p class="form-control-plaintext fs-4 fw-bold mb-0 text-primary" id="amountCompanyName"></p>
                        </div>
                    </div>

                   
                    <input type="hidden" name="companyname" id="amountCompanyInput" />

                    <div class="mb-3">
                        <label for="amountInput" class="form-label fw-semibold">Amount (₱)</label>
                        <input type="number" min="0" class="form-control" name="amount" id="amountInput" placeholder="Enter amount" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="amountForm" class="btn btn-primary w-100">Submit</button>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="amountModal" tabindex="-1" aria-labelledby="amountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-sm border-0 rounded-3">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="amountModalLabel">Enter Amount</h5>
                <button type="button" onclick="closeModal()" aria-label="Close" style="background: red; padding-bottom:4px; border:none!important;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" width="16" height="16">
                        <path d="M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z" />
                    </svg>
                </button>
            </div>

            <div class="modal-body">
                <form id="amountForm" enctype="multipart/form-data">
                    <div class="mb-3 text-center">
                        <div class="p-3 rounded shadow-sm bg-light border">
                            <label class="form-label fw-semibold fs-5 mb-1">Company Name</label>
                            <p class="form-control-plaintext fs-4 fw-bold mb-0 text-primary" id="amountCompanyName"></p>
                        </div>
                    </div>

                    <!-- hidden input to pass company name on submit -->
                    <input type="hidden" name="companyname" id="amountCompanyInput" />

                    <div class="mb-3">
                        <label for="amountInput" class="form-label fw-semibold">Amount (₱)</label>
                        <input type="number" min="0" class="form-control" name="amount" id="amountInput" placeholder="Enter amount" required>
                    </div>

                    <div class="mb-3">
                        <label for="bankReference" class="form-label fw-semibold">Bank Reference</label>
                        <input type="text" class="form-control" name="bank_reference" id="bankReference" placeholder="Enter bank reference">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload Proof Image</label>
                        <input type="file" class="form-control" accept="image/*" name="proof_image" id="proofImage" onchange="previewImage()" required>

                        <!-- Hidden field only stores filename for DB -->
                        <input type="hidden" name="proof_image_name" id="imageName">

                        <div class="mt-2 text-center">
                            <img id="imagePreview" src="" alt="Preview" style="max-width: 200px; display: none; border: 1px solid #ddd; padding: 5px; border-radius: 5px;">
                        </div>
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
        transactionTable.draw();
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
<!-- 
<script>
document.addEventListener("DOMContentLoaded", function () {
    // When Prefund is clicked
    document.querySelectorAll(".view-btn").forEach(function (btn) {
        btn.addEventListener("click", function () {
            let companyName = this.getAttribute("data-company");
            document.getElementById("companyName").innerText = companyName;
        });
    });
});
</script> -->

<script>
    let passwordModalEl = document.getElementById('passwordModal');
    let passwordModal = new bootstrap.Modal(passwordModalEl, {
        backdrop: 'static',
        keyboard: false
    });

    let amountModalEl = document.getElementById('amountModal');
    let amountModal = new bootstrap.Modal(amountModalEl, {
        backdrop: 'static',
        keyboard: false
    });


    let openAmountAfterClose = false; // flag

    // When clicking Prefund button, inject company name into modal
    document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault(); // prevent jump to top
            let companyName = this.getAttribute('data-company');
            document.getElementById('modalCompanyName').textContent = companyName;
            document.getElementById('companyInput').value = companyName;

            passwordModal.show(); // open via JS
        });
    });


    // Handle form submission
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
                    let companyName = document.getElementById('companyInput').value;

                    // set it in amount modal
                    document.getElementById('amountCompanyName').textContent = companyName;
                    document.getElementById('amountCompanyInput').value = companyName;

                    this.reset();

                    passwordModal.hide();
                    amountModal.show();

                } else {
                    errorMessage.textContent = "⚠️ " + data.message;
                    errorMessage.style.display = "inline";
                }
            })
            .catch(err => console.error("Error:", err));
    });


    passwordModalEl.addEventListener('hidden.bs.modal', function() {
        document.getElementById('errorMessage').style.display = "none";
        document.getElementById('errorMessage').textContent = "";
        document.getElementById('passwordForm').reset();
        document.getElementById('modalCompanyName').textContent = "";
        document.getElementById('companyInput').value = "";
    });
    amountModalEl.addEventListener('hidden.bs.modal', function() {
        document.getElementById('amountForm').reset(); // clears inputs
        document.getElementById('amountCompanyName').textContent = "";
        document.getElementById('amountCompanyInput').value = "";
    });

    function closeModal() {
        passwordModal.hide();
        amountModal.hide();

        // clear data on 2nd modal upon closing
        document.getElementById('passwordForm').reset();
        document.getElementById('modalCompanyName').textContent = "";
        document.getElementById('companyInput').value = "";
        document.getElementById('errorMessage').style.display = "none";
        document.getElementById('errorMessage').textContent = "";

        document.getElementById('amountForm').reset();
        document.getElementById('amountCompanyName').textContent = "";
        document.getElementById('amountCompanyInput').value = "";

        const preview = document.getElementById("imagePreview");
        const imageName = document.getElementById("imageName");
        const fileInput = document.getElementById("proofImage");

        preview.removeAttribute("src");
        preview.style.display = "none";

        imageName.value = "";
        fileInput.value = "";
    }
</script>


<script>
    document.getElementById('amountForm').addEventListener('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch('/dashboard/add_prefund_client', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                // amountModal.hide();

                console.log(data);

                if (data.status === true) {
                    amountModal.hide();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = "prefund";
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: data.message
                    });
                }
            })
            .catch(err => {
                console.error("Error:", err);
                // amountModal.hide();

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please try again later.'
                });
            });
    });
</script>




<script>
    document.getElementById("amountInput").addEventListener("keydown", function(e) {
        if (["e", "E", "-", "+"].includes(e.key)) {
            e.preventDefault();
        }
    });
    document.getElementById("amountInput").addEventListener("input", function() {
        let val = this.value;
        if (val.length > 1 && val.startsWith("0")) {
            this.value = val.replace(/^0+/, "");
        }

        if (val === "0") {
            this.value = "";
        }
    });
</script>


<!-- preview image  -->
<script>
    function previewImage() {
        let fileInput = document.getElementById('proofImage');
        let preview = document.getElementById('imagePreview');
        let file = fileInput.files[0];

        if (file) {
            // Set preview
            preview.style.display = 'block';
            preview.src = URL.createObjectURL(file);

            // Extract filename only
            document.getElementById('imageName').value = file.name;
        }
    }
</script>