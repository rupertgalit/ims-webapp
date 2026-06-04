<?php $this->load->view('dash-partial/header.php'); ?>
<?php $this->load->view('dash-partial/sidebar.php'); ?>
<?php $this->load->view('dash-partial/nav.php'); ?>


<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">2C2P Transactions</h4>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">

                            <!-- FORM -->
                             <form method="POST" action="cashin-2c2p" class="col-md-12 d-flex flex-wrap">


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
                            <!-- <form method="POST" action="search">

                                <div class="col-md-4 d-flex justify-content-end align-items-end ms-auto">

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
                                        <th>ID</th>
                                        <th>Company Name</th>
                                        <th>Req Reference</th>
                                        <th>Trans Reference</th>
                                        <th>Merchant Reference</th>
                                        <th>Amount</th>
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

    <?php $this->load->view('dashboard/modals/md_2c2p_viewdetails.php'); ?>
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

            function toggleExportButton() {
                var rowCount = transactionTable.rows().count();
                var exportButton = transactionTable.button(
                    0);

                if (rowCount === 0) {
                    exportButton.disable();
                } else {
                    exportButton.enable();
                }
            }

            toggleExportButton();

            transactionTable.on('draw', function() {
                toggleExportButton();
            });

            $('#start-date, #end-date').change(function() {
                transactionTable.draw();
            });
            $("#startDateIcon").click(function() {
                $("#start-date").focus();
            });

            $("#endDateIcon").click(function() {
                $("#end-date").focus();
            });
        });
    </script>