<div class="wrapper">
  <!-- Sidebar -->
  <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="/dashboard" class="logo">
          <img src="/assets/img/innovative_icon.png " alt="navbar brand" class="navbar-brand"/>
          <span class="fw-bold text-white fs-6">
            Innovative Solutions
          </span>
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">

          <!-- <li class="nav-item <?= (uri_string() == 'transaction' || uri_string() == 'cashin' || uri_string() == 'cashout') ? 'active' : '' ?>">
            <a data-bs-toggle="collapse" href="#account">
              <i class="fas fa-money-check"></i>
              <p>Payment</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="account">
              <ul class="nav nav-collapse">
                <li><a href="<?= base_url('transaction') ?>"><span class="sub-item">Success Transaction</span></a></li>
                <li><a href="<?= base_url('cashin') ?>"><span class="sub-item">Cash In</span></a></li>
                <li><a href="<?= base_url('cashout') ?>"><span class="sub-item">Cash Out</span></a></li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item <?= (uri_string() == 'banks') ? 'active' : '' ?>">
            <a href="<?= base_url('banks') ?>">
              <i class="fas fa-bank"></i>
              <p>All Bank</p>    
            </a>
          </li> -->
          <?php
          $current_uri = uri_string();

          $dashboard = '
                      <li class="nav-item ' . (($current_uri == 'dashboard') ? 'active' : '') . '">
                        <a href="dashboard">
                          <i class="fas fa-desktop"></i>
                          <p>Dashboard</p>
                        </a>
                      </li>';

          $payment = '

            <li class="nav-item ' . (($current_uri == 'transaction' || $current_uri == 'cashin' || $current_uri == 'cashout') ? 'active' : '') . '">
<a data-bs-toggle="collapse" href="#account"><i class="fas fa-qrcode"></i><p>Bank Transcations</p><span class="caret"></span></a>
            <div class="collapse" id="account">
              <ul class="nav nav-collapse">
               
                <li><a href="cashin"><span class="sub-item">Pay In</span></a></li>
                <li><a href="cashout"><span class="sub-item">Pay Out</span></a></li>
              </ul>
            </div>
          </li>';


          $account_navbar = '
                              <li class="nav-item ' . (($current_uri == 'list_account' || $current_uri == 'create_client') ? 'active' : '') . '">
                                <a data-bs-toggle="collapse" href="#maps">
                                  <i class="fas fa-user-plus"></i>
                                  <p>Account</p>
                                  <span class="caret"></span>
                                </a>
                                <div class="collapse" id="maps">
                                  <ul class="nav nav-collapse">
                                    <li><a href="list_account"><span class="sub-item">List of Account</span></a></li>
                                    <li><a href="create_client"><span class="sub-item">Create Api Access</span></a></li>
                                  </ul>
                                </div>
                              </li>';

          $users_navbar = '
                              <li class="nav-item ' . (($current_uri == 'list_user' || $current_uri == 'create_user') ? 'active' : '') . '">
                                <a data-bs-toggle="collapse" href="#user">
                                  <i class="fas fa-user-plus"></i>
                                  <p>User Management</p>
                                  <span class="caret"></span>
                                </a>
                                <div class="collapse" id="user">
                                  <ul class="nav nav-collapse">
                                    <li><a href="list_user"><span class="sub-item">List of User</span></a></li>
                                    <li><a href="create_user"><span class="sub-item">Create User</span></a></li>
                                  </ul>
                                </div>
                              </li>';
          $logs_navbar = '
                              
                               <li class="nav-item ' . (($current_uri == 'api-logs' || $current_uri == 'user-logs') ? 'active' : '') . '">
                                <a data-bs-toggle="collapse" href="#logs">
                                  <i class="fas fa-code-branch"></i>
                                  <p>Logs</p>
                                  <span class="caret"></span>
                                </a>
                                <div class="collapse" id="logs">
                                  <ul class="nav nav-collapse">
                                    <li><a href="api-logs"><span class="sub-item">API Logs</span></a></li>
                                    <li><a href="user-logs"><span class="sub-item">User Logs</span></a></li>
                                  </ul>
                                </div>
                              </li>';
          $user_type = $this->session->userdata('usertype');
          $sub_user_type = $this->session->userdata('sub_usertype');
          $company_name = $this->session->userdata('company_name');

          if ($user_type === 'ADMIN') {
            switch ($sub_user_type) {
              case 'ADMIN':
                echo $dashboard;
                echo $payment;
                echo $users_navbar;
                echo $logs_navbar;


                break;

              case 'ACCOUNTING':
                echo $dashboard;
                echo $payment;
                break;

              case 'TECH':
                echo $dashboard;
                echo $payment;
                break;

              case 'CSR':
                echo $dashboard;
                echo $payment;
                break;

              case 'MANAGER':
                echo $dashboard;
                echo $payment;
                break;
            }
          } elseif ($user_type === 'CLIENT') {
            echo $payment;
          } else {
            echo $dashboard;
            echo $payment;
            echo $account_navbar;
            echo $users_navbar;
            echo $logs_navbar;
          }
          ?>


        </ul>

      </div>
    </div>
  </div>
  