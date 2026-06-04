<?php $this->load->view('dash-partial/header.php'); ?>
<?php $this->load->view('dash-partial/sidebar.php'); ?>
<?php $this->load->view('dash-partial/nav.php'); ?>

<div class="container">
  <div class="page-inner">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Cash In Static</h4>
          </div>

          <div class="card-body">
            <div class="row mb-3">

              <!-- FORM -->
              <form method="POST" class="col-md-12 d-flex flex-wrap">

                <div class="col-md-3 mb-3">
                  <label for="start-date">Start Date: </label>
                  <div class="input-group">
                    <input type="text" id="start-date" name="date-from" class="form-control date-range-filter"
                      placeholder="Start Date" required>
                    <span class="input-group-text" id="startDateIcon"><i class="fas fa-calendar-alt"></i></span>
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="end-date">End Date: </label>
                  <div class="input-group">
                    <input type="text" id="end-date" name="date-to" class="form-control date-range-filter"
                      placeholder="End Date" required>
                    <span class="input-group-text" id="endDateIcon"><i class="fas fa-calendar-alt"></i></span>
                  </div>
                </div>
                <div class="col-md-2 mb-3 status-select-container">
                  <label for="defaultSelect">Status</label>
                  <select class="form-select form-control" name="status" id="defaultSelect">
                    <option value="all">ALL</option>
                    <option value="success">SUCCESS</option>
                    <option value="pending">PENDING</option>
                    <option value="success">CREATED</option>
                    <option value="failed">FAILED</option>
                  </select>
                </div>

                <!-- <?php if ($this->session->userdata('user_type') == 'CLIENT'): ?>
             
                <?php else: ?>

                  <div class="col-md-2 mb-3">
                    <label for="defaultSelect">Client</label>
                    <select class="form-select form-control" name="client" id="defaultSelect">
                      <option value="all">ALL</option>
                      <?php if (!empty($clients)): ?>
                        <?php foreach ($clients as $client): ?>
                          <option value="<?= $client['company_id'] ?>"><?= $client['company_name'] ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </div>
                <?php endif; ?> -->

                <div class="col-md-2 mb-3 d-flex align-items-end">
                  <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>

              </form>
            </div>
            <div class="table-responsive">

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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php if (!empty($records)): ?>
                    <?php foreach ($records as $row): ?>
                      <tr>
                        <td><?= $row['ci_id']; ?></td>
                        <td><?= $row['reference_number']; ?></td>
                        <td><?= $row['trans_reference']; ?></td>
                        <td><?= $row['merchant_ref']; ?></td>
                        <td><?= $row['txn_amount']; ?></td>
                        <td class="status-label <?= strtolower($row['status']); ?>">
                          <?= $row['status']; ?>
                        </td>
                        <td><?= $row['date_requested']; ?></td>
                        <td><?= $row['date_modified']; ?></td>
                        <td class="type-label <?= strtolower($row['type']); ?>">
                          <?= $row['type']; ?>
                        </td>
                        <td>
                          <div class="btn-group dropdown">
                            <button class="btn dropdown-toggle" type="button"
                              data-bs-toggle="dropdown">Details
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li>
                                <a class="dropdown-item view-btn"
                                  data-bs-toggle="modal" data-bs-target="#viewModal">View</a>

                              </li>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>

                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <?php $this->load->view('dash-partial/footer.php'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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
        const formattedDate = moment(e.date).format('YYYY-MM-DD'); 
        $(this).val(formattedDate);
        transactionTable.draw(); 
      });

      var transactionTable = $("#multi-filter-select").DataTable({
        pageLength: 5,
        order: [
          [0, 'desc']
        ],
        scrollX: '100%',
        scrollCollapse: true,
        responsive: true,
        autoWidth: false,

        dom: '<"pull-left"B><"pull-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4 text-right"p>>',
        buttons: [{
          extend: 'excelHtml5',
          title: 'Cash Out Data',
          text: 'Export to Excel',
          className: 'btn btn-secondary',
          exportOptions: {
            columns: ':visible'
          }
        }]
      });

      function toggleExportButton() {
        var rowCount = transactionTable.rows().count();
        var exportButton = transactionTable.button(0); 

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