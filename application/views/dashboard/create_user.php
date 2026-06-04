<?php
$this->load->view('dash-partial/header.php');
$this->load->view('dash-partial/sidebar.php');
$this->load->view('dash-partial/nav.php');
?>
<link rel="stylesheet" href="../assets/css/createusersuccess.css?v=05232025" />
<div class="container">
  <div class="page-inner">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Create User</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 ms-auto me-auto">

                <?php if ($this->session->flashdata('message')): ?>
                  <div class="success" id="successMessage">
                    <!-- <div class="success__icon">
                      <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="m12 1c-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11-4.925-11-11-11zm4.768 9.14c.0878-.1004.1546-.21726.1966-.34383.0419-.12657.0581-.26026.0477-.39319-.0105-.13293-.0475-.26242-.1087-.38085-.0613-.11844-.1456-.22342-.2481-.30879-.1024-.08536-.2209-.14938-.3484-.18828s-.2616-.0519-.3942-.03823c-.1327.01366-.2612.05372-.3782.1178-.1169.06409-.2198.15091-.3027.25537l-4.3 5.159-2.225-2.226c-.1886-.1822-.4412-.283-.7034-.2807s-.51301.1075-.69842.2929-.29058.4362-.29285.6984c-.00228.2622.09851.5148.28067.7034l3 3c.0983.0982.2159.1748.3454.2251.1295.0502.2681.0729.4069.0665.1387-.0063.2747-.0414.3991-.1032.1244-.0617.2347-.1487.3236-.2554z" fill="#393a37" fill-rule="evenodd"></path>
                      </svg>
                    </div> -->
                    <div class="success__title">
                      <?php echo $this->session->flashdata('message'); ?>
                    </div>
                    <div class="success__close" id="closeButton">
                      <svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z" fill="#393a37"></path>
                      </svg>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
              <form action="create_acc_user" method="POST">
                <div class="col-md-6 ms-auto me-auto">
                  <div class="form-group">
                    <label for="clientName">Client Name</label>
                    <input type="text" class="form-control" name="user-name" id="clientName" placeholder="Enter Client Name" required />
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Account</label>
                    <select class="form-select" name="user-type" id="exampleFormControlSelect1" required>
                      <option value="" disabled selected>Select Account</option>
                      <option value="CLIENT">CLIENT</option>
                      <option value="ADMIN">ADMIN</option>
                    </select>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="exampleFormControlSelect2" style="display: none;" id="label2">User Type</label>
                        <select class="form-select" name="sub-user-type" id="exampleFormControlSelect2" style="display:none;" required>
                          <option value="" disabled selected>Select User Type</option>
                          <?php if (!empty($data_subtype)): ?>
                            <?php foreach ($data_subtype as $row): ?>
                              <option value="<?= $row['sub_user_type'] ?>"><?= $row['sub_user_type'] ?></option>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="exampleFormControlSelect3" style="display:none;" id="label3">Client</label>
                        <select class="form-select" name="company-name" id="exampleFormControlSelect3" style="display:none;" required>
                          <option value="" disabled selected>Select Client</option>
                          <?php if (!empty($data_company_list)): ?>
                            <?php foreach ($data_company_list as $row): ?>
                              <option value="<?= $row['company_name'] ?>"><?= $row['company_name'] ?></option>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="card-action" style="text-align: center; margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- <button class="btn btn-secondary">Cancel</button> -->
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('exampleFormControlSelect1').addEventListener('change', function() {
    var value = this.value;
    var label2 = document.getElementById('label2');
    var label3 = document.getElementById('label3');
    var select2 = document.getElementById('exampleFormControlSelect2');
    var select3 = document.getElementById('exampleFormControlSelect3');

    select2.style.display = 'none';
    select3.style.display = 'none';
    label2.style.display = 'none';
    label3.style.display = 'none';

    select3.removeAttribute('required');

    if (value === 'CLIENT') {
        select2.style.display = 'block';
        select3.style.display = 'block';
        label2.style.display = 'block';
        label3.style.display = 'block';
        select3.setAttribute('required', 'required'); 
    } else if (value === 'ADMIN') {
        select2.style.display = 'block';
        label2.style.display = 'block';
    }
});

document.addEventListener('DOMContentLoaded', function() {
  var closeButton = document.getElementById('closeButton');
  
  if (closeButton) {
    closeButton.addEventListener('click', function() {
      var successMessage = document.getElementById('successMessage');
      if (successMessage) {
        successMessage.style.display = 'none';
      }
    });
  }

  setTimeout(function() {
    var successMessage = document.getElementById('successMessage');
    if (successMessage) {
      successMessage.style.display = 'none';
    }
  }, 10000);
});

</script>

<?php $this->load->view('dash-partial/footer.php'); ?>