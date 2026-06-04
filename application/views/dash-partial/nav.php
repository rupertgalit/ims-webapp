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

  <div class="custom-template">
    <div class="title">Settings</div>
    <div class="custom-content">
      <div class="switcher">
        <div class="switch-block">
          <h4>Logo Header</h4>
          <div class="btnSwitch">
            <button type="button" class=" changeLogoHeaderColor" data-color="dark"><i class="gg-check"></i></button>
            <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
            <br>
            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
          </div>
        </div>
        <div class="switch-block">
          <h4>Navbar Header</h4>
          <div class="btnSwitch">
            <button type="button" class="changeTopBarColor" data-color="dark"></button>
            <button type="button" class="changeTopBarColor" data-color="blue"></button>
            <button type="button" class="changeTopBarColor" data-color="purple"></button>
            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
            <button type="button" class="changeTopBarColor" data-color="green"></button>
            <button type="button" class="changeTopBarColor" data-color="orange"></button>
            <button type="button" class="changeTopBarColor" data-color="red"></button>
            <button type="button" class="  changeTopBarColor" data-color="white"></button>
            <br>
            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
            <button type="button" class="changeTopBarColor" data-color="blue2"><i class="gg-check"></i></button>
            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
            <button type="button" class="changeTopBarColor" data-color="green2"></button>
            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
            <button type="button" class="changeTopBarColor" data-color="red2"></button>
          </div>
        </div>
        <div class="switch-block">
          <h4>Sidebar</h4>
          <div class="btnSwitch">
            <button type="button" class="changeSideBarColor" data-color="dark"><i class="gg-check"></i></button>
            <button type="button" class="changeSideBarColor" data-color="blue"></button>
            <button type="button" class="changeSideBarColor" data-color="purple"></button>
            <button type="button" class="changeSideBarColor" data-color="light-blue"></button>
            <button type="button" class="changeSideBarColor" data-color="green"></button>
            <button type="button" class="changeSideBarColor" data-color="orange"></button>
            <button type="button" class="changeSideBarColor" data-color="red"></button>
            <button type="button" class="  changeSideBarColor" data-color="white"></button>
            <br>
            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
            <button type="button" class="changeSideBarColor" data-color="blue2"></button>
            <button type="button" class="changeSideBarColor" data-color="purple2"></button>
            <button type="button" class="changeSideBarColor" data-color="light-blue2"></button>
            <button type="button" class="changeSideBarColor" data-color="green2"></button>
            <button type="button" class="changeSideBarColor" data-color="orange2"></button>
            <button type="button" class="changeSideBarColor" data-color="red2"></button>
          </div>
        </div>
      </div>
    </div>
    <div class="custom-toggle toggled">
      <i class="fa-solid fa-gear"></i>
    </div>
  </div>