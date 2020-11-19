<?php 
  include 'auth.php';
  include 'condb.php';

  function getTotalCar($con, $month) {
    $sql = "SELECT SUM(total_car) car FROM total WHERE date LIKE '2020-$month-%'";
    $result = mysqli_query($con, $sql);
    foreach($result as $row){
      $car = $row['car'];
    }
    return $car;
  }

  function getTotalPp($con, $month) {
    $sql = "SELECT SUM(total_people) people FROM total WHERE date LIKE '2020-$month-%'";
    $result = mysqli_query($con, $sql);
    foreach($result as $row){
      $people = $row['people'];
    }
    return $people;
  }

  $car_jan = getTotalCar($con, 1);
  $pp_jan = getTotalPp($con, 1);
  $car_feb = getTotalCar($con, 2);
  $pp_feb = getTotalPp($con, 2);
  $car_mar = getTotalCar($con, 3);
  $pp_mar = getTotalPp($con, 3);
  $car_apr = getTotalCar($con, 4);
  $pp_apr = getTotalPp($con, 4);
  $car_may = getTotalCar($con, 5);
  $pp_may = getTotalPp($con, 5);
  $car_june = getTotalCar($con, 6);
  $pp_june = getTotalPp($con, 6);
  $car_july = getTotalCar($con, 7);
  $pp_july = getTotalPp($con, 7);
  $car_aug = getTotalCar($con, 8);
  $pp_aug = getTotalPp($con, 8);
  $car_sep = getTotalCar($con, 9);
  $pp_sep = getTotalPp($con, 9);
  $car_oct = getTotalCar($con, 10);
  $pp_oct = getTotalPp($con, 10);
  $car_nov = getTotalCar($con, 11);
  $pp_nov = getTotalPp($con, 11);
  $car_dec = getTotalCar($con, 12);
  $pp_dec = getTotalPp($con, 12);
  

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
    <link rel="shortcut icon" href="img/favicon.jpg">

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
          <li class="active"><a href="index.php"> <i class="icon-writing-whiteboard"></i>Dashboard </a></li>
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
                      <div class="icon"><i class="fa fa-motorcycle fa-4x mb-2"></i></div><strong>Vehicle detected</strong>
                    </div>
                    <div class="number dashtext-2 h1" style="font-size: 80px;" id="car"></div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-users fa-4x mb-2"></i></div><strong>People detected</strong>
                    </div>
                    <div class="number dashtext-1 h1" style="font-size: 80px;" id="pp"></div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
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
                  <div class="title h3"><strong>สถิติตลอดปี</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr align="center" class="number dashtext-1 h4">
                          <th class="dashtext-3" width="200px">Month</th>
                          <th class="dashtext-2">Car</th>
                          <th>People</th>
                        </tr>
                      </thead>
                      <tbody align="center" class="h5">
                        <tr>
                          <th scope="row">January</th>
                          <td><?= $car_jan;?></td>
                          <td><?= $pp_jan;?></td>
                        </tr>
                        <tr>
                          <th scope="row">Febuary</th>
                          <td><?= $car_feb;?></td>
                          <td><?= $pp_feb;?></td>
                        </tr>
                        <tr>
                          <th scope="row">March</th>
                          <td><?= $car_mar;?></td>
                          <td><?= $pp_mar;?></td>
                        </tr>
                        <tr>
                          <th scope="row">April</th>
                          <td><?= $car_apr;?></td>
                          <td><?= $pp_apr;?></td>
                        </tr>
                        <tr>
                          <th scope="row">May</th>
                          <td><?= $car_may;?></td>
                          <td><?= $pp_may;?></td>
                        </tr>
                        <tr>
                          <th scope="row">June</th>
                          <td><?= $car_june;?></td>
                          <td><?= $pp_june;?></td>
                        </tr>
                        <tr>
                          <th scope="row">July</th>
                          <td><?= $car_july;?></td>
                          <td><?= $pp_july;?></td>
                        </tr>
                        <tr>
                          <th scope="row">August</th>
                          <td><?= $car_aug;?></td>
                          <td><?= $pp_aug;?></td>
                        </tr>
                        <tr>
                          <th scope="row">September</th>
                          <td><?= $car_sep;?></td>
                          <td><?= $pp_sep;?></td>
                        </tr>
                        <tr>
                          <th scope="row">October</th>
                          <td><?= $car_oct;?></td>
                          <td><?= $pp_oct;?></td>
                        </tr>
                        <tr>
                          <th scope="row">November</th>
                          <td><?= $car_nov;?></td>
                          <td><?= $pp_nov;?></td>
                        </tr>
                        <tr>
                          <th scope="row">December</th>
                          <td><?= $car_dec;?></td>
                          <td><?= $pp_dec;?></td>
                        </tr>
                      </tbody>
                    </table>
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
    <script src="js/config.js"></script>
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
              labels: ["novber","November"],
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