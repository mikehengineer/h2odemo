@include('layouts.dashboardlayout')

      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Charts       </li>
          </ul>
        </div>
      </div>
      <section class="charts">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">About            </h1>
          </header>
          <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Introduction</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                I recently became interested in the Laravel framework after coming across a couple tutorial videos.  I decided to dive in and see if I could create a prototype for an IOT product/dashboard website.  After a couple weeks of study I was able to implement routing, authentication, a database and a chart service.
                            </p>
                            <p>
                                Over the next couple of weeks I'll be studying either Vue.js or Angular.js for a frontend framework.  I figure it wouldn't hurt to polish up the front considering that's the first impression of a vistor. Laravel was fun to learn and this website was a blast to build.
                            </p>

                            <p>
                                There are still a lot of questions I have regarding implementing a backend solution for a network of IOT devices.  A few of them:
                                How many concurrent users will this site need to scale for?
                                What is the polling rate of the device -> website/database.
                                Or is the site realtime?
                                If I'm expecting a high number of concurrent users and database read/writes I believe Node.js may be a better solution.
                                What type of internet connection will transmitting to the server? Cellular?
                                How variables does the sensor capture?
                                Will the server need to compute analytics such as averages, trends, etc?
                                Does the website need to interact with any outside APIs?  Will it in the future?

                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Demo Features</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                I will be uploading the source code to github for anyone who would like to take a look.
                            </p>

                            <p>
                                Some of the interesting features of the website:
                            </p>
                            <p>
                                Besides your standard authentication/dashboard functionality I've included a couple elements that show the ability to manipulate the database with user supplied values.
                            </p>
                            <p>
                                In devices you can add devices with one caveat: the name must be unique.  To delete simply add the device name and hit the delete button.
                            </p>
                            <p>
                                On the home page I give two forms where a user can add a certain amount of datapoints to one of their devices.
                                The datapoints are assigned random values in the model and added to the database.
                            </p>
                            <p>
                                Next to this form there is an option to display several graphs based on the database.  Simply supply a device number and the desired amount of graph points.
                            </p>
                            <p>
                                I'm using a Highcharts API to generate the charts.
                            </p>
                            <p>
                                You can tell that these forms are hooked up to the database by displaying a graph, adding more datapoints and displaying the graph again.  The graph will change as you add the datapoints.
                            </p>

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
              <p>Your company &copy; 2017-2019</p>
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
    <script src="js/charts-custom.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>