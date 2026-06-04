<?php $this->load->view('dash-partial/header.php'); ?>
<?php $this->load->view('dash-partial/sidebar.php'); ?>
<?php $this->load->view('dash-partial/nav.php'); ?>
<div class="container">
    <div class="page-inner">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bank History</h4>
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
                               
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>

                                        <td>1</td>
                                        <td>ISELCO II</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>

                                        <td>1</td>
                                        <td>PCAB</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
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
