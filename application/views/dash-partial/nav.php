<div class="main-panel">
  <div class="main-header">
    <div class="main-header-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo">
          <img src="assets/img/ngsi.png" alt="navbar brand" class="navbar-brand" height="20" />
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
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
      <div class="container-fluid">
        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
          <?php
          $user_type = $this->session->userdata('usertype');
          $sub_user_type = $this->session->userdata('sub_usertype');

          if ($user_type == 'CLIENT') {
            echo $this->session->userdata('company_name');
          } elseif ($user_type == 'ADMIN') {
            echo 'NGSI ' . $sub_user_type;
          } else {
            echo $user_type;
          }
          ?>
          </h3>
        </nav>

        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
          <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">

            <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>

          </li>

          <li class="nav-item topbar-user dropdown hidden-caret">
            <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
              <span class="profile-username">

                <span class="op-7">Hi,</span>
                <span class="fw-bold"><?= $this->session->userdata('name') ?> </span>
                <i class="fas fa-chevron-down ml-2"></i>
              </span>


            </a>

            <ul class="dropdown-menu dropdown-user animated fadeIn">
              <div class="dropdown-user-scroll scrollbar-outer">
                <li>
                  <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-sign-out-alt"></i> Logout
                  </a>
                </li>
              </div>
            </ul>

          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
  </div>