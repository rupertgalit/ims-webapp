      <!-- View Modal -->
      <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header text-white" style="background: #05113b;">
              <h5 class="modal-title" id="viewModalLabel">
                View Details
              </h5>
              <button type="button" data-bs-dismiss="modal" aria-label="Close" style="background: red; padding-bottom:4px; border:none!important;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" width="16" height="16">
                  <path d="M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z" />
                </svg>
              </button>
            </div>
            <div class="modal-body" id="modalBody">
              <div class="row mb-3">
                <div class="col-6"><strong>User ID:</strong> <span id="uid"></span></div>
                <div class="col-6"><strong>Company ID:</strong> <span id="company-id"></span></div>
              </div>
              <div class="row mb-3">
                <div class="col-6"><strong>Company Name:</strong> <span id="company-name"></span></div>
                <div class="col-6"><strong>Status:</strong> <span id="status"></span></div>
              </div>
              <div class="row mb-3">
                <div class="col-6"><strong>UserName:</strong> <span id="username"></span></div>
                <div class="col-6"><strong>Password:</strong> <span id="password"></span></div>
              </div>
              <div class="row mb-3">
                <div class="col-6"><strong>Name:</strong> <span id="name"></span></div>
                <div class="col-6"><strong>Date Created:</strong> <span id="date-created"></span></div>
              </div>
              <div class="row mb-3">
                <div class="col-6"><strong>Mobile number:</strong> <span id="mobile"></span></div>
                <div class="col-6"><strong>Email:</strong> <span id="email"></span></div>
              </div>
              <div class="row mb-3">
                <div class="col-6"><strong>Usertype:</strong> <span class="text-success" id="usertype"></span></div>
                <div class="col-6"><strong>Sub Usertype:</strong> <span class="text-secondary" id="subusertype"> </span></div>
              </div>

            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="editButton">Edit</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
          </div>
        </div>
      </div>