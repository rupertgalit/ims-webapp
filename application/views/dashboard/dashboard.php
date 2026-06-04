<?php $this->load->view('dash-partial/header.php'); ?>
<link rel="stylesheet" href="../assets/css/dashboard.css" />
<?php $this->load->view('dash-partial/sidebar.php'); ?>
<?php $this->load->view('dash-partial/nav.php'); ?>

<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h5 class="fw-bold mb-3">Dashboard</h5>
      </div>
    </div>

    <div class="col-md-12">

      <div class="row">
        <div class="col-6 col-sm col-sm-4 col-xxl-4 col-md-6">
          <div class="card card-primary bg-primary-gradient flex-fill">
            <div class="row">
              <div class="col-6 border-right">
                <div class="pt-1 pb-1 pl-0 pr-0 text-center">
                  <h4 class="m-1"><span class="counter">₱<?=  number_format($cashin['all']['txn_amount'], 2, '.', ',')?>

                      <p class="m-0">YTD Cash In Amount</p>
                </div>
              </div>
              <div class="col-6">
                <div class="pt-1 pb-1 pl-0 pr-0 text-center">
                  <h4 class="m-1"><span class="counter">₱<?=  number_format($cashin['all']['total_deducted_amount'], 2, '.', ',')?>

                      <p class="m-0">YTD Fee
                      </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-sm col-sm-4 col-xxl-4 col-md-6">
          <div class="card card-primary bg-primary-gradient flex-fill">
            <div class="row">
              <div class="col-6 border-right">
                <div class="pt-1 pb-1 pl-0 pr-0 text-center">
                  <h4 class="m-1"><span class="counter">₱<?=   number_format($cashin['today']['txn_amount'], 2, '.', ',') ?>

                      <p class="m-0">Total Cash In Today
                      </p>
                </div>
              </div>
              <div class="col-6">
                <div class="pt-1 pb-1 pl-0 pr-0 text-center">
                  <h4 class="m-1"><span class="counter">₱<?=  number_format($cashin['today']['total_deducted_amount'], 2, '.', ',') ?>

                      <p class="m-0">Total Fee Today
                      </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-sm col-sm-4 col-xxl-4 col-md-6">
          <div class="card card-primary bg-primary-gradient flex-fill">
            <div class="row">
              <div class="col-6 border-right">
                <div class="pt-1 pb-1 pl-0 pr-0 text-center">
                  <h4 class="m-1"><span class="counter">₱<?= number_format($cashin['yesterday']['txn_amount'], 2, '.', ',') ?>

                      <p class="m-0">Total Cash In Yesterday
                      </p>
                </div>
              </div>
              <div class="col-6">
                <div class="pt-1 pb-1 pl-0 pr-0 text-center">
                  <h4 class="m-1"><span class="counter">₱<?= number_format($cashin['yesterday']['total_deducted_amount'], 2, '.', ',') ?>

                      <p class="m-0">Total Fee Yesterday
                      </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Cash In Daily Amount</div>
            </div>
            <div class="card-body">
              <div class="chart-container">
                <canvas id="lineChart"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Cash In Monthly Amount</div>
            </div>
            <div class="card-body">
              <div class="chart-container">
                <canvas id="barChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row ">
        <div class="col-6 col-sm col-sm-4 col-xxl-4 col-md-6">
          <div class="card card-primary bg-primary-gradient flex-fill">
            <div class="card-statistic-3 p-3">
              <div class="card-icon card-icon-large"></div>
              <div class="mb-4">
                <h5 class="card-title2 mb-0">YTD Total Count</h5>
              </div>
              <div class="row align-items-center mb-2 d-flex">
                <div class="col-8">
                  <h4 class="d-flex align-items-center mb-0">
                    <?= $cashin['all']['count_txn_amount'] ?>
                  </h4>
                  <span>Cash In

                    <i class="fa fa-arrow-up"></i></span>
                </div>
                <!-- <div class="col-4 text-right">
                  <h4 class="d-flex align-items-center mb-0">
                    <?= $cashout['today']['count_txn_amount'] ?>
                  </h4>
                  <span>Cash Out

                    <i class="fa fa-arrow-up"></i></span>
                </div> -->
              </div>

            </div>
          </div>
        </div>
        <div class="col-6 col-sm col-sm-4 col-xxl-4 col-md-6">
          <div class="card l-bg-blue-dark">
            <div class="card-statistic-3 p-3">
              <div class="card-icon card-icon-large"></div>
              <div class="mb-4">
                <h5 class="card-title2 mb-0">Today Count</h5>
              </div>
              <div class="row align-items-center mb-2 d-flex">
                <div class="col-8">
                  <h4 class="d-flex align-items-center mb-0">

                    <?= $cashin['today']['count_txn_amount'] ?>
                  </h4>
                  <span>Cash In

                    <i class="fa fa-arrow-up"></i></span>
                </div>
                <!-- <div class="col-4 text-right">
                  <h4 class="d-flex align-items-center mb-0">

                    <?= $cashout['today']['count_txn_amount'] ?>
                  </h4>
                  <span>Cash Out

                    <i class="fa fa-arrow-up"></i></span>
                </div> -->
              </div>

            </div>
          </div>
        </div>
        <div class="col-6 col-sm col-sm-4 col-xxl-4 col-md-6">
          <div class="card l-bg-blue-dark">
            <div class="card-statistic-3 p-3">
              <div class="card-icon card-icon-large"></div>
              <div class="mb-4">
                <h5 class="card-title2 mb-0">Yesterday Count</h5>
              </div>
              <div class="row align-items-center mb-2 d-flex">
                <div class="col-8">
                  <h4 class="d-flex align-items-center mb-0">

                    <?= $cashin['yesterday']['count_txn_amount'] ?>
                  </h4>
                  <span>Cash In
                    <i class="fa fa-arrow-up"></i></span>
                </div>
                <!-- <div class="col-4 text-right">
                  <h4 class="d-flex align-items-center mb-0">
                    <?= $cashout['yesterday']['count_txn_amount'] ?>
                  </h4>
                  <span>Cash Out

                    <i class="fa fa-arrow-up"></i></span>
                </div> -->
              </div>

            </div>
          </div>
        </div>
      </div>

    <!-- uncomment this for cards -->
    <!-- <div class="card" style="background: var(--primary-color);padding:10px;">
      <div class="container my-4">
        <h2 class="text-center mb-4" style="color:#fff ;">Company Overview</h2>

        <div class="row g-4 justify-content-center" id="card-container">
          <?php foreach ($client as $c): ?>
            <div class="col-12 col-sm-6 col-lg-3">
              <div class="card shadow-sm h-100">
                <div class="card-body" style="box-shadow:0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05);">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0 text-uppercase text-muted">Today's Income</h6>
                  </div>
                  <ul class="list-unstyled small">
                    <li class="d-flex justify-content-between py-1 border-bottom">
                      <span class="text-muted">
                        <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12 3V21M9 21H15M19 6V3H5V6" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Company Name
                      </span>
                      <span class="fw-semibold"><?= htmlspecialchars($c['company_name']) ?></span>
                    </li>
                    <li class="d-flex justify-content-between py-1 border-bottom">
                      <span class="text-muted">
                        <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                          width="14px" height="14px" viewBox="0 0 484.21 484.21"
                          xml:space="preserve">
                          <g>
                            <path d="M395.527,97.043V55.352H124.537l159.46,171.507c9.983,10.749,9.848,27.458-0.319,38.026L126.017,428.861h269.504v-25.18
		c0-15.256,12.413-27.668,27.674-27.668c15.256,0,27.681,12.412,27.681,27.668v52.848c0,15.262-12.419,27.681-27.681,27.681H61.014
		c-11.106,0-21.107-6.603-25.464-16.834c-4.359-10.226-2.189-22.012,5.509-30.026l184.584-191.964L40.743,46.521
		c-7.492-8.068-9.496-19.798-5.101-29.899C40.042,6.525,50.005,0,61.014,0h362.188c15.255,0,27.68,12.413,27.68,27.68v69.363
		c0,15.259-12.419,27.677-27.68,27.677C407.94,124.72,395.527,112.308,395.527,97.043z" />
                          </g>
                        </svg>
                        Cash In Total Request
                      </span>
                      <span><?= htmlspecialchars($c['cashin_total_request']) ?></span>
                    </li>
                    <li class="d-flex justify-content-between py-1 border-bottom">
                      <span class="text-muted">
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                          width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                          <path fill="none" stroke="#000000" stroke-width="4" stroke-miterlimit="10" d="M53.92,10.081c12.107,12.105,12.107,31.732,0,43.838
	c-12.106,12.108-31.734,12.108-43.839,0c-12.107-12.105-12.107-31.732,0-43.838C22.186-2.027,41.813-2.027,53.92,10.081z" />
                          <line fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" x1="24" y1="48" x2="24" y2="16" />
                          <path fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" d="M24,17h7c0,0,11-1,11,9s-11,9-11,9h-7" />
                          <line fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" x1="19" y1="24" x2="47" y2="24" />
                          <line fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" x1="19" y1="28" x2="47" y2="28" />
                        </svg>
                        CashIn Amount
                      </span>
                      <span><?= htmlspecialchars($c['cashin_amount']) ?></span>
                    </li>
                    <li class="d-flex justify-content-between py-1 border-bottom">
                      <span class="text-muted">
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                          width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                          <path fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" d="M53.92,10.081c12.107,12.105,12.107,31.732,0,43.838
	c-12.106,12.108-31.734,12.108-43.839,0c-12.107-12.105-12.107-31.732,0-43.838C22.186-2.027,41.813-2.027,53.92,10.081z" />
                          <line fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" x1="24" y1="48" x2="24" y2="16" />
                          <path fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" d="M24,17h7c0,0,11-1,11,9s-11,9-11,9h-7" />
                          <line fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" x1="19" y1="24" x2="47" y2="24" />
                          <line fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" x1="19" y1="28" x2="47" y2="28" />
                        </svg>
                        CashIn Deducted Amount
                      </span>
                      <span><?= htmlspecialchars($c['cashin_deducted_amount']) ?></span>
                    </li>
                  </ul>

                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
        <div class="mt-2">
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center" id="pagination-controls"></ul>
          </nav>
        </div>
      </div>

    </div>

  </div> -->


  <!-- <div class="card">
        <div class="card-header">
          <div class="card-title">Interactive Area Chart</div>
        </div>
        <div class="card-body">
          <div class="card-tools">
            Real time
            <div class="btn-group" id="realtime" data-toggle="btn-toggle">
              <button type="button" class="btn btn-default btn-sm active" data-toggle="on">On</button>
              <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>
            </div>
          </div>

          <div id="interactive" style="height: 300px;"></div>

        </div>
      </div> -->
  <!-- End of card -->
