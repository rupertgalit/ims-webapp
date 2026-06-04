<?php $this->load->view('dash-partial/header.php'); ?>
<?php $this->load->view('dash-partial/sidebar.php'); ?>
<?php $this->load->view('dash-partial/nav.php'); ?>

<div class="container">
  <div class="page-inner">
    <div class="row">

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">List of User</h4>
          </div>
          <div class="card-body">
            <div class="row mb-3">

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
              <table
                id="multi-filter-select"
                class="display table table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>

                    <th>Name</th>
                    <!-- <th>Mobile_number</th>
                    <th>Email</th> -->
                    <th>Date_created</th>
                    <th>Status</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>

                  <?php if (!empty($records)): ?>
                    <?php foreach ($records as $row): ?>
                      <tr>

                        <td><?= $row['user_id']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td><?= $row['password']; ?></td>

                        <td><?= $row['name']; ?></td>
                        <!-- <td><?= $row['mobile_number']; ?></td>
                        <td><?= $row['email']; ?></td> -->

                        <td><?= $row['date_created']; ?></td>
                        <td>
                          <?php if ($row['status'] == 'ACTIVE'): ?>
                            <span class="activeacc">ACTIVE</span>
                          <?php else: ?>
                            <span class="inactiveacc">INACTIVE</span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <div class="btn-group dropdown">
                            <button class="btn dropdown-toggle" type="button"
                              data-bs-toggle="dropdown">Details
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li>
                                <a class="dropdown-item view-btn" href="#" data-company-id="<?= $row['user_id']; ?>"
                                  data-bs-toggle="modal" data-bs-target="#viewModal">View</a>
                                <a class="dropdown-item" href="#" data-company-id="<?= $row['user_id']; ?>"
                                  data-bs-toggle="modal" data-bs-target="#switchModal">Switch</a>
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
</div>


<!-- End Custom template -->
</div>
<?php $this->load->view('dashboard/modals/md_listofuser_viewdetails.php'); ?>
<?php $this->load->view('dashboard/modals/md_listofuser_switch.php'); ?>
<?php $this->load->view('dash-partial/footer.php'); ?>
<script>
  $(document).ready(function() {
    // Initialize DataTable
    var table = $("#multi-filter-select").DataTable({
      pageLength: 5,
      scrollX: true,
      scrollX: '100%',
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

    $('#switchModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var userId = button.data('user-id'); // Extract info from data-* attributes
      var modal = $(this);

      // Set user ID in hidden input
      modal.find('.modal-title').text(userId);

      // Find the corresponding row in the table
      var row = button.closest('tr');

      // Get the status text from the row (column 7, index starts from 0)
      var statusText = row.find('td:eq(7)').text().trim();

      // Set the checkbox based on status
      var toggleCheckbox = modal.find('#toggle');
      if (statusText === 'ACTIVE') {
        toggleCheckbox.prop('checked', true);
      } else {
        toggleCheckbox.prop('checked', false);
      }
    });

    const modalBody = document.getElementById('modalBody');
    const originalModalContent = modalBody.innerHTML;
    // Edit button functionality
    document.getElementById('editButton').addEventListener('click', function() {
      // Hide the edit button
      document.getElementById('editButton').style.display = 'none';
      document.getElementById('modalBody').innerHTML = `
   <form id="editForm">
        <div class="mb-4">
          <label for="companyName" class="form-label">Company Name:</label>
          <input type="text" id="companyName" class="form-control" placeholder="Company Name">
        </div>

        <div class="row">
          <div class="col-md-6 mb-4">
            <label for="ciMinAmount" class="form-label">Cash In Min Amount:</label>
            <input type="number" id="ciMinAmount" class="form-control" placeholder="CI Min Amount">
          </div>

          <div class="col-md-6 mb-4">
            <label for="ciMaxAmount" class="form-label">Cash In Max Amount:</label>
            <input type="number" id="ciMaxAmount" class="form-control" placeholder="CI Max Amount">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-4">
            <label for="ciRate" class="form-label">Cash In Rate:</label>
            <input type="number" step="0.01" id="ciRate" class="form-control" placeholder="CI Rate">
          </div>

          <div class="col-md-6 mb-4">
            <label for="coRate" class="form-label">Cash Out Rate:</label>
            <input type="number" step="0.01" id="coRate" class="form-control" placeholder="CO Rate">
          </div>
        </div>

        <div class="mb-3">
          <label for="imageUpload" class="form-label">Company Image:</label>
          <input type="file" id="imageUpload" class="form-control">
        </div>
        <div class="mb-3">
                 <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
  `;

    });
    // Reset the modal content when it is closed
    const closeButton = document.querySelectorAll('[data-bs-dismiss="modal"]');
    closeButton.forEach(function(button) {
      button.addEventListener('click', function() {
        modalBody.innerHTML = originalModalContent;
        document.getElementById('editButton').style.display = 'inline-block';
      });
    });


    // Update table on date change
    $('#start-date, #end-date').on('change', function() {
      table.draw();
    });

    $('#switchModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var companyId = button.data('company-id'); // Extract info from data-* attributes
      var modal = $(this);

      // Set the modal title to include the company name
      modal.find('.uid').val(companyId);
    });

  });
</script>

<script>
  $('.view-btn').on('click', function(event) {
    event.preventDefault(); // Prevent default action of the link

    // Extract necessary data from the clicked element
    var uid = $(this).data('company-id'); // Get user ID from the 'data-company-id' attribute

    const myHeaders = new Headers();
    myHeaders.append("Cookie", "ci_session=423kkgleofj1k89vmb634l2v3r0rfld3");

    const formdata = new FormData();
    formdata.append("sess_id", "<?= $this->session->userdata("session_id") ?>"); 
    formdata.append("uid", uid); 
    formdata.append("user_set", "user");

    const requestOptions = {
      method: "POST",
      headers: myHeaders,
      body: formdata,
      redirect: "follow"
    };

    // Trigger fetch request
    fetch("<?= base_url() ?>/dashboard/user_details", requestOptions)
      .then((response) => response.json())
      .then((result) => {
        console.log(result);
        console.log(result.data.user_id);

        document.getElementById('uid').innerHTML = result.data.user_id;
        document.getElementById('company-id').innerHTML = result.data.company_id;
        document.getElementById('company-name').innerHTML = result.data.company_name;
        document.getElementById('status').innerHTML = result.data.tbl_status;
        document.getElementById('username').innerHTML = result.data.username;
        document.getElementById('password').innerHTML = "*************";
        document.getElementById('name').innerHTML = result.data.name;
        document.getElementById('date-created').innerHTML = result.data.date_created;
        document.getElementById('mobile').innerHTML = result.data.mobile_number;

        document.getElementById('email').innerHTML = result.data.email;
        document.getElementById('usertype').innerHTML = result.data.user_type;
        document.getElementById('subusertype').innerHTML = result.data.sub_usertype_id;



      })
      .catch((error) => console.error('Error:', error));
  });
</script>