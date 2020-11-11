<?php 
  include 'auth.php';
?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smart Park System - Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.green.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>

    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-analytics.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-database.js"></script>

  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong>Smart</strong><strong class="text-primary">Park</strong></div>
              <div class="brand-text brand-sm"><strong>S</strong><strong class="text-primary">P</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">    
            <!-- Log out -->
            <div class="list-inline-item logout">
              <a id="logout" href="logout.php" class="nav-link">
                <span class="d-none d-sm-inline">Logout </span>
                <i class="icon-logout"></i>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/avatar.svg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5"><?=$_SESSION['name']; ?></h1>
            <p>Administrator</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
          <li class="active"><a href="index.html"> <i class="icon-writing-whiteboard"></i>Dashboard </a></li>
          <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>Member </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
              <li><a href="https://www.facebook.com/nada.the.unknown" target="_blank">Nada Chemreh</a></li>
              <li><a href="https://www.facebook.com/nZk.Rikuto/" target="_blank">Patipon Pankaew</a></li>
              <li><a href="https://www.facebook.com/SnaplerZ" target="_blank">Kritsanaphong Muninnopphamat</a></li>
              <li><a href="https://www.facebook.com/profile.php?id=100012714318389" target="_blank">Jirapong Songniam</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-users fa-4x mb-2"></i></div><strong>People detected</strong>
                    </div>
                    <div class="number dashtext-1" id="pp"></div>
                    <input type="text" id="pps" value="">
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-motorcycle fa-4x mb-2"></i></div><strong>Vehicle detected</strong>
                    </div>
                    <div class="number dashtext-2" id="car"></div>
                    <input type="text" id="cars" value="">
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>จำนวนคน</strong></div>
                  <a href='check.php?car=<?php echo $cars?>'>TEST</a>
                  <div class="table-responsive"> 
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Month</th>
                          <th>Car</th>
                          <th>People</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">January</th>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Febuary</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                        </tr>
                        <tr>
                          <th scope="row">March</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="bar-chart block chart">
                  <div class="title"><strong>Total Detected </strong></div>
                  <div class="bar-chart chart">
                    <canvas id="barChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-custom.js"></script>
    <script src="js/front.js"></script>
    <!-- <script>
      /*global $, document*/
      window.onload = function () {
          var BARCHARTEXMPLE    = $('#barChart');
          window.chartSensor = new Chart(BARCHARTEXMPLE,sensor);
      };

      var sensor = {
          type: 'bar',
          options: {
              scales: {
                  xAxes: [{
                      display: true,
                      gridLines: {
                          color: 'transparent'
                      }
                  }],
                  yAxes: [{
                      display: true,
                      gridLines: {
                          color: 'transparent'
                      }
                  }]
              },
          },
          data: {
              labels: ["November","November"],
              datasets: [
                  {
                      label: "People",
                      backgroundColor: [
                          "#fffb00",
                          "#fffb00",
                          "#fffb00",
                          "#fffb00",
                          "#fffb00",
                          "#fffb00",
                          "#fffb00"
                      ],
                      hoverBackgroundColor: [
                          "#fffb00",
                          "#fffb00",
                          "#fffb00",
                          "#fffb00",
                          "#fffb00",
                          "#fffb00",
                          "#fffb00"
                      ],
                      borderColor: [
                          "#fffb00",
                          "#fffb00",
                          "#fffb00",
                          "#fffb00",
                          "#fffb00",
                          "#fffb00",
                          "#fffb00"
                      ],
                      borderWidth: 0.5,
                      data: [],
                  },
                  {
                      label: "Vehicle",
                      backgroundColor: [
                          "#00ff88",
                          "#00ff88",
                          "#00ff88",
                          "#00ff88",
                          "#00ff88",
                          "#00ff88",
                          "#00ff88"
                      ],
                      hoverBackgroundColor: [
                          "#00ff88",
                          "#00ff88",
                          "#00ff88",
                          "#00ff88",
                          "#00ff88",
                          "#00ff88",
                          "#00ff88"
                      ],
                      borderColor: [
                          "#00ff88",
                          "#00ff88",
                          "#00ff88",
                          "#00ff88",
                          "#00ff88",
                          "#00ff88",
                          "#00ff88"
                      ],
                      borderWidth: 0.5,
                      data: [],
                  }
              ]
          }
      };

      var firebaseConfig = {
          apiKey: "AIzaSyBBYQjQRwalw7afWl4NkgDoKNidcp3QSLA",
          authDomain: "peoplencardetect.firebaseapp.com",
          databaseURL: "https://peoplencardetect.firebaseio.com",
          projectId: "peoplencardetect",
          storageBucket: "peoplencardetect.appspot.com",
          messagingSenderId: "155222711004",
          appId: "1:155222711004:web:74ce98d10df5a333133219",
          measurementId: "G-26VXKPN7YJ"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
      firebase.analytics();
      var database = firebase.database();
      var people = document.getElementById('pp');
      var car = document.getElementById('car');
      //var datenow = document.getElementById('datenow');
      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth() + 1;
      var y = date.getFullYear();
      var now = y + "-" + m + "-" + d;
      var valp = 0;
      var valc = 0;
      var disp = false;


      setInterval(function(){
          database.ref("pnc").once('value').then(function(snapshot){
              if(snapshot.exists()){
                  var pc = snapshot.val();
                  for(var key of Object.keys(pc)){
                      var pc2 = pc[key];

                      for(var key2 of Object.keys(pc2)){
                          if(key2 == "date"){
                              var day = pc2[key2];
                              if(now == day){
                                  disp = true;
                              }
                              else{
                                  disp = false;
                              }
                          }
                          if(disp == true){
                              if(key2 == "Total_person"){
                                  valp = pc2[key2];
                                  people.innerHTML = valp;
                              }
                              else if(key2 == "Total_car"){
                                  valc = pc2[key2];
                                  car.innerHTML = valc;
                              }
                          }
                      }window.chartSensor.update();
                  } 
              }  
              sensor.data.datasets[0].data.push(valp);
              sensor.data.datasets[1].data.push(valc);     

              
              console.log("now: ",now);
              console.log("date: ", day);       
          })
      }, 1000);
    </script> -->

  </body>
</html>