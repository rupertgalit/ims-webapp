<?php $this->load->view('dash-partial/header.php'); ?>
<?php $this->load->view('dash-partial/sidebar.php'); ?>
<?php $this->load->view('dash-partial/nav.php'); ?>


<div class="container">
  <div class="page-inner">
    <div class="row">

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">List of Account</h4>
          </div>
          <div class="card-body">

            <div class="row mb-3">

            </div>
            <div class="table-responsive">
              <!-- <form method="POST"> -->
                <!-- Custom Search Section -->
                <!-- <div class="col-md-4 d-flex justify-content-end align-items-end ms-auto">

                  <label style="display: flex; align-items: center; gap: 5px;">Search:
                    <input type="search" id="search-input" name="search_data" class="form-control"
                      aria-controls="dataTables" required>
                  </label>

                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                  </button>

                </div>
              </form> -->
              <table id="multi-filter-select" class="display table table-striped table-hover">
                <thead>
                  <tr>
                    <th>API ID</th>
                    <th>Company Name</th>
                    <th>API Name</th>
                    <th>Date Created</th>
                    <th>Update Date</th>
                    <th>Status</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($records)): ?>
                    <?php foreach ($records as $row): ?>
                      <?php if ($row['id'] != 1): ?> <!-- Skip company_id = 1 -->
                        <tr>
                          <td><?= $row['apiID']; ?></td>
                          <td><?= $row['company_name']; ?></td>
                          <td><?= $row['api_name']; ?></td>
                          <td><?= $row['date_created']; ?></td>
                          <td><?= $row['updated_at']; ?></td>
                          <td>
                            <?php if ($row['api_status'] == '1'): ?>
                              <span class="activeacc">ACTIVE</span>
                            <?php else: ?>
                              <span class="inactiveacc">INACTIVE</span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <div class="btn-group dropdown">
                              <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">Details</button>
                              <ul class="dropdown-menu" role="menu">
                                <li>
                                  <a class="dropdown-item view-btn" href="#" data-company-id="<?= $row['apiID']; ?>"
                                    data-bs-toggle="modal" data-bs-target="#viewModal">View</a>
                                  <a class="dropdown-item" href="#" data-company-id="<?= $row['apiID']; ?>"
                                    data-bs-toggle="modal" data-bs-target="#switchModal">Switch</a>
                                </li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- View Modal -->
      <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content rounded-3 shadow">

            <div class="modal-header text-white" style="background:#05113b;">
              <h5 class="modal-title" id="viewModalLabel">
                View Details
              </h5>
              <button type="button" data-bs-dismiss="modal" aria-label="Close"
                style="background: red; padding-bottom:4px; border:none!important;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" width="16" height="16">
                  <path
                    d="M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z" />
                </svg>
              </button>
            </div>
            <div class="modal-body" id="modalBody">
              <div class="row mb-3">
                <div class="col-6"><strong>User ID:</strong> <span id="uid"></span></div>
                <div class="col-6"><strong>Company ID:</strong> <span id="company-id">1</span></div>
              </div>
              <div class="row mb-3">
                <div class="col-6"><strong>Company Name:</strong> <span id="company-name"></span></div>
                <div class="col-6"><strong>Status:</strong> <span id="status"></span></div>
              </div>
              <div class="row mb-3">
                <div class="col-6"><strong>API Name:</strong> <span id="api-name"></span></div>
                <div class="col-6"><strong>API Password:</strong> <span id="api-pass"></span></div>
              </div>
              <div class="row mb-3">
                <div class="col-6"><strong>Key:</strong> <span id="api-key"></span></div>
                <div class="col-6"><strong>Date Created:</strong> <span id="date-created"></span></div>
              </div>
              <div class="row mb-3">
                <div class="col-6"><strong>Updated At:</strong> <span id="date-update"></span></div>
                <div class="col-6"><strong>Cash In:</strong> <span id="cashin"> (Min/Max)</span></div>
              </div>
              <div class="row mb-3">
                <div class="col-6"><strong>Cash In Balance:</strong> <span id="ci-balance" class="text-success"></span>
                </div>
                <div class="col-6"><strong>Previous Amount:</strong> <span id="ci-prev-amount"
                    class="text-secondary"></span></div>
              </div>
              <div class="row mb-3">
                <div class="col-6"><strong>Cash In Rate:</strong> <span id="ci-rate"></span></div>
                <div class="col-6"><strong>Cash Out:</strong> <span id="cashout"> (Min/Max)</span></div>
              </div>
              <div class="row mb-3">
                <div class="col-6"><strong>Cash Out Balance:</strong> <span id="co-balance" class="text-danger"></span>
                </div>
                <div class="col-6"><strong>Previous Amount:</strong> <span id="co-prev-amount"
                    class="text-secondary"></span></div>
              </div>
              <div class="row mb-3">
                <div class="col-6"><strong>Cash Out Rate:</strong> <span id="co-rate"></span></div>
              </div>
            </div>
            <!-- <div class="modal-footer border-top-0">
              <button type="button" class="btn btn-primary" id="editButton">Edit</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
          </div>
        </div>
      </div>


      <!-- Switch Modal -->
      <div class="modal fade" id="switchModal" tabindex="-1" aria-labelledby="switchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <div class="modal-header text-white" style="background: #433e5a;">
              <h5 class="modal-title" id="switchModalLabel">
                Switch Details
              </h5>
              <button type="button" data-bs-dismiss="modal" aria-label="Close"
                style="background: red; padding-bottom:4px; border:none!important;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" width="16" height="16">
                  <path
                    d="M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z" />
                </svg>
              </button>
            </div>
            <form action="dashboard/switch" method="POST">
              <div class="modal-body" style="display: flex; justify-content: center; align-items: center;">
                <input type="hidden" name="uid" class="uid">
                <input type="hidden" name="user-set" value="api">
                <input type="checkbox" class="toggle" id="toggle" name="toggle_status" value="1" />
                <label for="toggle">
                  <span class="on">Active</span>
                  <span class="off">Inactive</span>
                </label>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirm Switch</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- End Custom template -->