</div>
</div>


</div>



</div>

<?php $this->load->view('dash-partial/footer.php'); ?>
<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip({
      html: true // Allow HTML content
    });
  });
  $(document).ready(function() {
    $('.btn-group button').click(function() {
      $('.btn-group button').removeClass('active');
      $(this).addClass('active');
    });
  });

  var lineChart = document.getElementById("lineChart").getContext("2d"),
    barChart = document.getElementById("barChart").getContext("2d");


  var graphWeekData = <?php echo json_encode($graph_week); ?>;

  var weekcashInData = [];
  var weekcashOutData = [];
  var weekcashInAmount = [];
  var weekcashOutAmount = [];
  var weekcashInFee = [];
  var weekcashOutFee = [];
  var labels = [];
  var currentYear = new Date().getFullYear();

  graphWeekData.forEach(function(dayData) {
    labels.push(dayData.day);
    weekcashInData.push(parseInt(dayData.cashin_total_request));
    weekcashOutData.push(parseInt(dayData.cashout_total_request));
    weekcashInAmount.push(parseFloat(dayData.cashin_amount));
    weekcashOutAmount.push(parseFloat(dayData.cashout_amount));
    weekcashInFee.push(parseFloat(dayData.cashin_deducted_amount));
    weekcashOutFee.push(parseFloat(dayData.cashout_deducted_amount));

  });



  var myLineChart = new Chart(lineChart, {
    type: "bar",
    data: {
      labels: labels,
      datasets: [{
          label: "Cash In",
          backgroundColor: "rgb(23, 125, 255)",
          borderColor: "rgb(23, 125, 255)",
          data: weekcashInData
        }
        // {
        //   label: "Cash Out",
        //   backgroundColor: "rgb(255, 99, 132)",
        //   borderColor: "rgb(255, 99, 132)",
        //   data: weekcashOutData
        // }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      tooltips: {
        callbacks: {
          title: function(tooltipItem) {
            var year = graphMonthData[tooltipItem[0].index].year || currentYear;
            return `${labels[tooltipItem[0].index]} ${year}`;
          },
          label: function(tooltipItem, data) {
            var datasetIndex = tooltipItem.datasetIndex;
            var value = tooltipItem.yLabel;
            var cashInOrOut = datasetIndex === 0 ? "Cash In" : "Cash Out";
            var amount = datasetIndex === 0 ? weekcashInAmount[tooltipItem.index] : weekcashOutAmount[tooltipItem.index];
            var fee = datasetIndex === 0 ? weekcashInFee[tooltipItem.index] : weekcashOutFee[tooltipItem.index];

            return [
              `${cashInOrOut}: ${value}`,
              `Amount: ₱${amount.toFixed(2)}`,
              `Fee: ₱${fee.toFixed(2)}`
            ];
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  var graphMonthData = <?php echo json_encode($graph_monthly); ?>;

  var cashInData = [];
  var cashOutData = [];
  var cashInAmount = [];
  var cashOutAmount = [];
  var cashInFee = [];
  var cashOutFee = [];
  var labels = [];
  var currentYear = new Date().getFullYear();

  graphMonthData.forEach(function(monthData) {
    // var year = monthData.year || currentYear;
    labels.push(monthData.m);
    cashInData.push(parseInt(monthData.cashin_total_request));
    cashOutData.push(parseInt(monthData.cashout_total_request));
    cashInAmount.push(parseFloat(monthData.cashin_amount));
    cashOutAmount.push(parseFloat(monthData.cashout_amount));
    cashInFee.push(parseFloat(monthData.cashin_deducted_amount));
    cashOutFee.push(parseFloat(monthData.cashout_deducted_amount));
  });

  var myBarChart = new Chart(barChart, {
    type: "bar",
    data: {
      labels: labels,
      datasets: [{
          label: "Cash In",
          backgroundColor: "rgb(23, 125, 255)",
          borderColor: "rgb(23, 125, 255)",
          data: cashInData
        }
        // {
        //   label: "Cash Out",
        //   backgroundColor: "rgb(255, 99, 132)",
        //   borderColor: "rgb(255, 99, 132)",
        //   data: cashOutData
        // }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      tooltips: {
        callbacks: {
          title: function(tooltipItem) {
            var year = graphMonthData[tooltipItem[0].index].year || currentYear;
            return `${labels[tooltipItem[0].index]} ${year}`;
          },
          label: function(tooltipItem, data) {
            var datasetIndex = tooltipItem.datasetIndex;
            var value = tooltipItem.yLabel;
            var cashInOrOut = datasetIndex === 0 ? "Cash In" : "Cash Out";
            var amount = datasetIndex === 0 ? cashInAmount[tooltipItem.index] : cashOutAmount[tooltipItem.index];
            var fee = datasetIndex === 0 ? cashInFee[tooltipItem.index] : cashOutFee[tooltipItem.index];

            return [
              `${cashInOrOut}: ${value}`,
              `Amount: ₱${amount.toFixed(2)}`,
              `Fee: ₱${fee.toFixed(2)}`
            ];
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<script src="https://amwal.doe.net.sa/public/vendor/adminLTE/plugins/flot/jquery.flot.js"></script>
<script src="https://amwal.doe.net.sa/public/vendor/adminLTE/plugins/flot/plugins/jquery.flot.resize.js"></script>
<script src="https://amwal.doe.net.sa/public/vendor/adminLTE/plugins/flot/plugins/jquery.flot.pie.js"></script>
<script>
  $(function() {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [],
      totalPoints = 100

    function getRandomData() {

      if (data.length > 0) {
        data = data.slice(1)
      }

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
          y = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [{
      data: getRandomData(),
    }], {
      grid: {
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor: '#f3f3f3'
      },
      series: {
        color: '#3c8dbc',
        lines: {
          lineWidth: 2,
          show: true,
          fill: true,
        },
      },
      yaxis: {
        min: 0,
        max: 100,
        show: true
      },
      xaxis: {
        show: true
      }
    })

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on') {
        setTimeout(update, updateInterval)
      }
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function() {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      } else {
        realtime = 'off'
      }
      update()
    })
  })
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const cardsPerPage = 8;
    const cards = document.querySelectorAll("#card-container > .col-12");
    const paginationControls = document.getElementById("pagination-controls");

    let currentPage = 1;
    const totalPages = Math.ceil(cards.length / cardsPerPage);

    function showPage(page) {
      currentPage = page;

      cards.forEach((card, index) => {
        card.style.display =
          index >= (page - 1) * cardsPerPage && index < page * cardsPerPage ?
          "block" :
          "none";
      });

      renderPagination();
    }

    function renderPagination() {
      paginationControls.innerHTML = "";

      if (currentPage > 1) {
        const prevLi = document.createElement("li");
        prevLi.className = "page-item";
        const prevA = document.createElement("a");
        prevA.className = "page-link";
        prevA.href = "#";
        prevA.innerHTML = "&larr; Previous";
        prevA.addEventListener("click", function(e) {
          e.preventDefault();
          showPage(currentPage - 1);
        });
        prevLi.appendChild(prevA);
        paginationControls.appendChild(prevLi);
      }
      if (currentPage < totalPages) {
        const nextLi = document.createElement("li");
        nextLi.className = "page-item";
        const nextA = document.createElement("a");
        nextA.className = "page-link";
        nextA.href = "#";
        nextA.innerHTML = "Next &rarr;";
        nextA.addEventListener("click", function(e) {
          e.preventDefault();
          showPage(currentPage + 1);
        });
        nextLi.appendChild(nextA);
        paginationControls.appendChild(nextLi);
      }
    }

    showPage(currentPage);
  });
</script>