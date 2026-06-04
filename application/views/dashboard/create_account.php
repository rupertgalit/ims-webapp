<?php
$this->load->view('dash-partial/header.php');
$this->load->view('dash-partial/sidebar.php');
$this->load->view('dash-partial/nav.php');
?>
<div class="container">
  <div class="loader-container" id="loadercreateapi">
    <div class="three-body">
      <div class="three-body__dot"></div>
      <div class="three-body__dot"></div>
      <div class="three-body__dot"></div>
    </div>
  </div>

  <div class="page-inner">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Create API Access</div>
          </div>
          <div class="card-body">
            <form id="createUserForm" autocomplete="off" enctype="multipart/form-data">
              <div class="row justify-content-center mb-3">
                <div class="col-md-8 text-center text-danger" id="error-msg"></div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="clientName">Client Name</label>
                    <input type="text" class="form-control" id="clientName" placeholder="Enter Client Name" required minlength="6" />
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="companyName">Company Name</label>
                    <input type="text" class="form-control" id="companyName" placeholder="Enter Company Name" required />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="merchant">Merchant Name</label>
                    <select name="merchant" id="merchant" class="form-control" required>
                      <option value="" disabled selected>Select Bank</option>
                      <option value="3">ALLBANK</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="imageUpload">Upload Image</label>
                    <input type="file" class="form-control" id="imageUpload" accept="image/*" required />
                    <img id="imagePreview" src="#" alt="Image Preview" style="display:none; margin-top:10px; max-width:300px;" />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <!-- <button type="button" class="btn btn-secondary">Cancel</button> -->
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true" aria-live="polite">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-white" style="background: #05113b;">
        <h5 class="modal-title" id="successModalLabel">
          <i class="bi bi-check-circle-fill"></i> API User Successfully Created!
        </h5>
        <button type="button" data-dismiss="modal" aria-label="Close" style="background: red; padding-bottom:4px; border:none!important;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" width="16" height="16">
            <path d="M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z" />
          </svg>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert mb-3" style="border-left: 4px solid #05113b; font-size:18px; text-align:center;">
          <strong>Company Name:</strong> <span id="companyName-text"></span><br>
        </div>
        <div class="bg-light p-3 rounded mb-3">
          <p>
            <i class="bi bi-person-circle"></i>
            <strong>API-User:</strong>
            <span class="badge" style="font-family: monospace; font-size:18px; background:#05113b;" id="apiUser-text"></span>
          </p>

          <p>
            <i class="bi bi-lock"></i>
            <strong>API-Password:</strong>
            <span class="badge" style="font-family: monospace; font-size:18px;background:#05113b;" id="apiPassword-text"></span>
          </p>
          <p>
            <i class="bi bi-key"></i>
            <strong>API-Key:</strong>
            <span class="badge" style="font-family: monospace; font-size:18px;background:#05113b;" id="apiKey-text"></span>
          </p>
        </div>
        <p class="text-muted text-center">
          <i class="bi bi-shield-lock"></i> Please keep your API credentials safe.
        </p>
      </div>
    </div>
  </div>
</div>






<?php $this->load->view('dash-partial/footer.php'); ?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('createUserForm').addEventListener('submit', function(e) {
  e.preventDefault();

  let client_name = document.getElementById('clientName').value;
  let company_name = document.getElementById('companyName').value;
  let merchant_name = document.getElementById('merchant').value;
  let company_image = document.getElementById('imageUpload').value;

  // Validate client name length
  if (client_name.length < 6) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Client name must be at least 6 characters long!',
      confirmButtonText: 'Try Again'
    });
    return; // Stop form submission
  }

  const myHeaders = new Headers();

  const formdata = new FormData();
  formdata.append("client-name", client_name);
  formdata.append("company-name", company_name);
  formdata.append("merchant-name", merchant_name);
  formdata.append("company-image", document.getElementById('imageUpload').files[0]);

  const requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: formdata,
    redirect: "follow"
  };

  // Show loader
  document.getElementById('loadercreateapi').style.display = 'flex';

  setTimeout(() => {
    fetch("<?php echo base_url() ?>/dashboard/create_api_user", requestOptions)
      .then((response) => response.json())
      .then((result) => {
        // const parsedResult = JSON.parse(result);
        console.log(result);
        console.log(result.data["message"]);

        document.getElementById('apiKey-text').innerHTML = result["message"];
        document.getElementById('apiKey-text').innerHTML = result.data["API-KEY"];
        document.getElementById('apiPassword-text').innerHTML = result.data["API-PASSWORD"];
        document.getElementById('apiUser-text').innerHTML = result.data["API-USER"];
        document.getElementById('companyName-text').innerHTML = result.data["COMPANY"];

        document.getElementById('loadercreateapi').style.display = 'none';
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();

        document.getElementById('createUserForm').reset();
        document.getElementById('imagePreview').style.display = 'none'; 
      })
      .catch((error) => {
        console.error('Error:', error);
        document.getElementById('loadercreateapi').style.display = 'none';
      });
  }, 1000);
});

</script>


<script>
  document.getElementById('imageUpload').addEventListener('change', function(event) {
    const reader = new FileReader();
    reader.onload = function() {
      const preview = document.getElementById('imagePreview');
      preview.src = reader.result;
      preview.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
  });
</script>
<script>
  function preventSpaces(inputId) {
    const input = document.getElementById(inputId);

    input.addEventListener('keydown', function(event) {
      if (event.key === ' ') {
        event.preventDefault();
      }
    });

    input.addEventListener('input', function() {
      this.value = this.value.replace(/\s/g, '');
    });
  }

  preventSpaces('clientName');
  preventSpaces('companyName');

  
</script>