</div>
<?php $this->load->view('dash-partial/footer.php'); ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
  $(document).ready(function () {
    // Initialize DataTable
    var table = $("#multi-filter-select").DataTable({
      pageLength: 5,
      scrollX: true,
      scrollX: '100%',
      responsive: true,
      autoWidth: false,
      dom: 'frt<"bottom justify-content-between align-items-center"lip><"clear">'
    });
  $(window).on('resize', function() {
      table.columns.adjust().draw();
    });

    const modalBody = document.getElementById('modalBody');
    const originalModalContent = modalBody.innerHTML;
    // Edit button functionality
    document.getElementById('editButton').addEventListener('click', function () {
      // Hide the edit button
      document.getElementById('editButton').style.display = 'none';
      document.getElementById('modalBody').innerHTML = `
   <form id="editForm" method="POST" action="dashboard/update_account">
        <div class="mb-4">
          <label for="companyName" class="form-label" >Company Name:</label>
          <input type="text" name="company-name" id="test" class="form-control" required>
         
        </div>

        <div class="row">
          <div class="col-md-6 mb-4">
            <label for="ciMinAmount" class="form-label">Cash In Min Amount:</label>
            <input type="number" name="ci-min-amount" id="ciMinAmount" class="form-control" placeholder="CI Min Amount" required>
          </div>

          <div class="col-md-6 mb-4">
            <label for="ciMaxAmount" class="form-label">Cash In Max Amount:</label>
            <input type="number" name="ci-max-amount" id="ciMaxAmount" class="form-control" placeholder="CI Max Amount" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-4">
            <label for="ciRate" class="form-label">Cash In Rate:</label>
            <input type="number" name="ci-rate"  step="0.01" id="ciRate" class="form-control" placeholder="CI Rate" required>
          </div>

          <div class="col-md-6 mb-4">
            <label for="coRate" class="form-label">Cash Out Rate:</label>
            <input type="number" name="co-rate"  step="0.01" id="coRate" class="form-control" placeholder="CO Rate" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="imageUpload" class="form-label">Company Image:</label>
          <input type="file" id="imageUpload" class="form-control" required>
        </div>
        <div class="mb-3">
                 <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
  `;

    });
    // Reset the modal content when it is closed
    const closeButton = document.querySelectorAll('[data-bs-dismiss="modal"]');
    closeButton.forEach(function (button) {
      button.addEventListener('click', function () {
        modalBody.innerHTML = originalModalContent;
        document.getElementById('editButton').style.display = 'inline-block';
      });
    });

    // Update table on date change
    $('#start-date, #end-date').on('change', function () {
      table.draw();
    });

$('#switchModal').on('show.bs.modal', function(event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var companyId = button.data('company-id'); // Use correct data attribute
  var modal = $(this);

  // Set the hidden input value
  modal.find('.uid').val(companyId);
  modal.find('.modal-title').text("Switch Details");

  // Find the row where the button exists
  var row = button.closest('tr');

  // Get the status text from the correct column index (5 = Status column)
  var statusText = row.find('td:eq(5)').text().trim().toUpperCase(); // Ensure consistent casing

  // Set the checkbox based on the current status
  var toggleCheckbox = modal.find('#toggle');
  toggleCheckbox.prop('checked', statusText === 'ACTIVE');
});


  });
