<div class="container">
    <div class="page-inner">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Logs</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">

                        </div>
                        <div class="row">
                            <!-- Form Section -->
                            <form method="POST" action="/user-logs" class="col-md-8 d-flex flex-wrap" style="gap: 5px;">
                                <div class="col-md-3">
                                    <label for="start-date">Start ID</label>
                                    <div class="input-group">
                                        <input type="text" id="start-date" name="start-id"
                                            class="form-control date-range-filter" placeholder="from"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                        <span class="input-group-text" id="startDateIcon">#</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="end-date">End ID:</label>
                                    <div class="input-group">
                                        <input type="text" id="end-date" name="end-id"
                                            class="form-control date-range-filter" placeholder="to"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                        <span class="input-group-text" id="endDateIcon">#</span>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
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
                                        <th>Log ID</th>
                                        <th>Session ID</th>
                                        <th>UID</th>
                                        <th>IP Adress</th>
                                        <th>User Agent</th>
                                        <th>Date Added</th>
                                        <th>Log Type</th>
                                        <th>Log Action</th>
                                        <th>Session Expired</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if (!empty($records)): ?>

                                        <?php foreach ($records as $row): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['log_id']); ?></td>
                                                <td><?= htmlspecialchars($row['sess_id']); ?></td>
                                                <td><?= htmlspecialchars($row['uid']); ?></td>

                                                <td><?= htmlspecialchars($row['ip_address']); ?></td>
                                                <td><?= htmlspecialchars($row['user_agent']); ?></td>
                                                <td><?= htmlspecialchars($row['date_added']); ?></td>
                                                <td><?= htmlspecialchars($row['log_type']); ?></td>
                                                <td><?= htmlspecialchars($row['log_action']); ?></td>
                                                <td><?= htmlspecialchars($row['sess_expired']); ?></td>

                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <script>
                                                console.log('<?= $message ?>')
                                            </script>
                                            <td colspan="9" class="text-center text-muted">No records found.</td>
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


<!-- End Custom template -->
</div>
<?php $this->load->view('dash-partial/footer.php'); ?>
<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $("#multi-filter-select").DataTable({
            pageLength: 5,
            scrollX: '100%',
            scrollCollapse: true,
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