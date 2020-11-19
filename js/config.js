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
                        if(key2 == "Total_people"){
                            valp = pc2[key2];           //ค่าคนที่จะนำเข้าฐานข้อมูล mySql 
                            people.innerHTML = valp;
                            //peoples.value = valp;
                        }
                        else if(key2 == "Total_car"){
                            valc = pc2[key2];           //ค่ารถที่จะนำเข้าฐานข้อมูล mySql 
                            car.innerHTML = valc;
                            //cars.value = valc;        
                        }
                    }
                }
            } 
        }  
        
        console.log("now: ",now);
        console.log("date: ", day);       
        
    })

    
}, 1000);