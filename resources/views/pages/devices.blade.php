@include('layouts.dashboardlayout')

      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Devices       </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Devices            </h1>
          </header>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>Devices</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Device Name</th>
                      <th>Device Type</th>
                      <th>Model Number</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php
                      $deviceCount = 1; //need initial value of device count = 1
                    @endphp

                    @foreach ($devices as $device)
                    <tr>
                      <th scope="row">{{ $deviceCount }}</th>
                      <td>{{ $device['name'] }}</td>
                      <td>{{ $device['type'] }}</td>
                      <td>{{ $device['modelnumber'] }}</td>
                    </tr>

                      @php
                      $deviceCount++;
                      @endphp

                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            @if ($flash = session('deviceMsg'))
              <div class="alert alert-success" role="alert" id="deviceMsg">
                {{ $flash }}
              </div>
            @endif
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header d-flex align-items-center">
                    <h4>Add Device</h4>
                  </div>
                  <div class="card-body">
                    <form METHOD="POST" action="/devices">

                      {{ csrf_field() }}

                      <div class="form-group">
                        <label>Device Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Device Type</label>
                        <input type="text" name="type" placeholder="Type" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Model Number</label>
                        <input type="text" name="modelnumber" placeholder="Model" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                      </div>
                      @if(count($errors))
                        <div class="form-group">
                          <div class="alert alert-danger" id = "dError">
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
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header d-flex align-items-center">
                    <h4>Remove Device</h4>
                  </div>
                  <div class="card-body">
                    <form METHOD="POST" action="/devices">

                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}

                      <div class="form-group">
                        <label>Device Name</label>
                        <input type="text" name="nameDelete" placeholder="Name" class="form-control">
                      </div>
                        <button type="submit" class="btn btn-primary">Delete</button>
                      @if(count($errors))
                        <div class="form-group">
                          <div class="alert alert-danger" id = "dError">
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
          </div>
        </div>
      </section>
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Mike H 2017-2019</p>
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>