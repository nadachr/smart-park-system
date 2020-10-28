/*global $, document*/
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

database.ref("pnc").once('value').then(function(snapshot){
    if(snapshot.exists()){
        var pc = snapshot.val();
        for(var key of Object.keys(pc)){
            var pc2 = pc[key];

            for(var key2 of Object.keys(pc2)){
                if(key2 == "datetime"){
                    var day = pc2[key2].substr(0,10);
                    if(now == day){
                        disp = true;
                    }
                    else{
                        disp = false;
                    }
                }
                if(disp == true){
                    if(pc2["Person"] == "1" && pc2["Car"] == "1"){
                        valp = valp+1; //people num
                        valc = valc+1;  //car num
                    }
                    else if(pc2["Person"] == "1" && pc2["Car"] == "0"){
                        valp = valp+1;
                    }
                    else if(pc2["Person"] == "0" && pc2["Car"] == "1"){
                        valc = valc+1;
                    }else{
                        valc = valc;
                        valp = valp;
                    }
                }

                
            }
        } 
    }                  
});

setInterval(function(){
  people.innerHTML = valp;
  car.innerHTML = valc;
    sensor.data.dataset[0].data.push(valp);
    sensor.data.dataset[1].data.push(valc);
}, 1000);



$(document).ready(function () {

    'use strict';



    Chart.defaults.global.defaultFontColor = '#75787c';
        
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
            labels: ["January", "February", "March", "April", "May", "June", "July"],
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
    }

    // ------------------------------------------------------- //
    // Bar Chart
    // ------------------------------------------------------ //
    var BARCHARTEXMPLE    = $('#barChart');
    var barChartExample = new Chart(BARCHARTEXMPLE,sensor);
});
