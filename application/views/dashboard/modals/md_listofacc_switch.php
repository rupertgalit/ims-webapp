      <!-- Switch Modal -->
      <div class="modal fade" id="switchModal" tabindex="-1" aria-labelledby="switchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <div class="modal-header text-white" style="background: #05113b;">
              <h5 class="modal-title" id="switchModalLabel">
                Switch Details
              </h5>
              <button type="button" data-bs-dismiss="modal" aria-label="Close" style="background: red; padding-bottom:4px; border:none!important;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" width="16" height="16">
                  <path d="M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z" />
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