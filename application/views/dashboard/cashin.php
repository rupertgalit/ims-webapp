<?php $this->load->view('dash-partial/header.php'); ?>
<?php $this->load->view('dash-partial/sidebar.php'); ?>
<?php $this->load->view('dash-partial/nav.php'); ?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cash In</h4>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">

                            <!-- FORM -->
                            <form method="POST" action="cashin" class="col-md-12 d-flex flex-wrap">


                                <div class="col-md-3 mb-3">
                                    <label for="start-date">Start Date: </label>
                                    <div class="input-group">
                                        <input type="text" id="start-date" name="date-from"
                                            class="form-control date-range-filter" placeholder="Start Date" required
                                            value="<?= $date_from ? $date_from : date('Y-m-d'); ?>">
                                        <span class="input-group-text" id="startDateIcon"><i
                                                class="fas fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="end-date">End Date: </label>
                                    <div class="input-group">
                                        <input type="text" id="end-date" name="date-to"
                                            class="form-control date-range-filter" placeholder="End Date" required
                                            value="<?= $date_to ? $date_to : date('Y-m-d'); ?>">
                                        <span class="input-group-text" id="endDateIcon"><i
                                                class="fas fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="defaultSelect">Status</label>
                                    <select class="form-select form-control" name="status" id="defaultSelect">
                                        <option value="all" <?= $selected_status == 'all' ? 'selected' : '' ?>>ALL
                                        </option>
                                        <option value="success" <?= $selected_status == 'success' ? 'selected' : '' ?>>
                                            SUCCESS</option>
                                        <option value="created" <?= $selected_status == 'created' ? 'selected' : '' ?>>
                                            CREATED</option>
                                        <option value="failed" <?= $selected_status == 'failed' ? 'selected' : '' ?>>
                                            FAILED</option>
                                    </select>
                                </div>
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
                        </div>
                        <div class="table-responsive">

                        <!--custom search -->
                            <form method="POST" action="search">

                                <div class="col-md-4 d-flex justify-content-end align-items-end ms-auto">

                                    <label style="display: flex; align-items: center; gap: 5px;">Search:
                                        <input type="search" id="search-input" name="search_data" class="form-control" aria-controls="dataTables" required>
                                    </label>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>

                                </div>
                            </form> 
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Company Name</th>
                                        <th>Req Reference</th>
                                        <th>Trans Reference</th>
                                        <th>Merchant Reference</th>
                                        <th>Amount</th>
                                        <!-- <th>Ngsi Fee</th>
                                        <th>Total Amount</th> -->
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Date Modified</th>
                                        <th>Trans Type</th>
                                        <th>Bank Ref</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($records)) { ?>
                                        <?php foreach ($records as $row): ?>
                                            <tr>
                                                <td><?= $row['ci_id']; ?></td>
                                                <td><?= $row['company_name']; ?></td>
                                                <td><?= $row['reference_number']; ?></td>
                                                <td><?= $row['trans_reference']; ?></td>
                                                <td><?= $row['merchant_ref']; ?></td>
                                                <td><?= number_format($row['txn_amount'], 3); ?></td>
                                                <!-- <td><?= $row['deducted_amount']; ?></td>
                                                <td><?= $row['total_amount']; ?></td> -->
                                                <td class="status-label <?php echo strtolower($row['status']); ?>">
                                                    <?= $row['status']; ?>
                                                </td>
                                                <td><?= $row['date_requested']; ?></td>
                                                <td><?= $row['date_modified']; ?></td>
                                                <td class="type-label <?php echo strtolower($row['type']); ?>">
                                                    <?= $row['type']; ?>
                                                </td>
                                                <td><?= $row['bank_reference']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td>
                                                    <div class="btn-group dropdown">
                                                        <button class="btn dropdown-toggle" type="button"
                                                            data-bs-toggle="dropdown">Details
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a class="dropdown-item view-btn"
                                                                    data-reference="<?= $row['reference_number']; ?>"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#viewModal">View</a>

                                                            </li>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view('dashboard/modals/md_cashin_viewdetails.php'); ?>
    <?php $this->load->view('dash-partial/footer.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script>
        document.getElementById('defaultSelect').addEventListener('change', function() {
            const selectElement = this;
            selectElement.classList.remove('success', 'pending', 'failed');

            // Add the appropriate class based on the selected value
            const selectedValue = selectElement.value;
            if (selectedValue === 'success') {
                selectElement.classList.add('success');
            } else if (selectedValue === 'pending') {
                selectElement.classList.add('pending');
            } else if (selectedValue === 'failed') {
                selectElement.classList.add('failed');
            }
        });

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

            // Initialize DataTables
            var transactionTable = $("#multi-filter-select").DataTable({
                pageLength: 5,
                order: [
                    [0, 'desc']
                ],
                scrollX: '100%',
                scrollCollapse: true,
                responsive: true,
                autoWidth: false,
                searching: false,
                dom: 'Bfrt<"bottom justify-content-between align-items-center"lip><"clear">',
                buttons: [{
                    extend: 'collection',
                    text: '<i class="fa fa-download"></i> Export ',
                    className: 'btn  dropdown-toggle',
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


            // Disable export button if no data
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


            // Event listener to the date range filtering inputs to redraw on input
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
        });
    </script>


    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".view-btn");

            buttons.forEach(button => {
                button.addEventListener("click", function() {
                    const refNum = this.getAttribute("data-reference");

                    // Show loading message
                    // document.getElementById("modal-content").innerHTML = "Loading...";

                    // Call your API
                    const myHeaders = new Headers();


                    const formdata = new FormData();
                    formdata.append("refnum", refNum);

                    const requestOptions = {
                        method: "POST",
                        headers: myHeaders,
                        body: formdata,
                        redirect: "follow"
                    };

                    fetch("<?= base_url() ?>/check-payment-details", requestOptions)
                        .then(response => response.json())
                        .then(result => {
                            if (result.status && result.data) {

                                const rawOtherDetails = result.data.other_details;
                                console.log(result);

                                function setDateTimeFields(datetime, dateId, timeId) 
                                {
                                    if (!datetime) return;

                                    const [date, time] = datetime.split(' ');
                                    const [hour, minute] = time.split(':');
                                    const hour12 = hour % 12 || 12;
                                    const ampm = hour < 12 ? 'AM' : 'PM';
                                    const formattedTime = `${hour12}:${minute} ${ampm}`;

                                    document.getElementById(dateId).value = date;
                                    document.getElementById(timeId).value = formattedTime;
                                }

                                setDateTimeFields(result.data.date_requested, 'date-created', 'time-created');
                                setDateTimeFields(result.data.date_modified, 'date-modified', 'time-modified');


                                if (rawOtherDetails) 
                                {
                                    try {

                                        const cleaned = rawOtherDetails.replace(/,?\{\"item\"$/, ""); // Fix broken JSON if needed
                                        const otherDetails = JSON.parse(cleaned);


                                        let html = `
                                            <div class="card mb-4">
                                                <div class="card-header">
                                                    <strong>Other Details</strong>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>Item</th>
                                                                    <th>Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>`;

                                        otherDetails.forEach(detail => {
                                            html += `
                                                                <tr>
                                                                    <td>${detail.item}</td>
                                                                    <td>₱${detail.amount}</td>
                                                                </tr>`;

                                        });
                                        html += `
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>`;


                                        document.getElementById("other-details").innerHTML = html;

                                        document.getElementById('type').value = result.data.type;
                                        document.getElementById('company-name').value = result.data.company_name;
                                        document.getElementById('txn-ref').value = result.data.trans_reference;
                                        document.getElementById('reference-no').value = result.data.reference_number;
                                        document.getElementById('merchant-ref').value = result.data.merchant_ref;
                                        document.getElementById('email').value = result.data.email;

                                        document.getElementById('payment-status').value = result.data.cashin_status;
                                        document.getElementById('txid').value = result.data.txId;
                                        document.getElementById('remarks').value = result.data.remarks;

                                        document.getElementById('primary-status').innerHTML = result.data.cashin_status

                                    } 
                                    catch (e) 
                                    {
                                        console.error("Failed to parse other_details JSON:", e);
                                    }
                                } 
                                else 
                                {
                                    document.getElementById("other-details").innerHTML = "<p>No additional Details.</p>";
                                }
                            } 
                            else 
                            {
                                document.getElementById("other-details").innerHTML = "<p>Invalid response from server.</p>";
                            }
                        })
                        .catch(error => console.error("Fetch error:", error));
                });
            });
        });
    </script> -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".view-btn");

            buttons.forEach(button => {
                button.addEventListener("click", function() {
                    const refNum = this.getAttribute("data-reference");

                    const formData = new FormData();
                    formData.append("refnum", refNum);

                    fetch("<?= base_url('check-payment-details') ?>", {
                            method: "POST",
                            body: formData
                        })
                        .then(response => response.json())
                        .then(result => {
                            console.log(result);
                            if (result.status && result.data) {
                                const data = result.data.data;
                                console.log(data.type);

                                const setDateTimeFields = (datetime, dateId, timeId) => {
                                    if (!datetime) return;
                                    const [date, time] = datetime.split(' ');
                                    const [hour, minute] = time.split(':');
                                    const hour12 = hour % 12 || 12;
                                    const ampm = hour < 12 ? 'AM' : 'PM';
                                    const formattedTime = `${hour12}:${minute} ${ampm}`;
                                    document.getElementById(dateId).value = date;
                                    document.getElementById(timeId).value = formattedTime;
                                };

                                setDateTimeFields(data.date_requested, 'date-created', 'time-created');
                                setDateTimeFields(data.date_modified, 'date-modified', 'time-modified');

                                // Parse `other_details` safely
                                let html = '';
                                if (data.other_details) {
                                    try {
                                        const cleaned = data.other_details.replace(/,?\{"item"$/, ""); // repair invalid JSON if needed
                                        const otherDetails = JSON.parse(cleaned);

                                        html += `
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <strong>Other Details</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>`;

                                        otherDetails.forEach(detail => {
                                            html += `
                                    <tr>
                                        <td>${detail.item}</td>
                                        <td>${detail.amount}</td>
                                    </tr>`;
                                        });

                                        html += `
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>`;
                                    } catch (e) {
                                        console.error("Failed to parse other_details JSON:", e);
                                        html = "<p>Unable to parse additional details.</p>";
                                    }
                                } else {
                                    html = "<p>No additional details available.</p>";
                                }

                                document.getElementById("other-details").innerHTML = html;

                                // Fill other fields
                                document.getElementById('type').value = data.type || '';
                                document.getElementById('company-name').value = data.company_name || '';
                                document.getElementById('txn-ref').value = data.trans_reference || '';
                                document.getElementById('reference-no').value = data.reference_number || '';
                                document.getElementById('merchant-ref').value = data.merchant_ref || '';
                                document.getElementById('email').value = data.email || '';
                                document.getElementById('payment-status').value = data.cashin_status || '';
                                document.getElementById('txid').value = data.txId || '';
                                document.getElementById('bank-ref').value = data.bank_reference || '';
                                document.getElementById('remarks').value = data.remarks || '';
                                document.getElementById('primary-status').innerHTML = data.cashin_status || '';

                            } else {
                                document.getElementById("other-details").innerHTML = "<p>No valid data found.</p>";
                            }
                        })
                        .catch(error => {
                            console.error("Fetch error:", error);
                            document.getElementById("other-details").innerHTML = "<p>Error fetching data.</p>";
                        });
                });
            });
        });
    </script>