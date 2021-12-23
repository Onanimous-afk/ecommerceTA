<!-- Page -->
<div class="page">
  <div class="page-content container-fluid">
    <div class="row" data-plugin="matchHeight" data-by-row="true">
      <?php if($this->session->userdata('id_jabatan') != 6){?>
        <?php if($this->session->userdata('id_jabatan') == 3 ||$this->session->userdata('id_jabatan') == 4){?>
      <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea One-->
        <div class="card card-shadow" id="widgetLineareaOne">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10">
                <i class="icon md-account grey-600 font-size-24 vertical-align-bottom mr-5"></i>Lembur belum di approve
              </div>
              <br><br>
              <span class="float-right grey-700 font-size-30"><?php echo $jumlemburperiksa?></span>
            </div>
            <div class="mb-20 grey-500" style="color: white !important">
              <i class="icon md-long-arrow-up green-500 font-size-16" style="color: white !important"></i>a
            </div>
            <div class="ct-chart h-50"></div>
          </div>
        </div>
        <!-- End Widget Linearea One -->
      </div>
      <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea Two -->
        <div class="card card-shadow" id="widgetLineareaTwo">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10">
                <i class="icon md-flash grey-600 font-size-24 vertical-align-bottom mr-5"></i>Lembur sudah di approve
              </div>
              <br><br>
              <span class="float-right grey-700 font-size-30"><?php echo $jumlemburapprove?></span>
            </div>
            <div class="mb-20 grey-500" style="color: white !important">
              <i class="icon md-long-arrow-up green-500 font-size-16" style="color: white !important"></i>a
            </div>
            <div class="ct-chart h-50"></div>
          </div>
        </div>
        <!-- End Widget Linearea Two -->
      </div>
      <?php } ?>
      <?php if($jumbawahan > 0){?>
      <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea Three -->
        <div class="card card-shadow" id="widgetLineareaThree">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10">
                <i class="icon md-chart grey-600 font-size-24 vertical-align-bottom mr-5"></i>Approval lembur bawahan
              </div>
              <span class="float-right grey-700 font-size-30"><?php echo $jumlemburbawahanperiksa?></span>
            </div>
            <div class="mb-20 grey-500" style="color: white !important">
              <i class="icon md-long-arrow-up green-500 font-size-16" style="color: white !important"></i>a
            </div>
            <div class="ct-chart h-50"></div>
          </div>
        </div>
        <!-- End Widget Linearea Three -->
      </div>
      <?php } ?>
    <?php } ?>
      <?php if($this->session->userdata('id_jabatan') == 6){?>
      <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea Four -->
        <div class="card card-shadow" id="widgetLineareaFour">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10">
                <i class="icon md-view-list grey-600 font-size-24 vertical-align-bottom mr-5"></i>Total staff lembur (Juli)
              </div>
              <br><br>
              <span class="float-right grey-700 font-size-30"><?php echo $jumuserlemburall?></span>
            </div>
            <div class="mb-20 grey-500" style="color: white !important">
              <i class="icon md-long-arrow-up green-500 font-size-16" style="color: white !important"></i>a
            </div>
            <div class="ct-chart h-50"></div>
          </div>
        </div>
        <!-- End Widget Linearea Four -->
      </div>
      <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea Two -->
        <div class="card card-shadow" id="">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10">
                <i class="icon md-flash grey-600 font-size-24 vertical-align-bottom mr-5"></i>Jumlah user sudah dinilai
              </div>
              <br><br>
              <span class="float-right grey-700 font-size-30"><?php echo $jumusersudahdinilai?></span>
            </div>
            <div class="mb-20 grey-500" style="color: white !important">
              <i class="icon md-long-arrow-up green-500 font-size-16" style="color: white !important"></i>a
            </div>
            <div class="ct-chart h-50">
              <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><path d="M0,50L0,50C9.274,45.833,18.548,43.056,27.821,37.5C37.095,31.944,46.369,12.5,55.643,12.5C64.917,12.5,74.19,25,83.464,25C92.738,25,102.012,6.25,111.286,6.25C120.56,6.25,129.833,35,139.107,35C148.381,35,157.655,31.25,166.929,31.25C176.202,31.25,185.476,43.75,194.75,50L194.75,50Z" class="ct-area"></path></g></g><g class="ct-labels"></g></svg>
            </div>
          </div>
        </div>
        <!-- End Widget Linearea Two -->
      </div>
    <?php } ?>
    </div>
  </div>
</div>
    <!-- End Page -->