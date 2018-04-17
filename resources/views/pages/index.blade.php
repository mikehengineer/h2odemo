@include ('layouts.dashboardlayout')

      <!-- Counts Section -->
      <section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <div class="row">
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="name"><strong class="text-uppercase">Average GPM</strong><span>Today.</span>
                  <div class="count-number">.03</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="name"><strong class="text-uppercase">Average Pressure</strong><span>This week.</span>
                  <div class="count-number">3.14 PSI</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="name"><strong class="text-uppercase">Average Cost</strong><span>This week.</span>
                  <div class="count-number">$1.17/day</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="name"><strong class="text-uppercase">Warnings</strong><span>This month.</span>
                  <div class="count-number">2</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="name"><strong class="text-uppercase">Outages</strong><span>This month.</span>
                  <div class="count-number">0</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="name"><strong class="text-uppercase">Estimated savings.</strong><span>This month.</span>
                  <div class="count-number">$25</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Header Section-->



<section class="dashboard-header section-padding">
    <div class="container-fluid">
        <div class="row d-flex align-items-md-stretch">

            <div class="col-lg-3 col-md-6">
                <div class="card">
                <div class="card-header d-flex align-items-center">
                <div class="card-body">
                    <h4>Add Datapoints</h4>
                <form METHOD="POST" action="/addpoints">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Device #</label>
                        <input type="text" name="device" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label># of Datapoints</label>
                        <input type="text" name="datapoints" placeholder="Type" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                    @if ($flash = session('deviceMsg'))
                        <div class="alert alert-success" role="alert" id="deviceMsg">
                            {{ $flash }}
                        </div>
                    @endif
                    @if($errors->has('device') || $errors->has('datapoints') || count($errors->notfound->all()))
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    @foreach ($errors->notfound->all() as $notfound)
                                        <li>{{ $notfound }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </form>

            </div>
                </div>
            </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="card-body">
                            <h4>Generate Graph</h4>
                            <form METHOD="POST" action="/home">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Which Device?</label>
                                    <input type="text" name="deviceGraph" placeholder="Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>How many minutes?</label>
                                    <input type="text" name="datapointsGraph" placeholder="Type" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Generate</button>
                                </div>
                                @if ($flash = session('graphMsg'))
                                    <div class="alert alert-success" role="alert" id="deviceMsg">
                                        {{ $flash }}
                                    </div>
                                @endif
                                @if($errors->has('deviceGraph') || $errors->has('datapointsGraph'))
                                    <div class="form-group">
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 flex-lg-last flex-md-first align-self-baseline">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div class="card-body" id="chartHolder">

                            @if ($chart != 0)
                                    <script>
                                        $(function () {
                                            Highcharts.chart('chartHolder', {
                                                chart: {
                                                    type: 'line'
                                                },
                                                title: {
                                                    text: 'Device ' . $device
                                                },
                                                xAxis: {
                                                    title: {
                                                        text: 'Minutes'
                                                    }
                                                },
                                                series: [{
                                                    name: 'GPM',
                                                    data: <?php echo json_encode($gpm) ?>
                                                }, {
                                                    name: 'Temperature',
                                                    data: <?php echo json_encode($temperature) ?>
                                                }, {
                                                    name: 'PSI',
                                                    data: <?php echo json_encode($psi) ?>
                                                }, {
                                                    name: 'Velocity',
                                                    data: <?php echo json_encode($velocity) ?>
                                                }]
                                            });
                                        });
                                    </script>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



      <!-- Statistics Section-->
      <section class="statistics">
        <div class="container-fluid">
          <div class="row d-flex">
            <div class="col-lg-4">
              <!-- Income-->
              <div class="card income text-center" id = "chartHolder2">
                  @if ($chart != 0)
                      <script>
                          $(function () {
                              Highcharts.chart('chartHolder2', {
                                  chart: {
                                      height: 400,
                                      type: 'column'
                                  },
                                  title: {
                                      text: 'Device ' . $device
                                  },
                                  xAxis: {
                                      title: {
                                          text: 'Minutes'
                                      }
                                  },
                                  series: [{
                                      name: 'GPM',
                                      data: <?php echo json_encode($gpm) ?>
                                  }, {
                                      name: 'Temperature',
                                      data: <?php echo json_encode($temperature) ?>
                                  }, {
                                      name: 'PSI',
                                      data: <?php echo json_encode($psi) ?>
                                  }, {
                                      name: 'Velocity',
                                      data: <?php echo json_encode($velocity) ?>
                                  }]
                              });
                          });
                      </script>
                  @endif
              </div>
            </div>
            <div class="col-lg-4">
                <div class="card income text-center" id = "chartHolder3">
                    @if ($chart != 0)
                        <script>
                            $(function () {
                                Highcharts.chart('chartHolder3', {
                                    chart: {
                                        height: 400,
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Device ' . $device
                                    },
                                    xAxis: {
                                        title: {
                                            text: 'Minutes'
                                        }
                                    },
                                    series: [{
                                        name: 'GPM',
                                        data: <?php echo json_encode($gpm) ?>
                                    }, {
                                        name: 'Temperature',
                                        data: <?php echo json_encode($temperature) ?>
                                    }, {
                                        name: 'PSI',
                                        data: <?php echo json_encode($psi) ?>
                                    }, {
                                        name: 'Velocity',
                                        data: <?php echo json_encode($velocity) ?>
                                    }]
                                });
                            });
                        </script>
                    @endif
                </div>

            </div>
            <div class="col-lg-4">
              <!-- User Actibity-->
                <div class="card income text-center" id = "chartHolder4">
                    @if ($chart != 0)
                        <script>
                            $(function () {
                                Highcharts.chart('chartHolder4', {
                                    chart: {
                                        height: 400,
                                        type: 'areaspline'
                                    },
                                    title: {
                                        text: 'Device ' . $device
                                    },
                                    xAxis: {
                                        title: {
                                            text: 'Minutes'
                                        }
                                    },
                                    series: [{
                                        name: 'GPM',
                                        data: <?php echo json_encode($gpm) ?>
                                    }, {
                                        name: 'Temperature',
                                        data: <?php echo json_encode($temperature) ?>
                                    }, {
                                        name: 'PSI',
                                        data: <?php echo json_encode($psi) ?>
                                    }, {
                                        name: 'Velocity',
                                        data: <?php echo json_encode($velocity) ?>
                                    }]
                                });
                            });
                        </script>
                    @endif
                </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Updates Section -->


      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>H2O &copy; 2017-2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>

<script>

    function generateChart(){
        Highcharts.chart('chartHolder', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Fruit Consumption'
            },
            xAxis: {
                categories: ['Apples', 'Bananas', 'Oranges']
            },
            yAxis: {
                title: {
                    text: 'Fruit eaten'
                }
            },
            series: [{
                name: 'Jane',
                data: [1, 0, 4]
            }, {
                name: 'John',
                data: [5, 7, 3]
            }]
        });
    }

</script>


  </body>
</html>