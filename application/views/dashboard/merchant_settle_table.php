<?php $this->load->view('dash-partial/header.php'); ?>
<?php $this->load->view('dash-partial/sidebar.php'); ?>
<?php $this->load->view('dash-partial/nav.php'); ?>

<div class="container">
  <div class="page-inner">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Merchant</h4>
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="line-home-tab" data-bs-toggle="pill" href="#line-home" role="tab"
                  aria-controls="line-home" aria-selected="true">Deposit</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" id="line-profile-tab" data-bs-toggle="pill" href="#line-profile" role="tab"
                  aria-controls="line-profile" aria-selected="false">Withdrawal</a>
              </li> -->
            </ul>
            <div class="tab-content mt-3 mb-3" id="line-tabContent">
              <!-- Deposit tab -->
              <div class="tab-pane fade show active" id="line-home" role="tabpanel" aria-labelledby="line-home-tab">
                <!-- Date and Filter Form -->
                <div class="row mb-3">
                  <form class="col-md-12 d-flex flex-wrap">
                    <div class="col-md-3 mb-3">
                      <label for="start-date">Start Date: </label>
                      <div class="input-group">
                        <input type="text" id="start-date" class="form-control date-range-filter"
                          placeholder="yyyy-mm-dd">
                        <span class="input-group-text" id="startDateIcon"><i class="fas fa-calendar-alt"></i></span>
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="end-date">End Date: </label>
                      <div class="input-group">
                        <input type="text" id="end-date" class="form-control date-range-filter"
                          placeholder="yyyy-mm-dd">
                        <span class="input-group-text" id="endDateIcon"><i class="fas fa-calendar-alt"></i></span>
                      </div>
                    </div>
                    <div class="col-md-2 mb-3">
                      <label for="defaultSelect">Company Name</label>
                      <select class="form-select form-control" id="defaultSelect">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="col-md-2 mb-3 d-flex align-items-end">
                      <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                    <div class="col-md-2 mb-3 d-flex align-items-end">
                      <button type="button" class="btn btn-secondary w-100" data-toggle="modal"
                        data-target="#depositModal">Deposit</button>
                    </div>
                  </form>
                </div>

                <div class="table-responsive">
                  <form method="POST">
                    <!-- Custom Search Section -->
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
                        <th>Req Reference</th>
                        <th>Trans Reference</th>
                        <th>Merchant Reference</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th>Date Modified</th>
                        <th>Trans Type</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Dynamic data will be loaded here -->
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- Withdrawal tab -->
              <!-- <div class="tab-pane fade" id="line-profile" role="tabpanel" aria-labelledby="line-profile-tab">
                <div class="row mb-3">
                  <form class="col-md-12 d-flex flex-wrap">
                    <div class="col-md-3 mb-3">
                      <label for="start-date-cashin">Start Date: </label>
                      <div class="input-group">
                        <input type="text" id="start-date-cashin" class="form-control date-range-filter"
                          placeholder="yyyy-mm-dd">
                        <span class="input-group-text" id="startDateCashinIcon"><i
                            class="fas fa-calendar-alt"></i></span>
                      </div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="end-date-cashin">End Date: </label>
                      <div class="input-group">
                        <input type="text" id="end-date-cashin" class="form-control date-range-filter"
                          placeholder="yyyy-mm-dd">
                        <span class="input-group-text" id="endDateCashinIcon"><i class="fas fa-calendar-alt"></i></span>
                      </div>
                    </div>
                    <div class="col-md-2 mb-3">
                      <label for="defaultSelect-cashin">Company Name</label>
                      <select class="form-select form-control" id="defaultSelect-cashin">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="col-md-2 mb-3 d-flex align-items-end">
                      <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                    <div class="col-md-2 mb-3 d-flex align-items-end">
                      <button type="button" class="btn btn-secondary w-100">Withdrawal</button>
                    </div>
                  </form>
                </div>

                <div class="table-responsive">
                  <table id="cashin-datatables" class="display table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Req Reference</th>
                        <th>Trans Reference</th>
                        <th>Merchant Reference</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th>Date Modified</th>
                        <th>Trans Type</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div> -->
              <!-- End of Transaction Tab -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('dashboard/modals/md_merchant_deposit.php'); ?>
<?php $this->load->view('dash-partial/footer.php'); ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

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
      var today = new Date().toISOString().split('T')[0];

    // Set today's date as default value
    $('#start-date, #end-date, #start-date-cashin, #end-date-cashin').datepicker('setDate', today);
    

    // Initialize DataTables
    var transactionTable = $("#multi-filter-select").DataTable({
      pageLength: 5,
      scrollX: true,
      scrollX: '100%',
      responsive: true,
      autoWidth: false,
      dom: 'rt<"bottom justify-content-between align-items-center"lip><"clear">',
    });


    var cashInTable = $("#cashin-datatables").DataTable({
      pageLength: 5
    });

    $(window).on('resize', function() {
      transactionTable.columns.adjust().draw();
    });

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