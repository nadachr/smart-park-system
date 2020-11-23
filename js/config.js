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
var date = new Date();
var d = date.getDate();
var m = date.getMonth() + 1;
var y = date.getFullYear();
var now = y + "-" + m + "-" + d;
valp1 = 0;
valc1 = 0;
valp2 = 0;
valc2 = 0;
valptt = 0;
valctt = 0;
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
                        if(key2 == "Total_people1"){
                            valp1 = pc2[key2];           //ค่าคนที่จะนำเข้าฐานข้อมูล mySql 
                        }
                        else if(key2 == "Total_car1"){
                            valc1 = pc2[key2];           //ค่ารถที่จะนำเข้าฐานข้อมูล mySql 
                        }
                        if(key2 == "Total_people2"){
                            valp2 = pc2[key2];           //ค่าคนที่จะนำเข้าฐานข้อมูล mySql 
                        }
                        else if(key2 == "Total_car2"){
                            valc2 = pc2[key2];           //ค่ารถที่จะนำเข้าฐานข้อมูล mySql 
                        }
                        valptt = valp1 + valp2;
                        valctt = valc1 + valc2;

                        people.innerHTML = valptt;
                        car.innerHTML = valctt;
                    }
                }
            } 
        }  
        
        console.log("now: ",now);
        console.log("date: ", day);       
        
    })

    
}, 1000);