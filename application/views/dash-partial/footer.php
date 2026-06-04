<!--   Core JS Files   -->
<script src="assets/js/core/jquery-3.7.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Chart JS -->
<script src="assets/js/plugin/chart.js/chart.min.js"></script>
<!-- jQuery Sparkline -->
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<!-- Chart Circle -->
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<!-- Datatables -->
<script src="assets/js/plugin/datatables/datatables.min.js"></script>
<!-- Bootstrap Notify -->
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<!-- jQuery Vector Maps -->
<script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="assets/js/plugin/jsvectormap/world.js"></script>
<!-- Sweet Alert -->
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<!-- Kaiadmin JS -->
<script src="assets/js/kaiadmin.min.js"></script>
<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<!-- <script src="assets/js/setting-demo.js"></script>
<script src="assets/js/demo.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>


<script>
  "use strict";

  // Load saved colors when page is loaded
  $(document).ready(function() {
    // Apply saved colors from localStorage
    var savedColor = localStorage.getItem("body-background-full");
    if (savedColor) {
      $("body").attr("data-background-full", savedColor);
      $(".changeBodyBackgroundFullColor[data-color='" + savedColor + "']").addClass("selected");
    }

    var logoColor = localStorage.getItem("logo-background-color");
    if (logoColor) {
      $(".logo-header").attr("data-background-color", logoColor);
      $(".changeLogoHeaderColor[data-color='" + logoColor + "']").addClass("selected");
    }

    var topBarColor = localStorage.getItem("top-bar-color");
    if (topBarColor) {
      $(".main-header .navbar-header").attr("data-background-color", topBarColor);
      $(".changeTopBarColor[data-color='" + topBarColor + "']").addClass("selected");
    }

    var sidebarColor = localStorage.getItem("sidebar-color");
    if (sidebarColor) {
      $(".sidebar").attr("data-background-color", sidebarColor);
      $(".changeSideBarColor[data-color='" + sidebarColor + "']").addClass("selected");
    }

    var backgroundColor = localStorage.getItem("background-color");
    if (backgroundColor) {
      $("body").attr("data-background-color", backgroundColor);
      $(".changeBackgroundColor[data-color='" + backgroundColor + "']").addClass("selected");
    }

    customCheckColor();
    getCheckmark();
  });

  // Setting Color
  $(".changeBodyBackgroundFullColor").on("click", function() {
    var color = $(this).attr("data-color");
    
    if (color == "default") {
      $("body").removeAttr("data-background-full");
      localStorage.removeItem("body-background-full");
    } else {
      $("body").attr("data-background-full", color);
      localStorage.setItem("body-background-full", color); 
    }

    $(this).parent().find(".changeBodyBackgroundFullColor").removeClass("selected");
    $(this).addClass("selected");
    layoutsColors();
    getCheckmark();
  });

  $(".changeLogoHeaderColor").on("click", function() {
    var color = $(this).attr("data-color");
    
    if (color == "default") {
      $(".logo-header").removeAttr("data-background-color");
      localStorage.removeItem("logo-background-color");
    } else {
      $(".logo-header").attr("data-background-color", color);
      localStorage.setItem("logo-background-color", color); 
    }

    $(this).parent().find(".changeLogoHeaderColor").removeClass("selected");
    $(this).addClass("selected");
    customCheckColor();
    layoutsColors();
    getCheckmark();
  });

  $(".changeTopBarColor").on("click", function() {
    var color = $(this).attr("data-color");
    
    if (color == "default") {
      $(".main-header .navbar-header").removeAttr("data-background-color");
      localStorage.removeItem("top-bar-color");
    } else {
      $(".main-header .navbar-header").attr("data-background-color", color);
      localStorage.setItem("top-bar-color", color); 
    }

    $(this).parent().find(".changeTopBarColor").removeClass("selected");
    $(this).addClass("selected");
    layoutsColors();
    getCheckmark();
  });

  $(".changeSideBarColor").on("click", function() {
    var color = $(this).attr("data-color");
    
    if (color == "default") {
      $(".sidebar").removeAttr("data-background-color");
      localStorage.removeItem("sidebar-color");
    } else {
      $(".sidebar").attr("data-background-color", color);
      localStorage.setItem("sidebar-color", color); 
    }

    $(this).parent().find(".changeSideBarColor").removeClass("selected");
    $(this).addClass("selected");
    layoutsColors();
    getCheckmark();
  });

  $(".changeBackgroundColor").on("click", function() {
    var color = $(this).attr("data-color");
    
    $("body").removeAttr("data-background-color");
    $("body").attr("data-background-color", color);
    localStorage.setItem("background-color", color); 

    $(this).parent().find(".changeBackgroundColor").removeClass("selected");
    $(this).addClass("selected");
    getCheckmark();
  });

  function customCheckColor() {
    var logoHeader = $(".logo-header").attr("data-background-color");
    if (logoHeader !== "white") {
      $(".logo-header .navbar-brand").attr("src", "assets/img/ngsiwhite.png");
    } else {
      $(".logo-header .navbar-brand").attr("src", "assets/img/ngsiblack.png");
    }
  }

  var toggle_customSidebar = false,
    custom_open = 0;

  if (!toggle_customSidebar) {
    var toggle = $(".custom-template .custom-toggle");

    toggle.on("click", function() {
      if (custom_open == 1) {
        $(".custom-template").removeClass("open");
        toggle.removeClass("toggled");
        custom_open = 0;
      } else {
        $(".custom-template").addClass("open");
        toggle.addClass("toggled");
        custom_open = 1;
      }
    });
    toggle_customSidebar = true;
  }

  function getCheckmark() {
    var checkmark = `<i class="gg-check"></i>`;
    $(".btnSwitch").find("button").empty();
    $(".btnSwitch").find("button.selected").append(checkmark);
  }
</script>
