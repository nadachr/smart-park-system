
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
var peoples = document.getElementById('pps');
var car = document.getElementById('car');
var cars = document.getElementById('cars');
//var datenow = document.getElementById('datenow');
var date = new Date();
var d = date.getDate();
var m = date.getMonth() + 1;
var y = date.getFullYear();
var now = y + "-" + m + "-" + d;
valp = 0;
valc = 0;
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
                    if(disp == false){
                        if(key2 == "Total_person"){
                            valp = pc2[key2];           //ค่าคนที่จะนำเข้าฐานข้อมูล mySql 
                            people.innerHTML = valp;
                            peoples.value = valp;
                        }
                        else if(key2 == "Total_car"){
                            valc = pc2[key2];           //ค่ารถที่จะนำเข้าฐานข้อมูล mySql 
                            car.innerHTML = valc;
                            cars.value = valc;        
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

    //postData(valc, valp);
    
}, 1000);


if (window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }
        
        else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        
        var PageToSendTo = "check.php?";
        var MyVariable = valc;
        var VariablePlaceholder = "car=";
        var UrlToSend = PageToSendTo + VariablePlaceholder + MyVariable;
        
        xmlhttp.open("GET", UrlToSend, false);
        xmlhttp.send();
        
        console.log(UrlToSend);
// function postData(valc, valp){
//     var data = [];
//     var val = {};

//     val.c = valc;
//     val.p = valp;
//     data.push(val);

//     //console.log(data);
//     $.ajax({
//         url: "data.php",
//         method: "post",
//         data: { data : JSON.stringify ( data ) },
//         success: function(res){
//         }
//     })
// }

// setInterval(function(){
//   people.innerHTML = valp;
//   car.innerHTML = valc;
//     
// }, 1000);