</script>

<script>
  $('.view-btn').on('click', function (event) {
    event.preventDefault(); // Prevent default action of the link

    // Extract necessary data from the clicked element
    var uid = $(this).data('company-id'); // Get user ID from the 'data-company-id' attribute

    const myHeaders = new Headers();


    const formdata = new FormData();
    formdata.append("sess_id","<?= $this->session->userdata("session_id") ?>"); 
    formdata.append("uid", uid); 
    formdata.append("user_set", "api");

    const requestOptions = {
      method: "POST",
      headers: myHeaders,
      body: formdata,
      redirect: "follow"
    };

    // Trigger fetch request
    fetch('<?= base_url() ?>/dashboard/user_details', requestOptions)
      .then((response) => response.json())
      .then((result) => {
        console.log(result);
        console.log(result.data.user_id);

        document.getElementById('uid').innerHTML = result.data.user_id;
        document.getElementById('company-id').innerHTML = result.data.company_id;
        document.getElementById('company-name').innerHTML = result.data.company_name;
        // document.getElementById('status').innerHTML = result.data.api_status;
        if (result.data.api_status == '1') {
          document.getElementById('status').innerHTML = "ACTIVE";
        } else {
          document.getElementById('status').innerHTML = "INACTIVE";
        }
        document.getElementById('api-name').innerHTML = result.data.api_name;
        document.getElementById('api-pass').innerHTML = "*******************";
        document.getElementById('api-key').innerHTML = result.data.key;
        document.getElementById('date-created').innerHTML = result.data.date_created;
        document.getElementById('date-update').innerHTML = result.data.updated_at;
        document.getElementById('cashin').innerHTML = '₱' +
          parseFloat(result.data.ci_min_amount).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
          }) +
          ' / ₱' +
          parseFloat(result.data.ci_max_amount).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
          }) +
          ' (Min/Max)';
        document.getElementById('ci-balance').innerHTML = result.data.ci_current_balance;
        document.getElementById('ci-prev-amount').innerHTML = result.data.ci_previous_amount;
        document.getElementById('ci-rate').innerHTML = result.data.ci_rate;
        document.getElementById('cashout').innerHTML = '₱' +
          parseFloat(result.data.co_min_amount).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
          }) +
          ' / ₱' +
          parseFloat(result.data.co_max_amount).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
          }) +
          ' (Min/Max)';
        document.getElementById('co-balance').innerHTML = result.data.co_current_balance;
        document.getElementById('co-prev-amount').innerHTML = result.data.co_previous_amount;
        document.getElementById('co-rate').innerHTML = result.data.co_rate;


        document.getElementById('test').value = result.data.company_id;


      })
      .catch((error) => console.error('Error:', error));
  });
</script>