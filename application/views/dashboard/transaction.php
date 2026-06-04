<?php $this->load->view('dash-partial/header.php'); ?>
<?php $this->load->view('dash-partial/sidebar.php'); ?>
<?php $this->load->view('dash-partial/nav.php'); ?>

<div class="container">
  <div class="page-inner">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Transactions</h4>
          </div>
          <div class="card-body">
            <div class="row mb-3">

              <!-- FORM -->
              <form method="POST" action="transaction" class="col-md-12 d-flex flex-wrap">

                <div class="col-md-3 mb-3">
                  <label for="start-date">Start Date: </label>
                  <div class="input-group">
                    <input type="text" id="start-date" name="date-from" class="form-control date-range-filter"
                      placeholder="Start Date" required value="<?= $date_from ? $date_from : date('Y-m-d'); ?>">
                    <span class="input-group-text" id="startDateIcon"><i class="fas fa-calendar-alt"></i></span>
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="end-date">End Date: </label>
                  <div class="input-group">
                    <input type="text" id="end-date" name="date-to" class="form-control date-range-filter"
                      placeholder="End Date" required value="<?= $date_to ? $date_to : date('Y-m-d'); ?>">
                    <span class="input-group-text" id="endDateIcon"><i class="fas fa-calendar-alt"></i></span>
                  </div>
                </div>

                <?php if ($this->session->userdata('user_type') == 'CLIENT'): ?>
                  <!-- Do nothing -->
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
                <?php endif; ?>

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
                    <th>Amount</th>
                    <th>Ngsi Fee</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Date Created</th>
                    <th>Date Modified</th>
                    <th>Trans Type</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($records)) { ?>
                    <?php foreach ($records as $row): ?>
                      <tr>
                        <td><?= $row['trans_id']; ?></td>
                        <td><?= $row['reference_number']; ?></td>
                        <td><?= $row['trans_reference']; ?></td>
                        <td><?= $row['merchant_ref']; ?></td>
                        <td><?= $row['txn_amount']; ?></td>
                        <td><?= $row['deducted_amount']; ?></td>
                        <td><?= $row['total_amount']; ?></td>
                        <td class="status-label <?php echo strtolower($row['status']); ?>">
                          <?= $row['status']; ?>
                        </td>
                        <td><?= $row['date_created']; ?></td>
                        <td><?= $row['date_modified']; ?></td>
                        <td class="type-label <?php echo strtolower($row['trans_type']); ?>">
                          <?= $row['trans_type']; ?>
                        </td>

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
</div>

<?php $this->load->view('Dashboard/modals/md_transactions_viewdetails.php'); ?>
<?php $this->load->view('dash-partial/footer.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>




<script>
  document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll(".view-btn");

    buttons.forEach(button => {
      button.addEventListener("click", function() {
        const refNum = this.getAttribute("data-reference");

        // Show loading message
        // document.getElementById("modal-content").innerHTML = "Loading...";

        // Call your API
        const myHeaders = new Headers();
        myHeaders.append("Cookie", "ci_session=ctpv70cn3074g1f22psa3jsn362s8s0g");

        const formdata = new FormData();
        formdata.append("refnum", "5294813724838509");

        const requestOptions = {
          method: "POST",
          headers: myHeaders,
          body: formdata,
          redirect: "follow"
        };

        fetch("<?= base_url() ?>/check-reference", requestOptions)
          .then(response => response.json())
          .then(result => {
            if (result.status && result.data) {
              const rawOtherDetails = result.data.other_details;

              if (rawOtherDetails) {
                try {

                  const cleaned = rawOtherDetails.replace(/,?\{\"item\"$/, ""); // Fix broken JSON if needed
                  const otherDetails = JSON.parse(cleaned);


                  let html = `
                          <table border="1" cellpadding="5" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Item</th>
                                <th>Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                        `;
                                otherDetails.forEach(detail => {
                                  html += `
                            <tr>
                              <td>${detail.item}</td>
                              <td>₱${parseFloat(detail.amount).toFixed(2)}</td>
                            </tr>
                          `;
                                });

                                html += `
                            </tbody>
                          </table>
                        `;

                  document.getElementById("other-details").innerHTML = html;
                } catch (e) {
                  console.error("Failed to parse other_details JSON:", e);
                }
              } else {
                document.getElementById("other-details").innerHTML = "<p>No additional Details.</p>";
              }
            } else {
              document.getElementById("other-details").innerHTML = "<p>Invalid response from server.</p>";
            }
          })
          .catch(error => console.error("Fetch error:", error));


      });
    });
  });
</script>








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
      // Update the value of the input on date selection
      const formattedDate = moment(e.date).format('YYYY-MM-DD');
      $(this).val(formattedDate);
      transactionTable.draw();
    });

    // Initialize DataTables
    var transactionTable = $("#multi-filter-select").DataTable({
      pageLength: 5,
      scrollX: '100%',
      scrollCollapse: true,
      responsive: true,
      autoWidth: false,
      order: [
        [0, 'desc']
      ],
      dom: '<"pull-left"B><"pull-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4 text-right"p>>',
      buttons: [{
        extend: 'excelHtml5',
        title: 'Transactions Data',
        text: 'Export to Excel',
        className: 'btn btn-secondary',
        exportOptions: {
          columns: ':visible'
        }
      }]

    });



    // Disable export button if no data
    function toggleExportButton() {
      var rowCount = transactionTable.rows().count();
      var exportButton = transactionTable.button(0);

      if (rowCount === 0) {
        exportButton.disable();
      } else {
        exportButton.enable();
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